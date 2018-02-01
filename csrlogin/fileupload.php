<?php
  
    $file_path = "recordings/";
     
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        $message = array('flag'=>1,'msg' =>'success');
    } else{
        $message = array('flag'=>0, 'msg' => null);
    }
	
	echo json_encode($message);
 ?>