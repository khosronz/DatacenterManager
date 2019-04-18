<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Database
 * @package App\Models
 * @version March 30, 2019, 2:20 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Databasetype databasetype
 * @property \App\Models\Software software
 * @property string username
 * @property string password
 * @property string status
 * @property string port
 * @property bigInteger user_id
 * @property bigInteger databasetype_id
 * @property bigInteger software_id
 * @property string desc
 */
class Database extends Model
{
    use SoftDeletes;

    public $table = 'databases';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'username',
        'password',
        'status',
        'port',
        'user_id',
        'databasetype_id',
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
        'status' => 'string',
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
        'status' => 'required',
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
    public function databasetype()
    {
        return $this->belongsTo(\App\Models\Databasetype::class, 'databasetype_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
