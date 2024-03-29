<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
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

    public function subjects(){
        if ($this->role == "teacher") {
            return $this->hasMany(Subject::class);
        } else {
            return $this->belongsToMany(Subject::class)->as('selectSubject');
        }
    }

    public function hasTheSubject($subject){         //tárgy le-fel vevésének a funkciójához kell
        return $this->subjects->contains($subject);
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }
}
