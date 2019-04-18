<?php

namespace App\Repositories;

use App\Models\Roleuser;
use App\Repositories\BaseRepository;

/**
 * Class RoleuserRepository
 * @package App\Repositories
 * @version April 1, 2019, 2:12 pm +0430
*/

class RoleuserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Roleuser::class;
    }
}
