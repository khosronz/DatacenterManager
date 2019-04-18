<?php

namespace App\Repositories;

use App\Models\Softwareuser;
use App\Repositories\BaseRepository;

/**
 * Class SoftwareuserRepository
 * @package App\Repositories
 * @version April 1, 2019, 1:31 pm +0430
*/

class SoftwareuserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
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
        return Softwareuser::class;
    }
}
