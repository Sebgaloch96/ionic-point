<?php

namespace App;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasUuid;

    protected $table = 'jobs';

    protected $fillable = [
        'reference', 'title', 'description', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if ($job->reference === null) {
                $job->reference = "Job";
            }
        });

        static::created(function ($job) {    
            if ($job->id) {
                $job->reference = 'J'.$job->id;
                $job->save();
            }
        });
    }

    public function users() 
    {
        return $this->belongsToMany('App\User', 'job_user', 'job_id', 'user_id');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }
}
