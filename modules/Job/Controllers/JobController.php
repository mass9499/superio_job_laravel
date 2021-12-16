<?php
namespace Modules\Job\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Candidate\Models\Candidate;
use Modules\Candidate\Models\CandidateCvs;
use Modules\Candidate\Models\Category;
use Modules\Job\Events\CandidateApplyJobSubmit;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobCandidate;
use Modules\Job\Models\JobType;
use Modules\Location\Models\Location;
use Modules\Media\Models\MediaFile;

class JobController extends Controller{

    public function __construct(){

    }

    public function index(Request $request)
    {
        $list = call_user_func([Job::class,'search'],$request);
        $limit_location = 1000;
        $data = [
            'rows'               => $list,
            'list_locations'      => Location::where('status', 'publish')->limit($limit_location)->get()->toTree(),
            'list_categories'      => Category::where('status', 'publish')->get()->toTree(),
            'job_types'      => JobType::where('status', 'publish')->get(),
            'min_max_price' => Job::getMinMaxPrice(),
            "filter"             => $request->query('filter'),
            "seo_meta"           => Job::getSeoMetaForPageList()
        ];
        $view_layouts = ['v1', 'v2', 'v3'];
        $layout = setting_item('jobs_list_layout', 'job-list-v1');
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'job-list-'.$demo_layout;
        }
        $data['style'] = $layout;

        return view('Job::frontend.index', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = Job::with(['location','translations', 'category', 'company', 'company.teamSize', 'jobType', 'skills', 'wishlist'])->where('slug', $slug)->first();

        $translation = $row->translateOrOrigin(app()->getLocale());
        $job_related = [];
        $category_id = $row->category_id;
        if (!empty($category_id)) {
            $job_related = Job::with(['location','translations', 'company', 'category', 'jobType'])->where('category_id', $category_id)->where("status","publish")->whereNotIn('id', [$row->id])->take(3)->get();
        }
        $candidate = Auth::check() ? Candidate::with('cvs')->where('id', Auth::id())->first() : false;
        $applied = false;
        if ($candidate){
            $job_candidate = JobCandidate::query()
                ->where('job_id', $row->id)
                ->where('candidate_id', Auth::id())
                ->first();
            if($job_candidate) $applied = true;
        }
        $data = [
            'row' => $row,
            'translation' => $translation,
            'job_related' => $job_related,
            'candidate' => $candidate,
            'applied' => $applied,
            'disable_header_shadow' => true,
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation)
        ];

        $view_layouts = ['v1', 'v2'];
        $layout = setting_item('job_single_layout', 'job-single-v1');
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'job-single-'.$demo_layout;
        }
        $data['style'] = $layout;

        $this->setActiveMenu($row);
        return view('Job::frontend.detail', $data);
    }

    public function applyJob(Request $request){
        $cv_file = $request->file('cv_file');
        $apply_cv_id = $request->input('apply_cv_id');
        $message = $request->input('message');
        $job_id = $request->input('job_id');
        $company_id = $request->input('company_id');
        if(empty($apply_cv_id) && empty($cv_file)){
            return $this->sendError(__("Choose a cv"));
        }

        //Save Cv
        if(!empty($cv_file)){
            $file_id = MediaFile::saveUploadFile($cv_file);
            if(empty($file_id)){
                return $this->sendError(__("An error occurred!"));
            }
            $candidateCv = new CandidateCvs();
            $candidateCv->file_id = $file_id;
            $candidateCv->origin_id = Auth::id();
            $candidateCv->save();
            $apply_cv_id = $candidateCv->id;
        }

        $row = JobCandidate::query()
            ->where('job_id', $job_id)
            ->where('candidate_id', Auth::id())
            ->first();
        if ($row){
            return $this->sendError(__("You have applied this job already"));
        }
        $row = new JobCandidate();
        $row->job_id = $job_id;
        $row->candidate_id = Auth::id();
        $row->cv_id = $apply_cv_id;
        $row->message = $message;
        $row->status = 'pending';
        $row->company_id = $company_id;
        $row->save();
        $row->load('jobInfo', 'jobInfo.user', 'candidateInfo', 'company', 'company.getAuthor');
        //
        event(new CandidateApplyJobSubmit($row));

        return $this->sendSuccess([
            'message' => __("Apply successfully!")
        ]);
    }
}
