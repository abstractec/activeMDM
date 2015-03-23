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

function save_config($id, $values) {
	$db = get_connection();

	$config = $db->config->update(array("_id" => $id), $values);
}


function get_profiles() {
	$db = get_connection();
	$cursor = $db->profile->find();
	
	$profiles = array();
	
	foreach ($cursor as $profile) {
		array_push($profiles, $profile);
	}

	return $profiles;
}

function get_profile($profile_uuid) {
	
}

// device functions

function create_device($device) {
	
}

function find_device($device_udid) {
	
}

function update_device($device) {
	
} 

function delete_device($device) {
	
}

function get_connection() {
	$m = new MongoClient(); 
	$db = $m->activemdm;
	
	return $db;
}


?>