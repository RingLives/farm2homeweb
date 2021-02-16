<?php

namespace App\Http\Controllers\App\Concerns;

/**
 * @author shohid <sohidurr49@gmail.com>
 */
trait Collection
{
	/**
	 * Put message the resource collection
	 */
	protected $message;

	/**
	 *
	 */
	public function message(string $message = '')
	{	
		$this->message = $message;

		return $this;
	}
}