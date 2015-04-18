<?php

// ----------------------------------------------------------------------------
// Device Lock function
// ----------------------------------------------------------------------------

use \Rhumsaa\Uuid\Uuid;

function create_device_lock() {
	$command = array();
	$commandContent = array();
	
	$commandContent["RequestType"] = "DeviceLock";
	
	$command["CommandUUID"] = \Rhumsaa\Uuid\Uuid::uuid4()->toString();
	$command["Command"] = $commandContent;
	
	var_dump($command);
	
	return $command;
}
