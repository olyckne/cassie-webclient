<?php


class FileOauth extends Laravel\Auth\Drivers\Driver {



	public function retrieve($id) {
		if(filter_var($id, FILTER_VALIDATE_INT) !== false) {
			$users = Config::get("fileoauth::users");
			foreach($users as $arr) {
				foreach($arr as $a) {
					$user = ($a['id'] == $id);
					if($user) break;
				}
				if($user) break;
			}

			if($user) {
				return (object) $user;
			}
		}
	}

	public function attempt($arguments = array()) {
		$users = Config::get("fileoauth::users");
		$user = false;
		$ok = false;

		if(array_key_exists($arguments['provider'], $users)) {
			foreach ($users[$arguments['provider']] as $arr) {
				if($arr['username'] == $arguments['username']) {
					if($arguments['provider'] == 'cassie') {
						var_dump($arr);
						if(Hash::check($arguments['password'], $arr['password']))
							$ok = true;
					} else {
						$ok = true;
					}
					if($ok)	{
						$user = $arr;
						break;
					}
				}
			}
		}
		if($user) {
			return $this->login($user['id'], array_get($arguments, 'remember'));
		} else {
			return false;
		}

	}
}