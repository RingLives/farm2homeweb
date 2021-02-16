<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Web\ThemeController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller;
use App\Models\Web\Languages;
use App\Models\Web\VerifyCode;
use App\Models\Web\Products;
use Illuminate\Http\Request;
use App\Models\Web\Currency;
use Illuminate\Support\Str;
use App\Models\Web\Order;
use App\Models\Web\Index;
use App\Models\Web\News;
use Carbon\Carbon;
use App\User;
use Validator;
use Lang;

class VerifiedController extends Controller
{
	public function __construct (
		        Index $index, News $news, Languages $languages,
		        Products $products, Currency $currency, Order $order
						)
	{
		$this->index = $index;
		$this->order = $order;
		$this->news = $news;
		$this->languages = $languages;
		$this->products = $products;
		$this->currencies = $currency;
		$this->theme = new ThemeController();
	}

	public function verifyView()
	{	
		$title = array('pageTitle' => Lang::get("website.Login"));
		$final_theme = $this->theme->theme();

		$result = array();
		$result['commonContent'] = $this->index->commonContent();

		return view("verify", [
				'title' => $title,
				'final_theme' => $final_theme,
				'user' => auth()->guard('customer')->user(),
			])
			->with('result', $result);
	}

	public function verifiedView(Request $request)
	{	
		$title = array('pageTitle' => Lang::get("website.Login"));
		$final_theme = $this->theme->theme();

		$result = array();
		$result['commonContent'] = $this->index->commonContent();

		return view("verified", [
				'title' => $title,
				'final_theme' => $final_theme,
				'data' => $request->all(),
				'user' => auth()->guard('customer')->user(),
			])
			->with('result', $result);
	}

	public function sendCode(Request $request)
	{
		$validator = Validator($request->all(), [
					'verify' => 'required',
				]);

		if($validator->fails())
		{
			return redirect()->back()->withInput($request->input())->withError("Select a option.");
		}

		$verify_to = $request->get('verify');

		if(is_numeric($verify_to))
	    {
	    	$sendcode = [];

	    	if(! $verifyCode = VerifyCode::getPhoneCode($user_id = auth()->guard('customer')->user()->id ?? ''))
	    	{
	    		$verifyCode = new VerifyCode();
	    		$verifyCode->user_id = $user_id;
	    		$verifyCode->is_phone= 1;
	    		$verifyCode->code = mt_rand(100000, 999999);
	    		$verifyCode->save();
	    	}

	    	if(isset($verifyCode->code) && $verifyCode->code)
	    	{
		    	$msg = 'Your Farm2homebd verification code: '.$verifyCode->code ;
		    	$sendcode = $this->sendMessagePhone(['msg' => $msg, 'phone' => $verify_to]);
	    	}

	    	if(isset($sendcode->success) && $sendcode->success)
	    	{
	    		return redirect()->action('VerifiedController@verifiedView', [
	    			'phone' => $verify_to,
	    			'lt' => encrypt($user_id),
	    		]);
	    	}
	    	return redirect()->action('VerifiedController@verifiedView', [
	    		'lt' => encrypt($user_id),
	    		'phone_verified' => 0,
	    	]);
	    }else{

	    	if(! $verifyCode = VerifyCode::getEmailCode($user_id = auth()->guard('customer')->user()->id ?? ''))
	    	{
	    		$verifyCode = new VerifyCode();
	    		$verifyCode->user_id = $user_id;
	    		$verifyCode->is_email = 1;
	    		$verifyCode->code = Str::random(20);
	    		$verifyCode->save();
	    	}

	    	$first_name = auth()->guard('customer')->user()->first_name ?? '';

	    	$last_name = auth()->guard('customer')->user()->last_name ?? '';

	    	$userName = $first_name." ".$last_name;

	    	$verifyLink = route('email_verified', [
	    			'ls' => $verifyCode->code ?? '',
	    			'lt' => encrypt($user_id) ?? '',
	    		]);

	    	$data = array(
	    		'name'=> $userName,
	    		'verify_link'=> $verifyLink,
	    	);

			try {
				Mail::send('mail', $data, function($message) use ($verify_to){

			   	$message->to($verify_to, 'farm2homebd')
			   	->subject('User Verification');

			   	$message->from('noreaply@gmail.com', 'farm2homebd');
				});
			} catch (\Exception $e) {
				return redirect()->action('VerifiedController@verifiedView', [
	    			'lt' => encrypt($user_id),
	    			'email_verified' => 0,
	    		]);
			}

			return redirect()->action('VerifiedController@verifiedView', [
	    			'email' => $verify_to,
	    			'lt' => encrypt($user_id),
	    		]);
	    }
	    return redirect(route('verified_view'))->with('sendcode', true)->with('message', ' link in your email');
	}

