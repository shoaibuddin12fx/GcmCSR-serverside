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
	
    $email = $formdata["email"];
    $password = $formdata["password"];
    store_in_database($email , $password);
 
    
} else {
    // user details missing
	echo "no user";
}


function store_in_database($email , $password){
	
	include_once './db_connect.php';
	$db = new DB_Connect();
	$conn = $db->connect();
	
	if($conn){
		
		// insert user into database
		$sql = "INSERT INTO gcm_users (email, password) VALUES ( '$email', '$password')";
		
        if ($conn->query($sql) === TRUE) {
			echo "User Registered Sucessfully";
			
		} else {
			echo "Error while registering user";
		}
		
		$conn->close();
		
		
		
		
		
	}else{
		echo "Connection failed";		
	}
	
    
	
	
	
	
	
}









?>