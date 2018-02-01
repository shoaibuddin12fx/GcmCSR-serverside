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



echo "Connected successfully";

// sql create table 
$sql = "Create TABLE IF NOT EXISTS users(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP,
UNIQUE (email)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// insert data into the table
$sql2 = "INSERT INTO users SET firstname='shoaib', lastname='uddin', email='shoaibuddin12fx@gmail.com', password='hotmail1VU'";

if ($conn->query($sql2) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}







$conn->close();










?>