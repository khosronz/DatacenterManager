<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Software
 * @package App\Models
 * @version March 28, 2019, 2:39 pm +0430
 *
 * @property \App\Models\Os os
 * @property \App\Models\Domain domain
 * @property \App\Models\Location location
 * @property \App\Models\User user
 * @property string server_name
 * @property string status
 * @property bigInteger os_id
 * @property string ip
 * @property bigInteger domain_id
 * @property bigInteger location_id
 * @property bigInteger user_id
 */
class Software extends Model
{
    use SoftDeletes;

    public $table = 'software';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'server_name',
        'status',
        'os_id',
        'ip',
        'domain_id',
        'location_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'server_name' => 'string',
        'status' => 'string',
        'ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'server_name' => 'required',
        'status' => 'required',
        'ip' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function os()
    {
        return $this->belongsTo(\App\Models\Os::class, 'os_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function domain()
    {
        return $this->belongsTo(\App\Models\Domain::class, 'domain_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function connections()
    {
        return $this->hasMany(\App\Models\Connection::class, 'software_id', 'id');
    }

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
    public function softwareUsers()
    {
        return $this->hasMany(\App\Models\Softwareuser::class, 'software_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function webaddresses()
    {
        return $this->hasMany(\App\Models\Webaddress::class, 'software_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function descs()
    {
        return $this->hasMany(\App\Models\Softwaredesc::class, 'software_id', 'id');
    }
}
