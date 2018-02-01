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
if (  isset($_POST["flag"])  ) {
	
	
    $flag = $_POST["flag"];
    get_database_records();
 
    
} else {
    // user details missing
	echo "no user";
}


function get_database_records(){
	
	include_once './db_connect.php';
	$db = new DB_Connect();
	$conn = $db->connect();
	
	
	
	if($conn){
		$data = array();
		
		// insert user into database
		$sql = "SELECT id, email, gcm_regid FROM gcm_users";
		
        $result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$c = $row['id'];
				$data[$c] = $row;
			}
			echo json_encode($data);
			
			
		} else {
			echo "0 results";
		}
		$conn->close();
		
		
		
		
		
	}else{
		echo "Connection failed";		
	}
	
    
	
	
	
	
	
}









?>