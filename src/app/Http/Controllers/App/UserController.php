<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\App\Resource\ApiResourceCollection;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;

class UserController extends Controller
{
	public function checkMobileNumber(Request $request)
	{
	    $validator = Validator::make($request->all(),[
	        'phone' => 'required|string',
	    ]);

	    if($validator->fails())
	    {
	        return $this->errorResponse($validator->messages());
	    }
	    $get = User::where('phone', $request['phone'])->exists();

	    if ($get){
	        return $this->errorResponse([],'Phone Number already exists.');
	    }else {
	        return $this->successResponse([], 'Phone Number is available');
	    }
	}
	/**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
    	$validator = Validator::make($request->all(),[
            'phone' => 'required',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails())
        {
            return $this->errorResponse($validator->messages());
        }

        $response = User::where('phone', $request['phone'])->first();

        if($response){
            $this->resetPassword($response, $request['password']);

            return (new ApiResourceCollection(collect($response->toArray())))->message('Successfully reset password.');
        }

        return (new ApiResourceCollection(collect([])))->message('Failed to reset password.');
    }
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->update();

        event(new PasswordReset($user));

        $this->guard(User::CUSTOMER_GUARD)->login($user);

        $this->setAccessToken($user);
    }
    /**
     * Set the user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }
    protected function setAccessToken($user)
    {
        // $user->access_token = $user->createToken(Str::random(60))->accessToken;
    }
    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($guard = null)
    {
        return Auth::guard($guard);
    }
}