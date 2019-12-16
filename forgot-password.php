<?php include 'header.php';?>

		<?php if(isset($_POST['Send'])){	
				$cemail = $_POST['Confirm_email'];
				$selemail = "SELECT email from user where email='$cemail'";
				$selquery = mysql_query($selemail);
				if(mysql_num_rows($selquery) >= 1){
					$newpa = rand(9,99999);
					$newpass = md5($newpa);
					$dbpass = md5($newpa);
					$to = $cemail;
					$subject = "Your Password has been changed - info@journeybid.com";
					$txt .= "
					<table>
					<tbody>
						<tr class='active'>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>Your New Password is ::</td>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'> ". $newpa ."</td>
						</tr>
						<tr class='active'>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #ddd'>After Login You can change your Password from your dashboard</td>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #ddd'> Please follow the instructions below \r\n Goto dashboard -> change Password</td>
						</tr>
                    <tr>
					</table>
				";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: <info@journeybid.com>' . "\r\n";
					$confirm_mail_delivery = mail($to,$subject,$txt,$headers);
					}
					else {
						$email_error_msg = "<span style='color:red'>Error!! Email not found in database</span>";
						}	
				if($confirm_mail_delivery){
					echo update_forgot_password($dbpass,$cemail);
					$msg5="<span style='color:green'>Password has been sent to your email Id. Please login with new password.</span>";
					echo "<script>setTimeout(function() {window.location='user-login.php'}, 5000); </script>";
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