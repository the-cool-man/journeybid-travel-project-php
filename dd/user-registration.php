<?php include('header.php'); ?>
<?php
	if(isset($_POST['submit'])){
			if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
				$msg2="<span style='color:red'>The Validation code does not match!</span>";
			}else{
				//$msg2="<span style='color:green'>The Validation code has been matched.</span>";	
				$val = array(
						'username' => $_POST['username'],
						'password' => md5($_POST['password']),
						'email' => $_POST['email'],
						'code' => $_POST['captcha_code'],
						'checked' => $_POST['checked'],
						'type' => 'traveller'
					);
			echo signup($val);		
			}
		
	}
	if(isset($_POST['submit-2'])){
		$val = array(
						'username' => $_POST['username'],
						'password' => md5($_POST['password']),
						'email' => $_POST['email'],
						'address' => $_POST['address'],
						'phone' => $_POST['phone'],
						'checked' => $_POST['check'],
						'type' => 'transport'
					);
		echo transport($val);
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
	<?php if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; } unset($_SESSION['msg']); ?>
      <section class="breakcrumb-sc">
        <ul class="breadcrumb arrow">
          <li><a href="index.php"><i class="fa fa-home"></i></a></li>
          <li>Register</li>
        </ul>
        <div class="support float-right"><small>Got a question? Drop us a note and we will give you a call.</div>
      </section>
      <section class="user-profile">
        <h4> Please select an option to continue. </h4>
		<h5><?php if(isset($msg)){ echo $msg; } ?></h5>
        <div class="check-box">
          <label class="col-md-6">
          <input type="checkbox" name="colorCheckbox" value="red" class="check-box" id="traveller"/>
          I'm a Traveller; I want to post a journey</label>
          <label>
          <input type="checkbox" name="colorCheckbox" value="green" id="provider"/>
          I'm a Transport Provider; seeking to bid</label>
        </div>
        <div class="user-form user-signup">
          <div class="row">
		  <div class="col-md-6">
            <div class="red box">
              <div class="col-md-12">
                <p>I'm a Traveller; I want to post a journey.</p>
                <h3> User Info</h3>
                <hr>
				<form method="post" action="#" id="commentForm">
                <div class="field-input">
                  <input type="text" class="input-text" value="" name="username" required id="cname" placeholder="Enter Your Full Name"/>
                </div>
				<div class="field-input">
                  <input type="text" class="input-text" value="" name="email" required placeholder="Enter Your Email"> 
                </div>
                <div class="field-input">
                  <input type="password" class="input-text" value="" name="password" required placeholder="Enter Your Password">
                </div>
                <div class="field-input">
                  <input type="text" class="input-text" value="" name="address" required placeholder="Enter Your Address">
                </div>
                <h3> Security </h3>
                <p>  <?php if(isset($msg2)){ echo $msg2; } ?></p>
                <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'>		
                <div class="field-input">
                  <input type="text" class="input-text" value="" name="captcha_code" required placeholder="Enter Your Code"><br/>
				  Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                </div>
                <div class="field-input">
                  <div class="check-box">
                    <input type="checkbox" id="checkbox" value="checked" name="checked" class="agreecheckedfld">
                    <label for="checkbox">I have read, understood & agree to the</label>
                  </div>
                  <a href="terms-conditions.php"> Terms & Policies</a></div>
                <div class="field-input">
                  <input type="submit" name="submit" value="Sign Up" class="awe-btn awe-btn-1 awe-btn-medium signupdisabled" onclick="return validate();">
                  <button class="awe-btn awe-btn-1 awe-btn-medium">Cancel</button>
                  <p> Already have an account? <a href="user-login.php"> Login </a></p>
                </div>
				</form>
              </div>
            </div>
            </div>
			 <div class="col-md-6">
            <div class="green box">
              <div class="col-md-12">
                <p>I'm a Transport Provider; seeking to bid</p>
                <h3> User Info</h3>
                <hr>
				<form method="post" action="#" id="Transport">
                <div class="field-input">
                  <input type="text" class="input-text" name="username" required placeholder="Enter Your Full Name">
                </div>
				 <div class="field-input">
                  <input type="text" class="input-text" name="email" id="transemailvalidate" required placeholder="Enter Your Email">
                </div>
                <div class="field-input">
                  <input type="password" class="input-text" name="password" required placeholder="Enter Your Password">
                </div>
                <div class="field-input">
                  <input type="text" class="input-text" name="address" required placeholder="Enter Your Address">
                </div>
                <h3> Contact Method</h3>
                <hr>
                <div class="field-input">
                  <input type="text" class="input-text" name="phone" required placeholder="Enter Your Phone">
                </div>
                <div class="field-input">
                  <input type="text" class="input-text" name="mobile" required placeholder="Enter Your Mobile">
                </div>
                <h3> Vehicle Types</h3>
                <hr>
                <div class="field-input">
                  <div class="check-box">
                    <input type="checkbox" id="luxury" value="luxury coach">
                    <label for="luxury">Luxury Coach</label>
                  </div>
                  <div class="field-input">
                    <div class="check-box">
                      <input type="checkbox" id="offers" value="Mini Bus">
                      <label for="offers">Mini Bus</label>
                    </div>
                  </div>
                  <div class="field-input">
                    <div class="check-box">
                      <input type="checkbox" id="other" value="other">
                      <label for="other">Other</label>
                    </div>
                  </div>
                  <div class="field-input">
                    <div class="check-box">
                      <input type="checkbox" id="suv" value="suv">
                      <label for="suv">SUV</label>
                    </div>
                  </div>
                  <div class="field-input">
                    <div class="check-box">
                      <input type="checkbox" id="agreeterms" value="checked" class="agreecheckedfld1"> 
                      <label for="agreeterms">I have read, understood & agree to the</label>
                    </div>
                    <a href="terms-conditions.php"> Terms & Policies</a></div>
                  <div class="field-input">
                    <input type="submit" class="awe-btn awe-btn-1 awe-btn-medium signupdisabled1" value="Sign up" name="submit-2">
                    <button class="awe-btn awe-btn-1 awe-btn-medium">Cancel</button>
                    <p> Already have an account? <a href="user-login.php"> Login </a></p>
                  </div>
                </div>
				</form>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
 
<?php include('footer.php'); ?>