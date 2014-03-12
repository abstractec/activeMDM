<?php

function get_config() {
	$db = get_connection();
	
	$config = $db->config->find();
	
	if ($config->count() == 0) {
		return null;
	} else {
		return $config->getNext();
	}	
}

function get_profile($profile_uuid) {
	
}


function get_connection() {
	$m = new MongoClient(); 
	$db = $m->activemdm;
	
	return $db;
}


?>