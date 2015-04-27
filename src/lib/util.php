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
	$device = find_device($plist_array["UDID"]);
	
	if (isset($device)) {
		$device["udid"] = $plist_array["UDID"];
		$device["pushMagic"] = $plist_array["PushMagic"];
		//$device["unlockToken"] = $plist_array["Token"];
		//$device["token"] = $plist_array["Token"];
		
		update_device($device);
	} 
}

function check_out_device($plist_array) {
	$device = find_device($plist_array["UDID"]);
	
	$device["checkoutDate"] = time();

	update_device($device);
}

function log_device_status($device, $status) {
	$device = find_device($device["udid"]);
	
	if(isset($device)) {
		add_device_status($device["udid"], $status);
	}
}

function send_push($device) {
    $deviceToken = unpack('H*', base64_decode($device["deviceToken"]));
    $deviceToken = $deviceToken[1];

    date_default_timezone_set('Europe/London');

    $push = new ApnsPHP_Push(
            ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
            '/home/jimbob/final_aps_prod.pem'
    );
    $push->setProviderCertificatePassphrase('FunCrate321'); 

    $push->connect();

    $message = new ApnsPHP_Message($deviceToken);
    // Set a custom property
    $message->setCustomProperty('mdm', $device['pushMagic']);
    // Set the expiry value to 30 seconds
    $message->setExpiry(30);
    $push->add($message);

    var_dump($message->getPayload());
    // Send all messages in the message queue
    $push->send();
    // Disconnect from the Apple Push Notification Service
    $push->disconnect();
    // Examine the error message container
    $aErrorQueue = $push->getErrors();
    if (!empty($aErrorQueue)) {
            var_dump($aErrorQueue);
    }
	
}

function timestamp() {
	return date(DATE_ATOM, time());
}

?>
