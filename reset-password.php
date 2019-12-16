<?php include 'header.php' ; ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>

<?php 
$user_email = $_SESSION['values']['email'];
$oldpassword = $_SESSION['values']['password'];

 ?>

	<?php if(isset($_POST['reset-pass-btn'])){
					$newpass = md5($_POST['newpass2']);
					echo reset_password($user_email,$oldpassword,$newpass);
	}?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li> Reset your password </li>
          </ul>
          <div class="support float-right"><small>Got a question?</small> 123-123-1234</div>
        </section>
		
        <section class="user-profile">
          <div class="user-form">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
			  <form method="post" id="resetpassform">
                <h2 class="user-profile__title"> Reset your password </h2>
				<?php echo $_SESSION['msg10'];  unset($_SESSION['msg10']); ?>
                <!--<div class="field-input">
                  <input type="text" class="input-text" name="oldpass" placeholder="Old Password" id="oldpass">
                </div> -->
				<div class="field-input">
                  <input type="password" class="input-text" placeholder="New Password" name="newpass1" id="newpass1">
                </div> 
				<div class="field-input">
                  <input type="password" class="input-text" placeholder="Retype New Password" name="newpass2" id="newpass2">
                </div>
                <div class="field-input">
                  <input type="submit" class="awe-btn awe-btn-1 awe-btn-medium" name="reset-pass-btn" value="Change Password"/>
                </div>
				</form>
              </div>
              
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<?php include 'footer.php' ; ?>