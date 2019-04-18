<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vm
 * @package App\Models
 * @version March 30, 2019, 12:07 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Vmtype vmtype
 * @property \App\Models\Software software
 * @property string username
 * @property string password
 * @property string ip
 * @property string desc
 * @property bigInteger user_id
 * @property bigInteger vmtype_id
 * @property bigInteger software_id
 */
class Vm extends Model
{
    use SoftDeletes;

    public $table = 'vms';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'username',
        'password',
        'ip',
        'desc',
        'user_id',
        'vmtype_id',
        'software_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'password' => 'string',
        'ip' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required',
        'ip' => 'required'
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
    public function vmtype()
    {
        return $this->belongsTo(\App\Models\Vmtype::class, 'vmtype_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
