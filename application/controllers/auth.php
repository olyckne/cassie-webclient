<?php

class Auth_Controller extends Base_Controller {

 	public function action_index() {
		return View::make('login');
 	}


 	public function action_login($service="cassie") {
 		Bundle::start("laravel-oauth2");

 		if(Input::has("code")) $service = "github";

 		if($service == "github") {
 			$conf = Config::get("fileoauth::users");

	 		$provider = OAuth2::provider($service, array(
	 			'id' => $conf['services']['github']['app_id'],
	 			'secret' => $conf['services']['github']['app_secret']
	 		));


	 		if(!Input::get('code')) return $provider->authorize();
	 		
	 		try {
	 			$params = $provider->access(Input::get('code'));
	 			$token = new OAuth2_Token_Access(array(
	 				'access_token' => $params->access_token
	 			));

	            $user = $provider->get_user_info($token);
	            $params = array('username' => $user['nickname']);
	 		} catch(OAuth2_Exception $e) {
	 			echo "Oops! $e";
	 		}
		} else if($service == "cassie") {
			
			$params = array(
					'username'=> Input::get('username'),
					'password' => Input::get('password')
				);
			$user = $params;
		} else {
		}
		$params['provider'] = $service;

        if(Auth::attempt($params)) {
        	Session::put('user', $user);
            return Redirect::to_action('chat@index');
        } else {
        	return Redirect::to_action('auth@index')->with("status", "Couldn't login");
        }


 	}

 	public function action_logout() {
 		Auth::logout();
 		return Redirect::to_action('auth@index');
 	}
}