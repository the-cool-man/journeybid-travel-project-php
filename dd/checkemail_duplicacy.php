<?php include 'function.php';?>
<?php 
	$email = $_GET['email'];
	$query = "SELECT email from user where email LIKE '%$email%'";
	$execute = mysql_query($query);
?>