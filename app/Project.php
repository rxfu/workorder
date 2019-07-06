<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'content', 'begin_at', 'end_at', 'user_id', 'participant',
    ];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
