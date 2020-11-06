<?php

namespace App;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasUuid;

    protected $table = 'jobs';

    protected $fillable = [
        'title', 'description'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if ($job->ref === null) {
                $job->ref = "Job";
            }
        });

        static::created(function ($job) {    
            if ($job->id) {
                $job->ref = 'J'.$job->id;
                $job->save();
            }
        });
    }
}
