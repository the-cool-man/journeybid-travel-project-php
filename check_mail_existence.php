<?php include('config.php') ?>
<?php 
	$emailid = $_GET['email'];
  	$checkEmailQuery = "SELECT email from user where email='$emailid'";
	$executeCheckEmailQuery = mysql_query($checkEmailQuery);
	$rows = mysql_num_rows($executeCheckEmailQuery);
	if( $rows > 0 ){
		$response_array['status'] = 'error';  ;
	} else {
		$response_array['status'] = 'success';  
	}
	echo json_encode($response_array);
?>