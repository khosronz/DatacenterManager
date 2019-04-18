<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Iprange
 * @package App\Models
 * @version March 20, 2019, 10:17 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\Location location
 * @property string title
 * @property string status
 * @property string from
 * @property string to
 * @property bigInteger user_id
 * @property bigInteger location_id
 * @property string desc
 */
class Iprange extends Model
{
    use SoftDeletes;

    public $table = 'ipranges';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'from',
        'to',
        'user_id',
        'location_id',
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
        'from' => 'string',
        'to' => 'string',
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
        'from' => 'required',
        'to' => 'required'
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
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id', 'id');
    }
}
