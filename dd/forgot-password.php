<?php include 'header.php';?>

		<?php if(isset($_POST['Send'])){
			if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
				$msg2="<span style='color:red'>The Validation code does not match!</span>";
			}else{	
				$cemail = $_POST['Confirm_email'];
				$selemail = "SELECT email from user where email='$cemail'";
				$selquery = mysql_query($selemail);
				if(mysql_num_rows($selquery) == 1){
					$newpass = md5(rand(9,999));
					$dbpass = md5($newpass);
					$to = $cemail;
					$subject = "Your Password has been changed - info@journeybid.com";
					$txt .= "Your New Password is :: ". $newpass ." \r\n After Login You can change your Password from your dashboard  \r\n Please follow the instructions below \r\n Goto dashboard -> change Password";
					$headers = "From: info@journeybid.com";
					$confirm_mail_delivery = mail($to,$subject,$txt,$headers);
					}
					else {
						$email_error_msg = "<span style='color:red'>Error!! Email not found in database</span>";
						}	
				if($confirm_mail_delivery){
					echo update_forgot_password($dbpass,$cemail);
					$msg5="<span style='color:green'>Password Has been sended  to your email Id please login with new password.</span>";
					echo "<script>setTimeout(function() {window.location='user-login.php'}, 5000); </script>";
					}
				}
			}
			?>
		
		<script type='text/javascript'>
			function refreshCaptcha(){
				var img = document.images['captchaimg'];
				img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
			}
		</script>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Forgot your password?</li>
          </ul>
          <div class="support float-right"><small>Got a question?</small> Drop us a note and we will give you a call</div>
        </section>
        <section class="user-profile">
          <div class="user-form">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
			  <form method="post">
                <h2 class="user-profile__title">Forgot your password?</h2>
                <p> Enter your Email, and we will send you instructions for resetting your password.</p>
				<?php echo $msg5; ?>
				<?php echo $email_error_msg; ?>
                <div class="field-input">
                  <input type="Email" class="input-text" value="Email *" required="required" name="Confirm_email"> <br><br>
                </div> 
				<span>  <?php if(isset($msg2)){ echo $msg2; } ?></span><br/>
                <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'>
                <div class="field-input">
                  <input type="text" class="input-text" value="" name="captcha_code" required placeholder="Enter Your Code">
				  Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                </div>
                <div class="field-input">
                  <input type="submit" class="awe-btn awe-btn-1 awe-btn-medium" name="Send" value="Send"/>
                </div>
				</form>
              </div>
              
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include 'footer.php';?>