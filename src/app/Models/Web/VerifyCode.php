<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class VerifyCode extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'code', 'revoked', 'is_email', 'is_phone'
    ];

    public function scopeIsEmail($query)
    {
    	$query->where('is_email', request('is_email', 1));
    }

    public function scopeIsPhone($query)
    {
        $query->where('is_phone', request('is_phone', 1));
    }

    public function scopeRevoked($query)
    {
        $query->where('revoked', request('revoked', 0));
    }

    public static function getEmailCode($user_id = null)
    {
    	return static::revoked()->isEmail()->where('user_id', request('user_id', $user_id))->first();
    }

    public static function getPhoneCode($user_id = null)
    {
        return static::revoked()->isPhone()->where('user_id', request('user_id', $user_id))->first();
    }

    public static function hasPhoneCode($code = null, $user_id = null)
    {
    	$code = request('code', $code);
    	$user_id = decrypt(request('lt')) ?? $user_id;

    	return static::revoked()
                ->isPhone()
    			->where('code', $code)
    			->where('user_id', $user_id ?? auth()->guard('customer')->user()->id)
    			->first();
    }
    public static function hasEmailCode($code = null, $user_id = null)
    {
        $code = request('ls', $code);
        $user_id = decrypt(request('lt')) ?? $user_id;

        return static::revoked()
                ->isEmail()
                ->where('code', $code)
                ->where('user_id', $user_id)
                ->first();
    }
}