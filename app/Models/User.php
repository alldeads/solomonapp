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
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'available_points',
        'status',
        'sponsor_id',
        'commission',
        'direct_recruits'
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

    public function scopeActive($query)
    {
        $query->where('status', 'active');
    }

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

    public static function pass_up_points($user_id, $points)
    {
        $level = 5;
        $count = 0;

        do {
            $user = User::find($user_id);

            if ( !$user ) {
                return;
            }

            if ( $user->status == 'active' ) {
                $user->available_points = $user->available_points + $points;
                $user->save();
            }
            
            $user_id = $user->sponsor_id;

            $count++;

        } while ($count != $level);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function items()
    {
        return $this->hasMany(ItemHistory::class);
    }
}
