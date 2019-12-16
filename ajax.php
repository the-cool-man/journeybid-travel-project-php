<?php 
session_start();
$email = $_GET['email'];
$decoded_val = json_decode($_SESSION['values']['meta_value'],true); 
$name = $decoded_val['username'];
$email2 = $decoded_val['email'];
$mobile = $decoded_val['mobile'];
if($email != '' && $email == $_GET['email']){
	//$email = $val['email'];
	//$message ="Your Bid is Approved by traveller";
	$to = "$email";
	$subject = "Thanking you - info@journeybid.com";
	$txt .= 'Your bid has been approved by traveller :: ' . $name .  "\n" . 'Email of traveller :: '. $email2 . "\n" .'Mobile number of Traveller :: ' .$mobile. "\n" ;
	$headers = "From: info@journeybid.com";
	$mail_report = mail($to,$subject,$txt,$headers);
	echo "Thanks";
}
?>