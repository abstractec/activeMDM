<?php

function passcode_profile_array($post_values) {
	$values = array();
	
	$values["allowSimple"] = $_POST["allowSimple"];
	$values["requireAlphanumeric"] = $_POST["requireAlphanumeric"];
	$values["minLength"] = $_POST["minLength"];
	$values["minComplexChars"] = $_POST["minComplexChars"];
	$values["maxPINAgeInDays"] = $_POST["maxPINAgeInDays"];
	$values["maxInactivity"] = $_POST["maxInactivity"];
	$values["pinHistory"] = $_POST["pinHistory"];
	$values["maxGracePeriod"] = $_POST["maxGracePeriod"];
	$values["maxFailedAttempts"] = $_POST["maxFailedAttempts"];

	return values;
}

function update_device_token($plist_array) {
	// find my device
	$device_udid = $plist_array->UDID;
	
	$device = find_device($device_udid);
	
	$device->PushMagic = $plist_array->PushMagic;
	$device->UnlockToken = $plist_array->UnlockToken;
	$device->Token = $plist_array->Token;
}

function check_out_device($plist_array) {
	$device_udid = $plist_array->UDID;
	
	$device = find_device($device_udid);
	$device->CheckoutDate = time();
}

?>