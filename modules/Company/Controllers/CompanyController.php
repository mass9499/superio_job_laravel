<?php
namespace Modules\Company\Controllers;

use App\Helpers\ReCaptchaEngine;
use App\Notifications\PrivateChannelServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;
use Modules\Candidate\Emails\NotificationCandidateContact;
use Modules\Candidate\Models\CandidateContact;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\Company\Models\Company;
use Modules\Candidate\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Modules\Location\Models\Location;
use Modules\Job\Models\Job;
use Modules\Core\Models\Attributes;
use Modules\User\Models\User;

class CompanyController extends FrontendController
{
    protected $company;
    protected $category;
    protected $language;
    protected $job;
    protected $attributes;
    protected $location;

    public function __construct()
    {
        parent::__construct();
        $this->company = Company::class;
        $this->category = Category::class;
        $this->language = Language::class;
        $this->job = Job::class;
        $this->attributes = Attributes::class;
        $this->location = Location::class;
    }
    public function index(Request $request)
    {
        $list = call_user_func([$this->company,'search'],$request);
        $limit_location = 1000;
        $data = [
            'rows'              => $list,
            'list_locations'=> $this->location::where('status', 'publish')->limit($limit_location)->get()->toTree(),
            'categories'    => $this->category::query()->where("status", "publish")->with('translations')->get()->toTree(),
            'attributes'     => $this->attributes::where('service', 'company')->get(),
            'model_tag'         => [],
            'custom_title_page' => $title_page ?? "",
            'breadcrumbs'       => [
                [
                    'name'  => __('Companies'),
                    'url'  => route('companies.index'),
                    'class' => 'active'
                ],
            ],
            "body_class"=>'company-search',
            "seo_meta" => [],
            "languages"=>$this->language::getActive(false),
            "locale"=> app()->getLocale()
        ];
        $view_layouts = ['v1', 'v2', 'v3'];
        $layout = (setting_item('company_list_layout') && !empty(setting_item('company_list_layout'))) ? setting_item('company_list_layout') : 'company-list-v1';
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'company-list-'.$demo_layout;
        }
        $data['style'] = $layout;

        return view('Company::frontend.index', $data);
    }
    public function detail(Request $request, $slug)
    {
        $row = $this->company::where('slug', $slug)->with(["category","location","teamSize"])
            ->withCount(['job' => function (Builder $query) {
                $query->where('status', 'publish');
            }])
            ->where('status','publish')->first();

        if (empty($row)) {
            return redirect('/');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());

        $data = [
            'row'               => $row,
            'jobs'              => $this->job::with(['location','translations', 'category', 'jobType'])->where('company_id',$row->id)->where("status","publish")->paginate(5),
            'translation'       => $translation,
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation),
            'custom_title_page' => $row->name,
            'breadcrumbs'       => [
                [
                    'name' => __('Companies'),
                    'url'  => route('companies.index')
                ],
                [
                    'name'  => '',
                    'class' => 'active'
                ],
            ],
            'header_transparent'=>true,
        ];
        $this->setActiveMenu($row);
        $view_layouts = ['v1', 'v2','v3'];
        $layout = (setting_item('single_company_layout') && !empty(setting_item('single_company_layout'))) ? setting_item('single_company_layout') : 'company-single-v1';
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'company-single-'.$demo_layout;
        }
        $data['style'] = $layout;
        return view('Company::frontend.detail', $data);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'email'   => [
                'required',
                'max:255',
                'email'
            ],
            'name'    => ['required'],
            'message' => ['required']
        ]);
        /**
         * Google ReCapcha
         */
        if(ReCaptchaEngine::isEnable()){
            $codeCapcha = $request->input('g-recaptcha-response');
            if(!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)){
                $data = [
                    'status'    => 0,
                    'message'    => __('Please verify the captcha'),
                ];
                return response()->json($data, 200);
            }
        }
        $row = new CandidateContact($request->input());
        $row->status = 'sent';
        if ($row->save()) {
            $this->sendEmail($row);
            $data = [
                'status'    => 1,
                'message'    => __('Thank you for contacting us! We will get back to you soon'),
            ];
            return response()->json($data, 200);
        }
    }

    protected function sendEmail($contact){
        $userNotify = User::query()->where('id', $contact->origin_id)->first();
        if($userNotify){
            try {
                Mail::to($userNotify->email)->send(new NotificationCandidateContact($contact));

                $data = [
                    'id' => $contact->id,
                    'event'   => 'ContactToCandidate',
                    'to'      => 'company',
                    'name' => $contact->name ?? '',
                    'avatar' => '',
                    'link' => route("company.admin.myContact"),
                    'type' => 'contact_form',
                    'message' => __(':name have sent a contact to you', ['name' => $contact->name ?? ''])
                ];

                $userNotify->notify(new PrivateChannelServices($data));
            }catch (Exception $exception){
                Log::warning("Contact Company Send Mail: ".$exception->getMessage());
            }
        }
    }
}
