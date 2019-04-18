<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Databasetype
 * @package App\Models
 * @version March 20, 2019, 3:33 pm +0330
 *
 * @property \App\Models\User user
 * @property string title
 * @property string standard_port
 * @property string desc
 * @property bigInteger user_id
 */
class Databasetype extends Model
{
    use SoftDeletes;

    public $table = 'databasetypes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'standard_port',
        'desc',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'standard_port' => 'string',
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
}
