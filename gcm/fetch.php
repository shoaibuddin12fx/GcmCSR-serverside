<?php
  
$servername = "localhost";
$username = "mnmacces_android";
$password = "m@tech_@&roid";
$dbname = "mnmacces_android";


$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno($conn))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email = $_GET['email'];
$password = $_GET['password'];

$array = array('email' => $email);
echo json_encode($array);

$result = mysqli_query($conn,"SELECT * FROM gcm where email='$email'");
$row = mysqli_fetch_array($result);

echo '<pre>';
print_r($row);
$data = $row[3];



if(isset($data)){
	$message = array('flag'=>1,'msg' =>$row);
}else{
	$message = array('flag'=>0, 'msg' => null);		
}

echo json_encode($message);


mysqli_close($con);



?>



