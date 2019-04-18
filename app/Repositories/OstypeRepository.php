<?php

namespace App\Repositories;

use App\Models\Ostype;
use App\Repositories\BaseRepository;

/**
 * Class OstypeRepository
 * @package App\Repositories
 * @version March 17, 2019, 1:06 pm UTC
*/

class OstypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status'
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
        return Ostype::class;
    }
}
