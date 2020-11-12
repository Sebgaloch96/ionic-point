<?php

namespace App;

use App\Traits\HasUuid;
use App\Traits\Bookmarkable;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasUuid, Bookmarkable;

    protected $table = 'jobs';

    protected $fillable = [
        'reference', 'title', 'description', 'status'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['bookmarksCount', 'isBookmarked'];

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
                return $query->orderBy('title', 'desc');
                break;
            case 'asc': 
                return $query->orderBy('title', 'asc');
                break;
            case 'newest': 
                return $query->latest();
                break;
            case 'oldest': 
                return $query->oldest();
                break;
        }
    }

    public function scopeBookmarkedByUser($query, $user = null) 
    {
        // If no user was passed in, use the currently authenticated user
        if ($user === null) {
            $user = auth()->user();
        }

        return $query->whereHas('bookmarks', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        });
    }

    public function users() 
    {
        return $this->belongsToMany(User::class, 'job_user', 'job_id', 'user_id');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
