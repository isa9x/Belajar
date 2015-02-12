<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
public $restful = true;
/*** Catch-all method for requests that can't be matched.
*
* @param string $method
* @param array $parameters
* @return Response
*/


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
