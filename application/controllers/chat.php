<?php


class Chat_Controller extends Base_Controller {

	public function __construct() {
//		$this->filter("before", "auth");
	}


	public function action_index() {
		echo 'chat';
	}
}