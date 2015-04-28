<?php
require 'vendor/autoload.php';
require '../../lib/db.php';
require '../../lib/util.php';
require '../../lib/command.php';

function __autoload($class_name) {
    include '../../lib/Classes/'.$class_name . '.php';
}

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
$slim->put('/', function() use ($slim) {
	$body = $slim->request->getBody();
	
	if (!isset($body) || strlen($body) == 0) {
		$app->response()->status(401); // not authorised
	} else {	
		$plist = new \CFPropertyList\CFPropertyList();
		$plist->parse($body);
		
		$message = $plist->toArray();
		
		$udid = $message["UDID"];
		
		$device = find_device($udid);
		
		// do we have any commands for this device?
		if (isset($message["CommandUUID"])) {
			// responding to message
			// find my command on the queue and move it
			$queue_command = find_queue_command($message["CommandUUID"]);
			
			if (isset($queue_command)) {
				delete_queue_command($queue_command);
			}
			
			
		} else {
			// we're just responding to an initial request
			log_device_status($device, $message["Status"]);
		}
		
		$command = next_command_for_device($device);
		
		if (isset($command) > 0) {
			// send back the first command
			$inner_command = $command["command"];
		
			$res_plist = new \CFPropertyList\CFPropertyList();
			$res_plist->add( $dict = new \CFPropertyList\CFDictionary() );
			$request_dict = new \CFPropertyList\CFDictionary();
			
			if ($inner_command["Command"]["RequestType"] == "DeviceLock") {
				$request_dict->add('RequestType', new \CFPropertyList\CFString("DeviceLock"));
			}
			
			$dict->add("Command", $request_dict);
			$dict->add("CommandUUID", new \CFPropertyList\CFString($inner_command["CommandUUID"]));			
			
			echo ($res_plist->toXML(true));
		} else {
			// empty plist for you
			$res_plist = new \CFPropertyList\CFPropertyList();
			$res_plist->add( $dict = new \CFPropertyList\CFDictionary() );
			
			echo ($res_plist->toXML(true));
		}
		
	}
});

$slim->get('/checkin', function() use ($slim) {
	//doCheckin($slim);
});

$slim->put('/checkin', function () use ($slim) {
	// read data, do things
	
	$body = $slim->request->getBody();

	if (!isset($body) || strlen($body) == 0) {
		$slim->response()->status(401); // not authorised
	} else {
		$body = str_replace("#012", "", $body);
		$body = str_replace("#011", "", $body);
		syslog(LOG_DEBUG, "c");
		
		syslog(LOG_DEBUG, $body);

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
});



$slim->run();



?>
