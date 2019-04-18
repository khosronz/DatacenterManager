<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Os
 * @package App\Models
 * @version March 17, 2019, 6:37 pm +0330
 *
 * @property \App\Models\Ostype ostype
 * @property \App\Models\User user
 * @property string title
 * @property string status
 * @property string desc
 * @property bigInteger ostype_id
 * @property bigInteger user_id
 */
class Os extends Model
{
    use SoftDeletes;

    public $table = 'os';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'status',
        'desc',
        'ostype_id',
        'user_id'
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
    public function ostype()
    {
        return $this->belongsTo(\App\Models\Ostype::class, 'ostype_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
