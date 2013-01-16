<?php

// map class name to file
Autoloader::map(array(
	'FileOAuth' => __DIR__.'/libraries/fileoauth.php',
));

// register the auth driver
Auth::extend('FileOAuth', function()
{
	return new FileOAuth();
});