<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Roleuser
 * @package App\Models
 * @version April 1, 2019, 2:12 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\User roleUser
 * @property \App\Models\Role role
 * @property bigInteger user_id
 * @property bigInteger user_related_id
 * @property bigInteger role_id
 */
class Roleuser extends Model
{
    use SoftDeletes;

    public $table = 'roleusers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'user_related_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
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
    public function roleUser()
    {
        return $this->belongsTo(\App\User::class, 'user_related_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id', 'id');
    }
}
