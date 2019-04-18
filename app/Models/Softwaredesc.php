<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Softwaredesc
 * @package App\Models
 * @version March 30, 2019, 10:27 am +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Software software
 * @property string title
 * @property string status
 * @property dateTime desc_date
 * @property bigInteger user_id
 * @property bigInteger software_id
 * @property string desc
 */
class Softwaredesc extends Model
{
    use SoftDeletes;

    public $table = 'softwaredescs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'desc_date',
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
        'desc_date' => 'datetime',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
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
    public function software()
    {
        return $this->belongsTo(\App\Models\Software::class, 'software_id', 'id');
    }
}
