<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Softwareuser
 * @package App\Models
 * @version April 1, 2019, 1:31 pm +0430
 *
 * @property \App\User user
 * @property \App\User userRelated
 * @property \App\Models\Software software
 * @property string title
 * @property bigInteger user_id
 * @property bigInteger user_related_id
 * @property bigInteger software_id
 * @property string desc
 */
class Softwareuser extends Model
{
    use SoftDeletes;

    public $table = 'softwareusers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'user_id',
        'user_related_id',
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
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
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
    public function userRelated()
    {
        return $this->belongsTo(\App\User::class, 'user_related_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
