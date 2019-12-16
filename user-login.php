<?php include('header.php'); ?>
<?php
	if(isset($_POST['submit'])){
		$val = array(
						'email' => $_POST['email'],
						'password' => md5($_POST['password']),
						'newMessage' => $_GET['new_msg']
					);
		echo login($val);
	}
	if(isset($_SESSION['values'])){
		echo "<script> window.location='profile.php'; </script>";
	}
?>
<div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix"> 
	  <?php if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; } unset($_SESSION['msg']); ?>
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>User Sign in</li>
          </ul>
          <div class="support float-right"><small>Got a question?</small> Drop us a note and we will give you a call</div>
        </section>
        <section class="user-profile">
          <div class="user-form user-signup">
            <div class="row">
              <div class="col-md-5">
                <h2 class="user-profile__title">Sign in</h2>
                <p>Create your account or Sign in to manage booking.</p>
				<form method="post" id="login">
                <div class="field-input">
                  <input type="text" class="input-text" name="email" required placeholder="Enter you Email ID">
                </div>
                <div class="field-input">
                  <input type="password" class="input-text" name="password" required placeholder="Enter you Password">
                </div>
                <div class="field-input">
                  <div class="check-box">
                    <input type="checkbox" id="checkbox" name="checked">
                    <label for="checkbox">Keep me logged in</label>
                    | </div>
                  <a href="forgot-password.php">Forgot Password</a> | <a href="user-registration.php">Sign up</a> </div>
                <div class="field-input">
                  <input type="submit" name="submit" class="awe-btn awe-btn-1 awe-btn-medium" value="Sign in">
                </div>
				</form>
              </div>
              <div class="col-md-5 col-md-offset-2">
                <h2 class="user-profile__title">Social Sign in </h2>
                <p>Sign up now and get the best deals guaranteed</p>
                <a class="btn btn-block btn-social btn-facebook" style="color:#fff;" href="fb-signin.php"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
                
				<a class="btn btn-block btn-social btn-twitter" style="color:#fff;" href="twitter_auth/process.php"><i class="fa fa-twitter"></i> Sign in with Twitter</a> 
                
				<!--<a class="btn btn-block btn-social btn-google-plus" style="color:#fff;" href="login-with.php?provider=Google"><i class="fa fa-google-plus"></i>Sign in with Google</a>-->
                <div class="field-input">
                  <div class="check-box">
                    <input type="checkbox" id="offers">
                    <label for="offers">Send me Special Offers &amp; Promotions</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
 <?php include('footer.php'); ?>