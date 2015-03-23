<?php
require 'vendor/autoload.php';
require '../../lib/db.php';
require '../../lib/util.php';

$slim = new \Slim\Slim(array(
	'debug' => true,
	'view' => new \Slim\Views\Twig()
));

$slim->add(new \Slim\Middleware\SessionCookie(array(
		'expires' => false,
		'path' => '/',
		'domain' => null,
		'httponly' => false,
		'name' => 'wfm-session',
		'cookies.encrypt' => true,
		'secret' => $settings['auth_secret'],
		'cipher' => MCRYPT_RIJNDAEL_256,
		'cipher_mode' => MCRYPT_MODE_CBC
)));

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
$slim->get('/', function() use ($slim, $rootURL) {
	$slim->response()->redirect('index.php/index');
});

/**
The index page
*/
$slim->get('/index', function () use ($slim) {
	$slim->render('index.php');
})->name("index");

/**
Our config page
*/
$slim->get('/config', function () use ($slim) {
	$config = get_config();
	
	$slim->render('edit_config.php', array("config" => $config));
})->name("config");

$slim->post('/config', function () use ($slim) {
	$config = get_config();
	
	// only save what we're expecting
	$values = array();
	$values["access_rights"] = $_POST["access_rights"];	
	$values["organisation_name"] = $_POST["organisation_name"];
	$values["master_profile_uuid"] = $_POST["master_profile_uuid"];
	$values["cert_uuid"] = $_POST["cert_uuid"];
	$values["mdm_uuid"] = $_POST["mdm_uuid"];
	$values["mdm_certificate_password"] = $_POST["mdm_certificate_password"];
	$values["mdm_topic"] = $_POST["mdm_topic"];
	$values["check_in_url"] = $_POST["check_in_url"];
	$values["service_url"] = $_POST["service_url"];
	
	if ($_FILES["mdm_certificate"]['size'] > 0 and $_FILES["mdm_certificate"]["error"] > 0) {
		$slim->flashNow('error', 'MDM Cerfiticate failed to upload');
	} else {
		if ($_FILES["mdm_certificate"]['size'] > 0) {
			$data = file_get_contents($_FILES['mdm_certificate']['tmp_name']);
			$data = base64_encode($data);
			
			$values["mdm_certificate"] = $data;
		}
		
		save_config($config["_id"], $values);
		$slim->flashNow('success', 'Config Saved');
		$config = get_config();
	}
	

	
	$slim->render('edit_config.php', array("config" => $config));
	
	
})->name("save_config");

/**
Our profiles pages
*/
$slim->get('/profiles', function () use ($slim) {
	$profiles = get_profiles();
	
	if (count($profiles) == 0) {
		$slim->flashNow('info', 'No existing profiles');
	}

	$slim->render('profiles/profiles.php', array("profiles" => $profiles));
})->name("profiles");

$slim->get('/profiles/new', function () use ($slim) {
	$slim->render('profiles/types.php');
})->name("new_profile");

$slim->get('/profiles/new/passcode', function () use ($slim) {
	$slim->render('profiles/passcode.php');
})->name("new_passcode_profile");

$slim->post('/profiles/:profile_id', function ($profile_id) use ($slim) {
	if ($_POST["type"] == "passcode") {
		$values = passcode_profile_array($_POST);
		
		// TODO: update my profile
	}
})->name("update_profile")->conditions(array('profile_id' => '\d+'));

$slim->post('/profiles/new', function () use ($slim) {
	// TODO: save this - do we have to save each profile type individually?
	if ($_POST["type"] == "passcode") {
		$values = passcode_profile_array($_POST);
		
		// TODO: create a new profile
	}
	
})->name("create_profile");

$slim->run();

?>