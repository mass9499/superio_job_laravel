<?php
namespace Modules\Gig\Controllers;

use App\Notifications\AdminChannelServices;
use Modules\Booking\Gigs\BookingUpdatedGig;
use Modules\Core\Gigs\CreatedServicesGig;
use Modules\Core\Gigs\UpdatedServiceGig;
use Modules\Gig\Models\Gig;
use Modules\Gig\Models\GigTerm;
use Modules\Gig\Models\GigTranslation;
use Modules\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Location\Models\Location;
use Modules\Core\Models\Attributes;
use Modules\Booking\Models\Booking;
use Modules\Location\Models\LocationCategory;

class VendorGigController extends FrontendController
{
    protected $gigClass;
    protected $gigTranslationClass;
    protected $gigTermClass;
    protected $attributesClass;
    protected $locationClass;
    protected $bookingClass;
    /**
     * @var string
     */
    private $locationCategoryClass;

    public function __construct()
    {
        parent::__construct();
        $this->gigClass = Gig::class;
        $this->gigTranslationClass = GigTranslation::class;
        $this->gigTermClass = GigTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->locationCategoryClass = LocationCategory::class;
        $this->bookingClass = Booking::class;
    }

    public function callAction($method, $parameters)
    {
        if(!Gig::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }
    public function indexGig(Request $request)
    {
        $this->checkPermission('gig_manage');
        $user_id = Auth::id();
        $list_tour = $this->gigClass::where("create_user", $user_id)->orderBy('id', 'desc');
        $data = [
            'rows' => $list_tour->paginate(5),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Gigs'),
                    'url'  => route('gig.vendor.index')
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Manage Gigs"),
        ];
        return view('Gig::frontend.vendorGig.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('gig_manage');
        $user_id = Auth::id();
        $list_tour = $this->gigClass::onlyTrashed()->where("create_user", $user_id)->orderBy('id', 'desc');
        $data = [
            'rows' => $list_tour->paginate(5),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Gigs'),
                    'url'  => route('gig.vendor.index')
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Recovery Gigs"),
        ];
        return view('Gig::frontend.vendorGig.index', $data);
    }

    public function restore($id)
    {
        $this->checkPermission('gig_manage');
        $user_id = Auth::id();
        $query = $this->gigClass::onlyTrashed()->where("create_user", $user_id)->where("id", $id)->first();
        if(!empty($query)){
            $query->restore();
        }
        return redirect(route('gig.vendor.recovery'))->with('success', __('Restore event success!'));
    }

    public function createGig(Request $request)
    {
        $this->checkPermission('gig_manage');
        $row = new $this->gigClass();
        $data = [
            'row'           => $row,
            'translation' => new $this->gigTranslationClass(),
            'gig_location' => $this->locationClass::where("status","publish")->get()->toTree(),
            'location_category' => $this->locationCategoryClass::where('status', 'publish')->get(),
            'attributes'    => $this->attributesClass::where('service', 'gig')->get(),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Gigs'),
                    'url'  => route('gig.vendor.index')
                ],
                [
                    'name'  => __('Create'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Create Gigs"),
        ];
        return view('Gig::frontend.vendorGig.detail', $data);
    }


    public function store( Request $request, $id ){
        if($id>0){
            $this->checkPermission('gig_manage');
            $row = $this->gigClass::find($id);
            if (empty($row)) {
                return redirect(route('gig.vendor.index'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('gig_manage_others'))
            {
                return redirect(route('gig.vendor.index'));
            }
        }else{
            $this->checkPermission('gig_manage');
            $row = new $this->gigClass();
            $row->status = "publish";
            if(setting_item("gig_vendor_create_service_must_approved_by_admin", 0)){
                $row->status = "pending";
            }
        }
        $dataKeys = [
            'title',
            'content',
            'price',
            'is_instant',
            'video',
            'faqs',
            'image_id',
            'banner_image_id',
            'gallery',
            'location_id',
            'address',
            'map_lat',
            'map_lng',
            'map_zoom',
            'duration',
            'start_time',
            'price',
            'sale_price',
            'ticket_types',
            'enable_extra_price',
            'extra_price',
            'is_featured',
            'default_state',
            'enable_service_fee',
            'service_fee',
            'surrounding',
        ];
        if($this->hasPermission('gig_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());

        $res = $row->saveOriginOrTranslation($request->input('lang'),true);

        if ($res) {
            if(!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }

            if($id > 0 ){
                event(new UpdatedServiceGig($row));

                return back()->with('success',  __('Gig updated') );
            }else{
                event(new CreatedServicesGig($row));
                return redirect(route('gig.vendor.edit',['id'=>$row->id]))->with('success', __('Gig created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->gigTermClass::where('target_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->gigTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $row->id
                ]);
            }
            $this->gigTermClass::where('target_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function editGig(Request $request, $id)
    {
        $this->checkPermission('gig_manage');
        $user_id = Auth::id();
        $row = $this->gigClass::where("create_user", $user_id);
        $row = $row->find($id);
        if (empty($row)) {
            return redirect(route('gig.vendor.index'))->with('warning', __('Gig not found!'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        $data = [
            'translation'    => $translation,
            'row'           => $row,
            'gig_location' => $this->locationClass::where("status","publish")->get()->toTree(),
            'location_category' => $this->locationCategoryClass::where('status', 'publish')->get(),
            'attributes'    => $this->attributesClass::where('service', 'gig')->get(),
            "selected_terms" => $row->terms->pluck('term_id'),
            'breadcrumbs'        => [
                [
                    'name' => __('Manage Gigs'),
                    'url'  => route('gig.vendor.index')
                ],
                [
                    'name'  => __('Edit'),
                    'class' => 'active'
                ],
            ],
            'page_title'         => __("Edit Gigs"),
        ];
        return view('Gig::frontend.vendorGig.detail', $data);
    }

    public function deleteGig($id)
    {
        $this->checkPermission('gig_manage');
        $user_id = Auth::id();
        if(\request()->query('permanently_delete')){
            $query = $this->gigClass::where("create_user", $user_id)->where("id", $id)->withTrahsed()->first();
            if (!empty($query)) {
                $query->forceDelete();
            }
        }else {
            $query = $this->gigClass::where("create_user", $user_id)->where("id", $id)->first();
            if (!empty($query)) {
                $query->delete();
                event(new UpdatedServiceGig($query));
            }
        }
        return redirect(route('gig.vendor.index'))->with('success', __('Delete event success!'));
    }

    public function bulkEditGig($id , Request $request){
        $this->checkPermission('gig_manage');
        $action = $request->input('action');
        $user_id = Auth::id();
        $query = $this->gigClass::where("create_user", $user_id)->where("id", $id)->first();
        if (empty($id)) {
            return redirect()->back()->with('error', __('No item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if(empty($query)){
            return redirect()->back()->with('error', __('Not Found'));
        }
        switch ($action){
            case "make-hide":
                $query->status = "draft";
                break;
            case "make-publish":
                $query->status = "publish";
                break;
        }
        $query->save();
        event(new UpdatedServiceGig($query));

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function bookingReportBulkEdit($booking_id , Request $request){
        $status = $request->input('status');
        if (!empty(setting_item("gig_allow_vendor_can_change_their_booking_status")) and !empty($status) and !empty($booking_id)) {
            $query = $this->bookingClass::where("id", $booking_id);
            $query->where("vendor_id", Auth::id());
            $item = $query->first();
            if(!empty($item)){
                $item->status = $status;
                $item->save();

                if($status == Booking::CANCELLED) $item->tryRefundToWallet();

                event(new BookingUpdatedGig($item));
                return redirect()->back()->with('success', __('Update success'));
            }
            return redirect()->back()->with('error', __('Booking not found!'));
        }
        return redirect()->back()->with('error', __('Update fail!'));
    }
}