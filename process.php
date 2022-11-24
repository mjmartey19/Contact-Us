<?php
$response = "";
$feedback = 0;
if(!isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  if(empty($name)){
	  $response = "Please enter your name";
  }else if(empty($email)){
    $response = "Please enter email address";
}else if((!empty($email))&&(!filter_var($email, FILTER_VALIDATE_EMAIL))){
	  $response = "Please email address is invalid";
  }else if(empty($message)){
	  $response = "Please enter the your message";
  }else{
    $feedback = 1;
    $response = "Message received. We will get back to you shortly";
  }
}else{
    $response = "Failed to collect data";
}
/* Send json information */
echo json_encode(array("feedback"=>$feedback,"response"=>$response));
?>