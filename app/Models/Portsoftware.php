<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Portsoftware
 * @package App\Models
 * @version March 28, 2019, 9:51 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Software software
 * @property string title
 * @property string status
 * @property string port_number
 * @property bigInteger user_id
 * @property bigInteger software_id
 * @property string desc
 */
class Portsoftware extends Model
{
    use SoftDeletes;

    public $table = 'portsoftwares';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'port_number',
        'user_id',
        'software_id',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'status' => 'string',
        'port_number' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required',
        'port_number' => 'required'
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
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
