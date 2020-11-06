<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid {

    protected static function bootHasUuid()
    { 
        static::creating(function ($model) {
            if ($model->uuid) {
                return;
            }

            $model->{$model->getRouteKeyName()} = Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}