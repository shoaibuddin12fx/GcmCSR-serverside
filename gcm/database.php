<?php

$servername = "localhost";
$username = "mnmacces_android";
$password = "m@tech_@&roid";
$dbname = "mnmacces_android";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo 'Connected successfully <br>';

// sql create table 
$sql = "Create TABLE IF NOT EXISTS gcm(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gcm_regid TEXT,
device_id TEXT,
email VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP,
UNIQUE (email)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table gcm created successfully";
	echo '<br>';
} else {
    echo "Error creating table: " . $conn->error;
	echo '<br>';
}

// insert data into the table
$sql2 = "INSERT INTO gcm SET email='shoaibuddin12fx@gmail.com', password='hotmail1VU'";

if ($conn->query($sql2) === TRUE) {
    echo "Data inserted successfully";
	echo '<br>';
} else {
    echo "Error inserting data: " . $conn->error;
	echo '<br>';
}


$conn->close();










?>