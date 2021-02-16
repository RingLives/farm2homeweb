<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class SmsApiController extends Controller
{
	public function sendMessage(Request $request)
	{
	    $validator = Validator::make($request->all(), [
	        'phone' => 'required',
	        'msg' => 'required'
	    ]);

	    if ($validator->fails()) {
	        return $this->errorResponse($validator->messages());
	    }

	    $get_code = $this->sendQueue(config('app.SMS_KEY'), 'text', $request['phone'], "Farm2Home", $request['msg']);

	    return $this->successResponse([], "Code sent successfully.");
	}

	public function sendQueue($api_key, $type, $contacts, $sender_id, $msg)
	{
        $url = "https://880sms.com/smsapi";
        $data = [
            "api_key" => $api_key,
            "type" => $type,
            "contacts" => $contacts,
            "senderid" => $sender_id,
            "msg" => $msg,
          ];

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $response = curl_exec($ch);
          curl_close($ch);

          return $response;
    }
}