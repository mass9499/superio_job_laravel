<?php
namespace Modules\Candidate\Controllers;

use App\Helpers\ReCaptchaEngine;
use App\Notifications\PrivateChannelServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;
use Modules\Candidate\Models\CandidateContact;
use Modules\Candidate\Models\CandidateCvs;
use Modules\Candidate\Emails\NotificationCandidateContact;
use Modules\Contact\Models\Contact;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\Candidate\Models\Candidate;
use Modules\Candidate\Models\Category;
use Modules\Candidate\Models\CandidateTranslation;
use Modules\Location\Models\Location;
use Modules\Skill\Models\Skill;
use Modules\User\Models\User;

class CandidateController extends FrontendController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $list = call_user_func([Candidate::class,'search'],$request);
        $limit_location = 1000;
        $data = [
            'rows'               => $list,
            'list_locations'      => Location::where('status', 'publish')->limit($limit_location)->get()->toTree(),
            'list_categories'      => Category::where('status', 'publish')->get()->toTree(),
            'list_skills'      => Skill::where('status', 'publish')->get(),
            'min_max_price' => Candidate::getMinMaxPrice(),
            "filter"             => $request->query('filter'),
            "seo_meta"           => Candidate::getSeoMetaForPageList()
        ];
        $view_layouts = ['v1', 'v2', 'v3'];
        $layout = setting_item('candidate_list_layout', 'candidate-list-v1');
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'candidate-list-'.$demo_layout;
        }
        $data['style'] = $layout;
        $data['layout'] = $demo_layout ? $demo_layout : 'v1';

        return view('Candidate::frontend.index', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = Candidate::with([ 'skills', 'categories', 'user'])->where('slug', $slug)->first();
        if (empty($row)) {
            return redirect('/');
        }else{
            if($row->allow_search == 'hide' && $row->id != Auth::id()){
                return redirect('/');
            }
        }

        $translation = $row->translateOrOrigin(app()->getLocale());

        $data = [
            'row'               => $row,
            'translation'       => $translation,
            'model_category'    => Category::where("status", "publish"),
            'cv'                => CandidateCvs::query()->where('origin_id', $row->id)->where('is_default', 1)->first(),
            'custom_title_page' => $title_page ?? "",
            "gallery"           => $row->getGallery(true),
            'header_transparent'=>true,
            'seo_meta'          => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
        ];

        $view_layouts = ['v1', 'v3'];
        $layout = setting_item('candidate_single_layout', 'candidate-single-v1');
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'candidate-single-'.$demo_layout;
        }
        $data['style'] = $layout;

        $this->setActiveMenu($row);
        return view('Candidate::frontend.detail', $data);
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
                    'to'      => 'candidate',
                    'name' => $contact->name ?? '',
                    'avatar' => '',
                    'link' => route("candidate.admin.myContact"),
                    'type' => 'apply_job',
                    'message' => __(':name have sent a contact to you', ['name' => $contact->name ?? ''])
                ];

                $userNotify->notify(new PrivateChannelServices($data));
            }catch (Exception $exception){
                Log::warning("Contact Candidate Send Mail: ".$exception->getMessage());
            }
        }
    }
}
