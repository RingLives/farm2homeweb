<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const CUSTOMER_GUARD = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'phone_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	//use user id of admin
	protected $primaryKey = 'id';

    /**
     * @return boolean
     */
    public static function isVerifiedRegistration($user_id = null)
    {
        $data = static::where('id', auth()->guard(self::CUSTOMER_GUARD)->user()->id ?? $user_id)
            ->where(function($query) {
                $query->whereNotNull('email_verified_at')
                    ->orWhereNotNull('phone_verified_at');
            })
            ->exists();

        return $data ? true : false;
    }
}
