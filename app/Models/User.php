<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getReferralLinkAttribute($value)
    { 
        $link = env('APP_ENV') != 'local' ? "https://solomonapp.com/" : "http://solomonapp.test/";

        return $link . "site/" . $this->username;
    }

    public function getFullNameAttribute($value)
    {
        return $this->first_name . " " . $this->last_name;
    }

    public static function checkIfUsernameExists($username)
    {
        $user = User::where('username', $username)->first();

        if ( !$user ) {
            return false;
        }

        return true;
    }
}
