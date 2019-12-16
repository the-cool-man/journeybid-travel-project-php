<?php include 'header.php';
$user_key = $_GET['user_key'];
?>
<div class="successfully-registered-container"> 
	<?php 
		if($user_key != NULL){
			echo activate_user($user_key);
		}
		function activate_user($user_key){
			$sel = "SELECT * from user where validation_key='$user_key'";
			$execute = mysql_query($sel);
			if(mysql_num_rows($execute) == 1){
				echo "<h3 style='text-align:center;color:green;line-height:120px' class='welcome-line-height'>Welcome user you are successfully Registered .</h3>";
				$update_query = "UPDATE user set status=1 where validation_key='$user_key'";
				mysql_query($update_query);				
				
				echo "<script>setTimeout(function(){ window.location='http://journeybid.com/user-login.php' }, 5000);</script>";
			} 
			else {
				echo "<h3 style='text-align:center;color:red;' class='welcome-line-height'>Error in registration .</h3>";
			}
		}
	?></div>
<?php include 'footer.php';?>	