<?php

namespace App\Repositories;

use App\Models\take_the_jobs;
use App\Repositories\BaseRepository;

/**
 * Class take_the_jobsRepository
 * @package App\Repositories
 * @version November 15, 2023, 1:51 pm +07
*/

class take_the_jobsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'image',
        'created_by',
        'active',
        'description'
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
        return take_the_jobs::class;
    }
}
