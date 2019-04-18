<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Domain
 * @package App\Models
 * @version March 20, 2019, 2:36 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\Os os
 * @property string url
 * @property string username
 * @property string password
 * @property integer user_id
 * @property integer os_id
 * @property string desc
 */
class Domain extends Model
{
    use SoftDeletes;

    public $table = 'domains';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'url',
        'username',
        'password',
        'user_id',
        'os_id',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'url' => 'string',
        'username' => 'string',
        'password' => 'string',
        'user_id' => 'integer',
        'os_id' => 'integer',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'required',
        'username' => 'required'
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
    public function os()
    {
        return $this->belongsTo(\App\Models\Os::class, 'os_id', 'id');
    }
}
