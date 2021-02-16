<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /** @var error message **/
	protected $errorMessage = '';
	
    /**
	 * Handle a success response for a current request
	 *
	 * @param  mixed $data
     * @param  string $message
	 * @return \Illuminate\Http\Response
	 */
	public function successResponse(
				$data = [], string $message = 'success')
	{
		return response()->json([
				'success' => true,
		        'errors' => $message,
		        'message' => $message,
		        'data' => $data ?? null
			]);
	}

	/**
	 * Handle a failed response for a current request
	 *
	 * @param  mixed $data
     * @param  string $message
	 * @return \Illuminate\Http\Response
	 */
	public function errorResponse($data = [], string $message = 'failed')
	{
		$data = ! is_array($data) ? json_decode($data, true) : $data;

		foreach ($data as $key => $value) {
			$this->errorMessage .= " ". ($data[$key][0] ?? '').'\n';
		}

		return response()->json([
				'success' => false,
		        'message' => $message,
		        'errors' => !empty($this->errorMessage) ? trim($this->errorMessage) : $message,
		        'data' => null,
			]);
	}

	public function rand_number( $length ) {
		$chars = "0123456789";	
		$size = strlen( $chars );
		$str = '';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
}
