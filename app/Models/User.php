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
        'lifetime',
        'direct_recruits',
        'ppb', 'hppb'
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

                if ( $count != 0 ) {
                    $user->hppb += $points;
                }

                $user->save();
            }
            
            $user_id = $user->sponsor_id;

            $count++;

        } while ($count != $level);
    }

    public static function count_user_downlines()
    {
        $count = 0;

        foreach (auth()->user()->downlines as $downline) { // 1st Level
            $count++;
            foreach ($downline->downlines as $a) { // 2nd Level
                $count++;
                foreach ($a->downlines as $b) { // 3nd Level
                    $count++;
                    foreach ($b->downlines as $c) { // 4th Level
                        $count++;
                        foreach ($c->downlines as $d) { // 5th Level
                            $count++;
                        }
                    }
                }
            }
        }

        return $count;
    }

    public static function get_user_downlines()
    {
        $arr = [];

        $arr[0][] = auth()->user();

        foreach (auth()->user()->downlines as $downline) { // 1st Level
            $arr[1][] = $downline;
            foreach ($downline->downlines as $a) { // 2nd Level
                $arr[2][] = $a;
                foreach ($a->downlines as $b) { // 3nd Level
                    $arr[3][] = $b;
                    foreach ($b->downlines as $c) { // 4th Level
                        $arr[4][] = $c;
                    }
                }
            }
        }

        return $arr;
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    public function downlines()
    {
        return $this->hasMany(User::class, 'sponsor_id');
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

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
