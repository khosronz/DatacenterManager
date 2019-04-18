<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 * @package App\Models
 * @version March 20, 2019, 4:48 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\City city
 * @property string title
 * @property string status
 * @property string desc
 * @property bigInteger user_id
 * @property bigInteger city_id
 */
class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'desc',
        'user_id',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'status' => 'string',
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
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id', 'id');
    }
}
