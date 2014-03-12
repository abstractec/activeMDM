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
	
	
	$slim->render('config.php', array("config" => $config));
})->name("config");

$slim->run();

?>