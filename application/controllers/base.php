<?php

class Base_Controller extends Controller {



	public function __construct() {
		Asset::add("bootstrap-css", "assets/bootstrap/css/bootstrap.min.css");
		Asset::add("bootstrap-css-responsive", "assets/bootstrap/css/bootstrap-responsive.min.css");
		Asset::add("jQuery", "http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js");
		Asset::add("style", "css/style.css");

		Asset::add("socket", "http://localhost:3030/socket.io/socket.io.js");
		Asset::add("cassie-client", "components/cassie-client.js/cassie-client.js");

		Asset::add("script", "js/main.js");

		parent::__construct();
	}


	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}