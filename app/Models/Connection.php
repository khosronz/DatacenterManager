<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Connection
 * @package App\Models
 * @version March 30, 2019, 1:28 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Connectiontype connectiontype
 * @property \App\Models\Software software
 * @property string username
 * @property string password
 * @property string port
 * @property bigInteger user_id
 * @property bigInteger connectiontype_id
 * @property bigInteger software_id
 * @property string desc
 */
class Connection extends Model
{
    use SoftDeletes;

    public $table = 'connections';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'username',
        'password',
        'port',
        'user_id',
        'connectiontype_id',
        'software_id',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'password' => 'string',
        'port' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required',
        'port' => 'required'
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
    public function connectiontype()
    {
        return $this->belongsTo(\App\Models\Connectiontype::class, 'connectiontype_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
