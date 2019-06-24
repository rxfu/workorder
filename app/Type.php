<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
