<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Products
 * @package App\Models
 * @version November 11, 2023, 4:07 pm +07
 *
 * @property string $name
 * @property string $name_en
 */
class Products extends Model
{


    public $table = 'products';
    



    public $fillable = [
        'name',
        'name_en'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'name_en' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
