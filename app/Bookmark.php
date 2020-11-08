<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';

    protected $fillable = [
        'bookmarkable_id',
        'bookmarkable_type',
        'user_id'
    ];

    public function bookmarkable()
    {
        return $this->morphTo();
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
