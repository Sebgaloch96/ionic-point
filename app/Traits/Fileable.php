<?php

namespace App\Traits;

use App\File;

trait Fileable {

    protected static function bootFileable()
    { 
        static::deleting(function ($model) {
            $model->files->each->delete();
        });
    }

    /**
     * A model can be bookmarked
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}