<?php

/*
 * 	db_functions.php
 */


class DB_Functions {
 
    private $db;
	private $conn;
 
    //put your code here
    // constructor
    function __construct() {
        include_once './functions/db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
		
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($email, $password) {
		
		// Store user details in db
		
		
		
        
		

			
		
    }
 
    /**
     * Getting all users
     */
    public function getAllUsers() {
		
		
		$sql = "SELECT * FROM gcm_user";
		$result = $conn->query($sql);
		return $result;
		
    }
 
}



?>