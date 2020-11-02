<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid {

    public static function boot()
    {
        parent::boot(); 

        static::creating(function ($model) {
            $model->{$model->getRouteKeyName()} = Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}