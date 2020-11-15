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

    protected $dates = [
        'created_at', 'start_date'
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
        $query = $query
            ->where('title', 'LIKE', '%'.$keyword.'%')
            ->orWhere('description', 'LIKE', '%'.$keyword.'%')
            ->orWhereHas('address', function ($subquery) use ($keyword) {
                $subquery->where('city', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('postcode', 'LIKE', '%'.$keyword.'%');
            });

        if (\Ramsey\Uuid\Uuid::isValid($keyword)) {
            $query->orWhere('uuid', $keyword);
        }

        return $query;
    }

    public function scopeWithinLatLngBounds($query, $bounds) 
    {
        $query->whereHas('address', function ($subquery) use ($bounds) {
            $subquery
                ->where('lat', '<', $bounds->north_east->lat)
                ->where('lat', '>', $bounds->south_west->lat)
                ->where('lng', '<', $bounds->north_east->lng)
                ->where('lng', '>', $bounds->south_west->lng);
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

    public function getEndDateAttribute()
    {
        return $this->start_date->addDays($this->length_of_job);
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
