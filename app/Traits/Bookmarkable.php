<?php

namespace App\Traits;

use App\Bookmark;

trait Bookmarkable {

    protected static function bootBookmarkable()
    { 
        static::deleting(function ($model) {
            $model->bookmarks->each->delete();
        });
    }

    /**
     * A model can be bookmarked
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    /**
     * Bookmark the current model
     *
     * @return Model
     */
    public function bookmark()
    {
        $attributes = ['user_id' => auth()->user()->id];

        if (!$this->bookmarks()->where($attributes)->exists()) {
            return $this->bookmarks()->create($attributes);
        }
    }

    /**
     * Remove bookmark from current model.
     */
    public function removeBookmark()
    {
        $attributes = ['user_id' => auth()->user()->id];

        $this->bookmarks()->where($attributes)->get()->each->delete();
    }

    /**
     * Determine if the current model has been bookmarked.
     *
     * @return boolean
     */
    public function isBookmarked()
    {
        return (bool) $this->bookmarks->where('user_id', auth()->id())->count();
    }

    /**
     * Fetch the bookmarked status as a property.
     *
     * @return bool
     */
    public function getIsBookmarkedAttribute()
    {
        return $this->isBookmarked();
    }

    /**
     * Get the number of bookmarks for the model.
     *
     * @return integer
     */
    public function getBookmarksCountAttribute()
    {
        return $this->bookmarks->count();
    }
}
    