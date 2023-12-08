<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Category
 * @package App\Models
 * @version November 8, 2023, 1:34 pm +07
 *
 * @property string $name
 * @property integer $status
 * @property string $image
 */
class Category extends Model
{
    use SoftDeletes;


    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'status' => 'integer',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
