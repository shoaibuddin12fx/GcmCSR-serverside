<?php

$servername = "localhost";
$username = "mnmacces_android";
$password = "m@tech_@&roid";
$dbname = "mnmacces_android";
$GOOGLE_API_KEY = "AIzaSyD3VI7USdYHCTFwYsY_WdSm1ehTnKZUd7c";


$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno($conn))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email = 'shoaibuddin12fx@gmail.com';

$result = mysqli_query($conn,"SELECT * FROM gcm where email='$email'");
$row = mysqli_fetch_array($result);

/*echo '<pre>';
print_r($row);*/
$gcm_token = $row['gcm_regid'];




/*if(isset($data)){
	$message = array('flag'=>1,'msg' =>$row[3]);
}else{
	$message = array('flag'=>0, 'msg' => null);		
}*/

//echo json_encode($message);
//mysqli_close($con);


// Payload data you want to send to Android device(s)
// (it will be accessible via intent extras)    
$data = array( 'message' => $row[3] );

// The recipient registration tokens for this notification
// https://developer.android.com/google/gcm/   
$id = $gcm_token;
echo $id;
echo '<br>';

// Send push notification via Google Cloud Messaging
sendPushNotification(  $data, $id );

function sendPushNotification( $data, $id )
{
    // Insert real GCM API key from the Google APIs Console
    // https://code.google.com/apis/console/        
    $apiKey = "185912461764";
	//echo $apiKey . '<br>';
	
    // Set POST request body
    $post = array(
                    'to'  => $id,
                    'data' => $data
                 );

    // Set CURL request headers 
    $headers = array( 
                        'Authorization: key=' . $apiKey,
                        'Content-Type: application/json'
                    );

    // Initialize curl handle       
    $ch = curl_init();

    // Set URL to GCM push endpoint     
    curl_setopt( $ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );

    // Set request method to POST       
    curl_setopt( $ch, CURLOPT_POST, true );

    // Set custom request headers       
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

    // Get the response back as string instead of printing it       
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	
	// resolving IP issue
	curl_setopt($ch, 'CURLOPT_IPRESOLVE', 'CURL_IPRESOLVE_V4' );

    // Set JSON post data
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );

    // Actually send the request    
    $result = curl_exec( $ch );

    // Handle errors
    if ( curl_errno( $ch ) )
    {
        echo 'GCM error: ' . curl_error( $ch );
    }

    // Close curl handle
    curl_close( $ch );

    // Debug GCM response       
    echo $result;
}
?>