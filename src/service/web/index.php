<?php
require 'vendor/autoload.php';
require '../../lib/db.php';
require '../../lib/util.php';

$slim = new \Slim\Slim(array(
	'debug' => true,
	'view' => new \Slim\Views\Twig()
));

// $slim->add(new \Slim\Middleware\SessionCookie(array(
// 		'expires' => false,
// 		'path' => '/',
// 		'domain' => null,
// 		'httponly' => false,
// 		'name' => 'wfm-session',
// 		'cookies.encrypt' => true,
// 		'secret' => "123123", //$settings['auth_secret'],
// 		'cipher' => MCRYPT_RIJNDAEL_256,
// 		'cipher_mode' => MCRYPT_MODE_CBC
// )));

$view = $slim->view();
$view->parserOptions = array(
	'debug' => true
);

$view->parserExtensions = array(
	new \Slim\Views\TwigExtension(),
);

/**
Root URL
*/
$slim->get('/', function() use ($slim) {
	$slim->response()->redirect('index.php/index');
});

/**
The index page
*/
$slim->get('/index', function () use ($slim) {
	$slim->render('index.php');
})->name("index");

$slim->put('/checkin', function () use ($slim) {
	// read data, do things
	
	$body = $slim->request->getBody();
	
	if (!isset($body) || strlen($body) == 0) {
		$app->response()->status(401); // not authorised
	} else {
		$plist = new \CFPropertyList\CFPropertyList();
		$plist->parse($body);
		
		$message = $plist->toArray();
		$message_type = $message["MessageType"];
		
		if ($message_type == "Authenticate") {
			// TODO: authentication
			
			// grab our UUID and create/update our data
			$udid = $message["UDID"];
			
			$device = array();
			$device["udid"] = $udid;
			
			// we just return an 'OK' here
			create_device($device);
			
			// now, send back a response
			$res_plist = new \CFPropertyList\CFPropertyList();
			$res_plist->add( $dict = new \CFPropertyList\CFDictionary() );
			
			
			echo ($res_plist->toXML());
		} elseif ($message_type == "TokenUpdate") {
			update_device_token($message);
			
			$res_plist = new \CFPropertyList\CFPropertyList();
			$res_plist->add( $dict = new \CFPropertyList\CFDictionary() );
			
			echo ($res_plist->toXML());
		} elseif ($message_type == "CheckOut") {
			check_out_device($message);
			
			// the device is leaving our MDM zone, so we need to set the values for 
			// this in the correct place
			
		}
	}
	
	// $slim->render('index.php');
})->name("checkin");



$slim->run();



?>