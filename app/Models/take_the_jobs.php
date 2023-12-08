<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class take_the_jobs
 * @package App\Models
 * @version November 15, 2023, 1:51 pm +07
 *
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $created_by
 * @property integer $active
 * @property string $description
 */
class take_the_jobs extends Model
{


    public $table = 'take_the_jobs';
    



    public $fillable = [
        'title',
        'content',
        'image',
        'created_by',
        'active',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'image' => 'string',
        'created_by' => 'string',
        'active' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
