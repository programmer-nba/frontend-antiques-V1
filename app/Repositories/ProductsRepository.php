<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\BaseRepository;

/**
 * Class ProductsRepository
 * @package App\Repositories
 * @version November 11, 2023, 4:07 pm +07
*/

class ProductsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'name_en'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Products::class;
    }
}
