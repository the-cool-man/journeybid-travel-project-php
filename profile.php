<?php include('header.php'); ?>
<?php
	if(isset($_POST['submit'])){
		$val = array(
						'email' => $_POST['email'],
						'password' => md5($_POST['password'])
					);
		echo login($val);
	}
?>
<div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>Profile</li>
          </ul>
          <div class="support float-right"><small>Got a question?</small> 123-123-1234</div>
        </section>
        <section class="user-profile">
          <div class="user-form user-signup">
            <div class="row">
              <div class="col-md-5">
                <h2 class="user-profile__title">Sign in</h2>
                <p>Welcome, <?php echo $_SESSION['values']['email']; ?> <a href="logout.php">LogOut</a>.</p>				<a href="post-journey.php">POST JOURNEY</a>
				</div>
				<div class="col-md-5 col-md-offset-2">
				
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
 <?php include('footer.php'); ?>