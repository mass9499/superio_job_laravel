<?php
namespace Modules\Gig\Models;

use App\BaseModel;

class GigCategoryTranslation extends BaseModel
{
    protected $table = 'bc_gig_cat_trans';
    protected $fillable = [
        'name',
        'content',
    ];
    protected $cleanFields = [
        'content'
    ];
}
