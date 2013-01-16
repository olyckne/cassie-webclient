<?php

return array(
	'use' => 'cassie',
	'services' => array(
		'cassie' => array(
				'users' => array(
					array(
						'id' => 1,
						'username' => 'your_username',
						'password' => Hash::make('your_password'),
					)
				),
			),
		'github' => array(
				'app_id'	=> 'APP_ID',
				'app_secret' => 'APP_SECRET',
	 			'users' =>	array(
	 				array(
						'id' => 2,
						'username'	=> 'github_username',
					)
				),
			)
	)
);