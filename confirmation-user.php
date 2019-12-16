<?php include 'header.php'; ?>
<?php 
		$user_key = $_GET['user_key'];
		if($user_key != NULL){
			echo activate_user($user_key);
		}
		function activate_user($user_key){
			$sel = "SELECT * from user where validation_key='$user_key'";
			$execute = mysql_query($sel);
			if(mysql_num_rows($execute) == 1){ ?>
			<div class="main">
				<div class="container">

					<div class="main-cn about-page bg-white clearfix" style="border:1px solid #ccc;">
						<section class="about-cn clearfix">

						<div class="about-text">

						<div class="row">

						<div class="col-md-8 col-md-offset-2">
						 <h2 class="text-center">  <img style="text-align:center;" src="images/thank-you.png"> <br><br>

						 <strong>Email Address Verified</strong></h2> <br>
						<p class="text-center"> Thank you for verifying your email address. This helps us keep your account safe.<br><br> 
						<a href="user-login.php"> <button type="submit" class="btn btn-register btn-green"><span>Continue</span></button></a>
						</p>

						</div>                                

                            </div>

					</div>

				</section>
      </div>
    </div>
    </div>

				
			<?php 
				$update_query = "UPDATE user set status=1 where validation_key='$user_key'";
				mysql_query($update_query);		
			} 
			//else {
				//echo "<h3 style='text-align:center;color:red;' class='welcome-line-height'>Error in registration .</h3>";
			//}
		}
	?>
<?php include 'footer.php'; ?>