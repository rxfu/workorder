<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_enable', 'is_displayed',
    ];

    public $timestamps = false;

    protected $casts = [
        'is_enable' => 'boolean',
        'is_displayed' => 'boolean',
    ];
}
