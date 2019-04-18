<?php

namespace App\Repositories;

use App\Models\Webaddress;
use App\Repositories\BaseRepository;

/**
 * Class WebaddressRepository
 * @package App\Repositories
 * @version March 30, 2019, 9:41 am +0430
*/

class WebaddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'url',
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
        return Webaddress::class;
    }
}
