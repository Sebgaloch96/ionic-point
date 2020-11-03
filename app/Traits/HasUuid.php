<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid {

    public static function bootHasUuid()
    {
        parent::boot(); 

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