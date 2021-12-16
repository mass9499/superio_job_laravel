<?php
namespace Modules\Company\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Modules\Core\Models\SEO;
use Modules\Candidate\Models\Category;
use Modules\Core\Models\Terms;
use Modules\Job\Models\Job;
use Modules\Location\Models\Location;
use Modules\Core\Models\Attributes;

class Company extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bc_companies';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'avatar_id',
        'cover_id',
        'founded_in',
        'allow_search',
        'owner_id',
        'category_id',
        'team_size',
        'about',
        'social_media',
        'city',
        'state',
        'country',
        'zip_code',
        'address',
        'slug',
        'status',
        'location_id',
        'map_lat',
        'map_lng',
        'is_featured'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';
    protected $seo_type = 'companies';
    public $type = 'company';
    protected $casts = [
        'social_media' => 'array'
    ];

    public function getDetailUrlAttribute()
    {
        return url('companies-' . $this->slug);
    }
    public function getDetailUrl($locale = false)
    {
        return url(app_get_locale(false,false,'/'). config('companies.companies_route_prefix')."/".$this->slug);
    }
    public function category()
    {
        $catename = $this->hasOne(Category::class, "id", "category_id");
        return $catename;
    }
    public function teamSize()
    {
        return $this->hasOne(Terms::class, 'id', 'team_size')->with(['translations']);
    }
    public function job()
    {
        return $this->hasMany(Job::class,'company_id','id');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'company_id','id');
    }
    public function getAuthor()
    {
        return $this->belongsTo("App\User", "owner_id", "id")->withDefault();
    }
    public function location(){
        return $this->belongsTo(Location::class,'location_id','id');
    }

    public static function search(Request $request)
    {
        $model_companies = parent::query()->select("bc_companies.*")
            ->where("bc_companies.status", "publish")
            ->where('allow_search',1);
        if (!empty($search = $request->query("s"))) {
            $model_companies->where(function($query) use ($search) {
                $query->where('bc_companies.name', 'LIKE', '%' . $search . '%');
                $query->orWhere('bc_companies.about', 'LIKE', '%' . $search . '%');
            });

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app_get_locale() ){
                $model_companies->leftJoin('bc_company_translations', function ($join) use ($search) {
                    $join->on('bc_companies.id', '=', 'bc_company_translations.origin_id');
                });
                $model_companies->orWhere(function($query) use ($search) {
                    $query->where('bc_company_translations.name', 'LIKE', '%' . $search . '%');
                    $query->orWhere('bc_company_translations.about', 'LIKE', '%' . $search . '%');
                });
            }

            $title_page = __('Search results : ":s"', ["s" => $search]);
        }
        if(!empty($category_id = $request->query("category")))
        {
            $category = Category::query()->where('id', $category_id)->where("status","publish")->first();
            if(!empty($category)){
                $model_companies->join('bc_categories', function ($join) use ($category) {
                    $join->on('bc_categories.id', '=', 'bc_companies.category_id')
                        ->where('bc_categories._lft', '>=', $category->_lft)
                        ->where('bc_categories._rgt', '<=', $category->_rgt);
                });
            }
        }
        if(!empty($location_id = $request->query("location_id")))
        {
            $location = Location::query()->where('id', $location_id)->where("status","publish")->first();
            if(!empty($location)){
                $model_companies->join('bc_locations', function ($join) use ($location) {
                    $join->on('bc_locations.id', '=', 'bc_companies.location_id')
                        ->where('bc_locations._lft', '>=', $location->_lft)
                        ->where('bc_locations._rgt', '<=', $location->_rgt);
                });
            }
        }
        if(!empty($from_date = $request->query("from_date")) && !empty($to_date = $request->query("to_date")))
        {
            $day_last_month = date("t", strtotime($to_date . "-12-01"));

            $model_companies->whereBetween('founded_in',[$from_date.'-01-01',$to_date.'-12-'.$day_last_month]);
        }
        if(!empty($size = $request->query("team_size")))
        {
            $model_companies->where('team_size',$size);
        }
        $orderby = $request->query("orderby",'newest');
        switch ($orderby) {
            case "random":
                $model_companies->inRandomOrder();
                break;
            case "oldest":
                $model_companies->orderBy('bc_companies.id','ASC');
                break;
            case "newest":
                $model_companies->orderBy('bc_companies.id','DESC');
                break;
        }
        $model_companies->withCount(['job' => function (Builder $query) {
            $query->where('status', 'publish');
        }]);
        $limit = $request->query("limit",10);
        return $model_companies->with(["category","location",'wishlist'])->paginate($limit);
    }
    public static function getTopCardsReport($userId)
    {
        $company = parent::where('owner_id',$userId)->first();
        $totalJob = 0;
        if($company)
        {
            $totalJob = Job::where('company_id',$company->id)->count();
        }
        $totalMessages = \Modules\Core\Models\NotificationPush::query()->where('notifiable_id', $userId)->count();
        $res[] = [
            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Jobs"),
            'amount' => $totalJob,
            'desc'   => __("Posted Jobs"),
            'class'  => 'purple',
            'icon'   => 'icon ion-ios-briefcase'
        ];
        $res[] = [
            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Application"),
            'amount' => 2,
            'desc'   => __("Total Application"),
            'class'  => 'pink',
            'icon'   => 'icon ion-ios-document'
        ];
        $res[] = [

            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Messages"),
            'amount' => $totalMessages,
            'desc'   => __("Total Messages"),
            'class'  => 'info',
            'icon'   => 'icon ion-md-chatboxes'
        ];
        $res[] = [

            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Shortlist"),
            'amount' => 4,
            'desc'   => __("Total Shortlist"),
            'class'  => 'success',
            'icon'   => 'icon ion-ios-bookmark'
        ];
        return $res;
    }
    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('company.admin.edit',['id'=>$this->id , "lang"=> $lang]);
    }
}
