<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Connectiontype
 * @package App\Models
 * @version March 17, 2019, 10:32 pm +0330
 *
 * @property \App\Models\User user
 * @property string title
 * @property string status
 * @property string standard_port
 * @property bigInteger user_id
 * @property string desc
 */
class Connectiontype extends Model
{
    use SoftDeletes;

    public $table = 'connectiontypes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'standard_port',
        'user_id',
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
        'standard_port' => 'string',
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
        'standard_port' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
