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

    public function scopeSearch($query, $keyword)
    {
        return $query
            ->where('title', 'LIKE', '%'.$keyword.'%')
            ->orWhere('description', 'LIKE', '%'.$keyword.'%')
            ->orWhereHas('address', function ($subquery) use ($keyword) {
                $subquery->where('city', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('postcode', 'LIKE', '%'.$keyword.'%');
            });
            
    }

    public function scopeSort($query, $sort) 
    {
        switch ($sort) {
            case 'desc': 
                $query->orderBy('title', 'desc');
                break;
            case 'asc': 
                $query->orderBy('title', 'asc');
                break;
            case 'newest': 
                $query->latest();
                break;
            case 'oldest': 
                $query->oldest();
                break;
        }
    }

    public function users() 
    {
        return $this->belongsToMany(User::class, 'job_user', 'job_id', 'user_id');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }
}
