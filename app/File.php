<?php

namespace App;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasUuid;

    protected $table = 'files';

    protected $fillable = [
        'name', 'filepath', 'filename', 'extension',
        'category', 'title', 'description'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
}
