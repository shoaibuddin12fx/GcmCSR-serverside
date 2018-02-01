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

$email = $_POST['email'];
$password = $_POST['password'];
$gcm_regid = trim($_POST['gcm_token']);

$array = array('email' => $email,
			   'password' => $password,
			   'gcm_token' => $gcm_regid);
//echo json_encode($array);
//die(0);

$sql = "UPDATE gcm SET gcm_regid='$gcm_regid' WHERE email='$email' AND password='$password'";

if($conn->query($sql) === TRUE){
	$message = array('flag'=>1,'msg' =>'OK');
}else{
	$message = array('flag'=>0, 'msg' => null);		
}

echo json_encode($message);


mysqli_close($con);



?>



