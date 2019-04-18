<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Organization
 * @package App\Models
 * @version March 19, 2019, 10:49 am +0330
 *
 * @property \App\Models\Organization organization
 * @property \App\Models\User user
 * @property string title
 * @property integer parent_id
 * @property integer user_id
 * @property string status
 * @property string desc
 */
class Organization extends Model
{
    use SoftDeletes;

    public $table = 'organizations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'parent_id',
        'user_id',
        'status',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'parent_id' => 'integer',
        'user_id' => 'integer',
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
    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