	public function verifiedByPhone(Request $request)
	{
		$code = $request->get('code');
		$lt = decrypt($request->get('lt'));

		if($verifyCode = VerifyCode::hasPhoneCode())
		{
			$verifyCode->revoked = 1;
			$verifyCode->update();

			$user = User::find($lt);
			$user->phone_verified_at = Carbon::now();
			$user->phone_verified = 1;
			$user->update();

			return redirect()->action('VerifiedController@verifiedView', [
				'lt' => encrypt($lt),
				'phone_verified' => 1,
			]);
		}

		return redirect()->action('VerifiedController@verifiedView', [
				'lt' => encrypt($lt),
				'phone_verified' => 0,
			]);
		
	}
	public function verifiedByEmail(Request $request)
	{
		$ls = $request->ls ?? '';
		$lt = decrypt($request->lt) ?? '';

		if($verifyCode = VerifyCode::hasEmailCode())
		{
			$verifyCode->revoked = 1;
			$verifyCode->update();

			$user = User::find($lt);
			$user->email_verified_at = Carbon::now();
			$user->update();

			return redirect()->action('VerifiedController@verifiedView', [
	    			'lt' => encrypt($lt),
	    			'email_verified' => 1,
	    		]);
		}
		return redirect()->action('VerifiedController@verifiedView', [
	    			'lt' => encrypt($lt),
	    			'email_verified' => 1,
	    		]);
	}


	public function sendMessagePhone($data){
		$body = [];
		try {
		    $client = new \GuzzleHttp\Client([
		      'base_uri' => "http://www.farm2homebd.com/",
		    ]);
		    $request = $client->post('api/send/message', [
	          'body' => json_encode($data),
	          'headers' => [
	            'Content-Type' => 'application/json',
	          ]
	        ]);
	    	$body = $request->getBody();
		} catch (\Exception $e) {
			return redirect()->action('VerifiedController@verifiedView', [
					'lt' => encrypt($lt ?? ''),
					'phone_verified' => 0,
				]);
		}
	    
	    return json_decode($body);
	}

	public function sendAgainCode(Request $request)
	{
		$code = $request->get('code');
		$lt = decrypt($request->get('lt'));

		$user_id = auth()->guard('customer')->user()->id ?? '';

		$verifyCode = VerifyCode::revoked()
                ->isPhone()
                ->where('user_id', $user_id)
                ->first();

		if($verifyCode)
		{
			$verify_to = auth()->guard('customer')->user()->phone ?? 0;

			if($verify_to)
			{
		    	if(isset($verifyCode->code) && $verifyCode->code)
		    	{
			    	$msg = 'Your Farm2homebd verification code: '.$verifyCode->code ;
			    	$sendcode = $this->sendMessagePhone(['msg' => $msg, 'phone' => $verify_to]);
		    	}

		    	if(isset($sendcode->success) && $sendcode->success)
		    	{
		    		return redirect()->action('VerifiedController@verifiedView', [
		    			'phone' => $verify_to,
		    			'lt' => encrypt($user_id),
		    		])->withSuccess("Successfully sent code.");
		    	}
			}
	    	
		}

		return redirect()->action('VerifiedController@verifiedView', [
				'lt' => encrypt($user_id),
				'phone_verified' => 0,
			])->withError("Please try again later.");
	}
}