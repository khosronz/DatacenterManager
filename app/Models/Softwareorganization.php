<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Softwareorganization
 * @package App\Models
 * @version March 30, 2019, 3:50 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Organization organization
 * @property \App\Models\Software software
 * @property bigInteger user_id
 * @property bigInteger organization_id
 * @property bigInteger software_id
 * @property string status
 * @property string relation_type
 * @property string desc
 */
class Softwareorganization extends Model
{
    use SoftDeletes;

    public $table = 'softwareorganizations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'organization_id',
        'software_id',
        'status',
        'relation_type',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'relation_type' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class, 'organization_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
