<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 'campus', 'address', 'department_id', 'applicant', 'telephone', 'description', 'status_id', 'result'
    ];

    public $incrementing = false;

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function scopeCountUsers($query, $userId)
    {
        return $query->whereUserId($userId)->count();
    }
}
