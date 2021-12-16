<?php


namespace Modules\User\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Models\Bookable;

class Plan extends Bookable
{

    use SoftDeletes;

    protected $table = 'bc_plans';
    public $type = 'plan';

    public function getDurationTextAttribute(){
        $html = '';
        switch ($this->duration_type){
            case "day":
                if($this->duration <= 1)
                $html = __(":duration day",['duration'=>$this->duration]);
                else
                $html = __(":duration days",['duration'=>$this->duration]);
            break;
            case "week":
                if($this->duration <= 1)
                $html = __(":duration week",['duration'=>$this->duration]);
                else
                $html = __(":duration weeks",['duration'=>$this->duration]);
            break;
            case "month":
                if($this->duration <= 1)
                $html = __(":duration month",['duration'=>$this->duration]);
                else
                $html = __(":duration months",['duration'=>$this->duration]);
            break;
            case "year":
                if($this->duration <= 1)
                $html = __(":duration year",['duration'=>$this->duration]);
                else
                $html = __(":duration years",['duration'=>$this->duration]);
            break;
        }
        return $html;
    }
    public function getDurationTypeTextAttribute(){
        switch ($this->duration_type){
            case "day":
                return __("daily");
            break;
            case "week":
                return __("weekly");
            break;
            case "month":
                return __("monthly");
            break;
            case "year":
                return __("yearly");
            break;
        }
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
}
