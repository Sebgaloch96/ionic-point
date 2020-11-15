<?php

namespace App;

use App\Bookmark;
use App\Traits\HasUuid;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasUuid, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs() 
    {
        return $this->belongsToMany('App\Job', 'job_user', 'user_id', 'job_id');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
