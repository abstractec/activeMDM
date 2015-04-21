<?php
require 'vendor/autoload.php';
require '../../lib/db.php';

$slim = new \Slim\Slim(array(
	'debug' => true,
	'view' => new \Slim\Views\Twig()
));

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
});

/**
The enrolment page
*/
$slim->get('/enrol', function () use ($slim) {
	// $slim->contentType('application/x-apple-aspen-config');
	
	$config = get_config();

	if (!isset($config)) {
		$config = array(
			"access_rights" => 1024,
			"organisation_name" => "Abstractec",
			"master_profile_uuid" => "1234",
			"cert_uuid" => "4567",
			"mdm_uuid" => "7890",
			
			"mdm_certificate" => "certificate",
			"mdm_certificate_password" => "password",
			
			"mdm_topic" => "com.abstractec.mdm",
			
			"check_in_url" => "http://127.0.0.1:8888/~jimbob/service/checkin",
			"service_url" => "http://127.0.0.1:8888/~jimbob/service",
		);
	}
	
	$slim->response->headers->set('Content-Type', 'application/x-apple-aspen-config');
	
	$slim->render('profile.php', array("config" => $config));
})->name('enrol');

$slim->run();

?>
