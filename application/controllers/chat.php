<?php


class Chat_Controller extends Base_Controller {

	public function __construct() {
		$this->filter("before", "auth");
		
		parent::__construct();
	}


	public function action_index() {
		return View::make('chat');
	}
}