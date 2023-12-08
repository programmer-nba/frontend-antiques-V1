<?php

namespace App\Repositories;

use App\Models\catalog;
use App\Repositories\BaseRepository;

/**
 * Class catalogRepository
 * @package App\Repositories
 * @version November 7, 2023, 3:44 pm +07
*/

class catalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return catalog::class;
    }
}
