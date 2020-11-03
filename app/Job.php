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

        static::created(function ($model) {    
            if ($model->id) {
                $model->ref = 'J'.$model->id;
                $model->save();
            }
        });
    }
}
