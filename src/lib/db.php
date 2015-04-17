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
	$dev = find_device($device["udid"]);
	
	// var_dump($cur.count(true));
	
	if (isset($dev)) {
		var_dump("updating");
		update_device($device);
	} else {
		var_dump("saving");
		// we don't know about this device
		$db = get_connection();
		$db->device->save($device);
	}
	
}

function find_device($device_udid) {
	var_dump($device_udid);
	
	$db = get_connection();
	$cur = $db->device->find(array("udid" => $device_udid));
	
	if (count(iterator_to_array($cur)) > 0) {
		// get the next thing and return it
		return(iterator_to_array($cur));
	} else {
		return null;
	}
}

function update_device($device) {
	$db = get_connection();
	$ins = $db->device->update(array("udid" => $device["udid"]), $device);
	
	// var_dump($ins);
} 

function delete_device($device) {
	
}

function get_connection() {
	$m = new MongoClient(); 
	$db = $m->activemdm;
	
	return $db;
}


?>