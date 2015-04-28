<?php

// ----------------------------------------------------------------------------
// Config functions
// ----------------------------------------------------------------------------

function get_config() {
	$db = get_connection();
	
	$conf = $db->config->find();	
	
	if ($conf->count() == 0) {
		return null;
	} else {
        $values = $conf->getNext();
        $config = new Config();
        $config->setValues($values);
        $config->id = $values["_id"];

		return $config;
	}	
}

function save_config($id, $config) {
	$db = get_connection();
	
	$check_config = get_config();
	
	if (!isset($check_config)) {
		$db->config->save($config);
	} else {
		$db->config->update(array("_id" => $id), $config);
	}
}

// ----------------------------------------------------------------------------
// Profile functions
// ----------------------------------------------------------------------------

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

// ----------------------------------------------------------------------------
// device functions
// ----------------------------------------------------------------------------

function create_device($device) {
	$dev = find_device($device["udid"]);
	
	// var_dump($cur.count(true));
	
	if (isset($dev)) {
		update_device($device);
	} else {
		// we don't know about this device
		$db = get_connection();
		
		$device["created"] = timestamp();
		$db->device->save($device);
	}	
}

function find_device($device_udid) {
	$db = get_connection();
	$cur = $db->device->findOne(array("udid" => $device_udid));
	
	if (isset($cur)) {
		// get the next thing and return it
		return($cur);
	} else {
		return null;
	}
}

function update_device($device) {
	$db = get_connection();
	$ins = $db->device->update(array("udid" => $device["udid"]), $device);
} 

function delete_device($device) {
	$db = get_connection();
	$ins = $db->device->delete(array("udid" => $device["udid"]));
}

function all_devices() {
	$db = get_connection();
	$cur = $db->device->find();
	
	return iterator_to_array($cur);
}

// ----------------------------------------------------------------------------
// Status functions
// ----------------------------------------------------------------------------

function add_device_status($device_udid, $status) {
	$db = get_connection();
	$db->status->save(array("device_udid" => $device_udid, 
							"status" => $status, 
							"created" => timestamp()));
}

// ----------------------------------------------------------------------------
// Command functions
// ----------------------------------------------------------------------------

function add_command($device, $command) {
	$db = get_connection();
	$db->queue->save(array("device_udid" => $device["udid"], 
							"command" => $command, 
							"created" => timestamp()));
	
}

function next_command_for_device($device) {
	$db = get_connection();
	$cur = $db->queue->findOne(array("device_udid" => $device["udid"]));
	
	return $cur;
}
	

function commands_for_device($device) {
	$db = get_connection();
	$cur = $db->queue->find(array("device_udid" => $device["udid"]));
	
	return iterator_to_array($cur);
}

// ----------------------------------------------------------------------------
// Queue functions
// ----------------------------------------------------------------------------
function find_queue_command($command_uuid) {
	$db = get_connection();
	
	$query = "{\"command.CommandUUID\" : { \$in : [\"$command_uuid\"]}}";
	
	$cur = $db->queue->findOne(array("command.CommandUUID" => $command_uuid));
	
	return $cur;
}

function delete_queue_command($queue_command) {
	$db = get_connection();
	$cur = $db->queue->remove(array('_id' => $queue_command["_id"]));
}

// ----------------------------------------------------------------------------
// Connection stuff
// ----------------------------------------------------------------------------

function get_connection() {
	$m = new MongoClient(); 
	$db = $m->activemdm;
	
	return $db;
}


?>