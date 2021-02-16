<?php

namespace App\Http\Controllers\App\Resource;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Controllers\App\Concerns\Collection;

/**
 * @author shohid <sohidurr49@gmail.com>
 */
class ApiResourceCollection extends ResourceCollection
{
	use Collection;

	/**
	 * Transform the resource collection into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		// $message = $this->message ?? 'success';
		$message = $this->message ?? (count($this->collection) > 0 ? 'success' : 'We didn\'t find any result');
		
		// $success = count($this->collection) > 0;

		$success = true;

		// $error = ! $success ? ['errors' => $message ?? ''] : [];

		$error = ['errors' => $message ?? ''];

	    return [
	        'success' => $success,
	        'message' => $message,
	        'data' => $this->data(),
	    ] + $error;
	}

	/**
	 * Handel collection data
	 *
	 * @return mixed
	 */
	protected function data()
	{
		return count($this->collection) > 0 ? $this->collection : null;
	}
}