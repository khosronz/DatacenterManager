<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Phonebook
 * @package App\Models
 * @version March 22, 2019, 5:15 pm +0430
 *
 * @property \App\Models\User user
 * @property \App\Models\Phonetype phonetype
 * @property string phone_number
 * @property string status
 * @property string desc
 * @property bigInteger user_id
 * @property bigInteger phonetype_id
 */
class Phonebook extends Model
{
    use SoftDeletes;

    public $table = 'phonebooks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'phone_number',
        'status',
        'desc',
        'user_id',
        'phonetype_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_number' => 'string',
        'status' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'phone_number' => 'required',
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
    public function phonetype()
    {
        return $this->belongsTo(\App\Models\Phonetype::class, 'phonetype_id', 'id');
    }
}
