<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'campus', 'floor', 'room', 'ip', 'mac', 'usage', 'machine', 'username', 'password', 'memo'
    ];

    public function getIpAttribute($value) {
    	return long2ip($value);
    }

    public function setIpAttribute($value) {
    	$this->attributes['ip'] = ip2long($value);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
