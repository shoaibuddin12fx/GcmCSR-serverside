<?php

/*
 *	register.php
 */
 
 
 // response json
$json = array();
 
/**
 * Registering a user device
 * Store reg id in users table
 */
if (  isset($_POST["formdata"])  ) {
	
	parse_str($_POST["formdata"], $formdata);
	//print_r($formdata);
	
    $gcm_key = $formdata["gcm_key"];
    $tel = $formdata["phone"];
	$userid = $formdata["userid"];
	//print_r($formdata);
	if($gcm_key == "null" || $tel == "null" || $gcm_key == "null"){
		echo "null key value";
	}else{
		make_a_call($gcm_key , $tel, $userid);			
	}
		
	
    
 
    
} else {
    // user details missing
	echo "no number";
}


function make_a_call($gcm_key , $tel, $userid){
	
	require_once './config.php';
	//echo 'initiate <br>';
	
	$message = array('tel' => $tel,'userid'=>$userid);
	
	// Set POST variables
        //$url = 'https://android.googleapis.com/gcm/send';
        $url = 'https://fcm.googleapis.com/fcm/send';
		
 
        $fields = array(
            'to' => $gcm_key,
            'data' => $message
        );
 
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
	
	
	
	
	
}









?>