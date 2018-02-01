<?php

/*
 *	db_connect.php
 */
 
 class DB_Connect {
  
    // constructor
    function __construct() {
  
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Connecting to database
    public function connect() {
        require_once 'config.php';
        // connecting to mysql
		// Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		// return database handler
        return $conn;
    }
  
    // Closing database connection
    public function close($conn) {
        $conn->close();
    }
  
} 

?>