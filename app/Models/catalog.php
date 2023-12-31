<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class catalog
 * @package App\Models
 * @version November 7, 2023, 3:44 pm +07
 *
 * @property \App\Models\Slug $slug
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $view_type
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keyword
 * @property string $seo_image
 * @property string $created_at
 * @property string $updated_at
 */
class catalog extends Model
{
    use SoftDeletes;


    public $table = 'catalogs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'image',
        'view_type',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'seo_image',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'locale' => 'string',
        'locale_id' => 'string',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'view_type' => 'string',
        'seo_title' => 'string',
        'seo_description' => 'string',
        'seo_keyword' => 'string',
        'seo_image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function slug()
    {
        return $this->hasOne(\App\Models\Slug::class, 'target_id', 'id');
    }
}
