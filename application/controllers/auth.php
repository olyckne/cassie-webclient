<?php

class Auth_Controller extends Base_Controller {

 	public function action_index() {
		return View::make('login');
 	}

 	public function action_login($service="github") {
 		Bundle::start("laravel-oauth2");

 		if($service != "github") return;

 		$provider = OAuth2::provider($service, array(
 			'id' => '5bb420dd128b742c70d4',
 			'secret' => '0f9b63d8ef04c5d9b26d9674761668ab61a8fe3d'
 		));


 		if(!Input::get('code')) return $provider->authorize();
 		
 		try {
 			$params = $provider->access(Input::get('code'));
 			$token = new OAuth2_Token_Access(array(
 				'access_token' => $params->access_token
 			));

            $user = $provider->get_user_info($token);

            if(Auth::attempt(array(
            	'provider' => $service, 
            	'username' => $user['nickname']))) {
            	Session::put('user', $user);
	            return Redirect::to_action('chat@index');
            } else {
            	return Redirect::to_action('auth@index')->with("status", "Couldn't login");
            }

 		} catch(OAuth2_Exception $e) {
 			echo "Oops! $e";
 		}

 	}

 	public function action_logout() {
 		Auth::logout();
 		return Redirect::to_action('auth@index');
 	}
}