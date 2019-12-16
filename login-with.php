<?php
include('config.php'); 
include('header.php'); 
include('hybridauth/Hybrid/Auth.php');
ob_start();
?>
<?php 
if(isset($_POST['submit'])){
		$val = array(
						'username' => $_POST['username'],
						'password' => md5($_POST['password']),
						'email' => $_POST['email'],
						'twitter' => $_POST['twitter_id'],
						'type' => $_POST['type'],
						'profile'=> $_POST['profile']
					);
		echo signup($val);
	}
?>
<div class="main">

    <div class="container">

      <div class="main-cn element-page bg-white clearfix">

        <section class="breakcrumb-sc">

          <ul class="breadcrumb arrow">

            <li><a href="index.php"><i class="fa fa-home"></i></a></li>

            <li>Profile</li>

          </ul>

          <div class="support float-right"><small>Got a question?</small> Drop us a note and we will give you a call </div>

        </section>

        <section class="user-profile">

          <div class="user-form user-signup">

            <div class="row">

              <div class="col-md-5">
					<br/>
					<br/>

                
				<?php
					if(isset($_GET['provider']))
					{
						
						if($_GET['provider']!='Twitter')
						{
							$_SESSION['twitter_id']='';	
						}
						//$provider = $_GET['provider'];
//						
//						try{
//						
//						$hybridauth = new Hybrid_Auth( $config );
//						
//						$authProvider = $hybridauth->authenticate($provider);
//
//						$user_profile = $authProvider->getUserProfile();
//						
//						if($user_profile && isset($user_profile->identifier))
//						{
						?>
							 <h3> User Info</h3>
							<hr>
							<legend>Complete your Profile</legend>
							<form method="post" action="#" id="">
								 <div class="field-input">
								  <input type="text" class="input-text" name="username" value="<?php echo $_SESSION['FULLNAME']; ?>" >
								  </div>
								  <div class="field-input">
								  <input type="text" class="input-text" required name="email" placeholder="Email ID" value="<?php echo $_SESSION['EMAIL']; ?>" >
									</div>
								  <input type="hidden" class="input-text" name="profile" value="<?php echo $user_profile->photoURL ?>" >
								  <div class="field-input">
                                  <?php
								  if($_GET['provider']!='Twitter')
								  {
									  ?>
                                      <img src='Profile_Picture/<?php echo $_SESSION['fb_image']; ?>' style="width:200px;height:200px;"/>
                                      <?php
								  }
								  else
								  {
									  ?>
                                      <img src='<?php echo $_SESSION['fb_image']; ?>' style="width:200px;height:200px;"/>
                                      <?php
								  }
								  
								  ?>
								  
								  </div>
								  <div class="field-input">
								  <select name="type" class="input-text" required>
									<option value="">Sign in as</option>
									<option value="traveller">Traveller</option>
									<option value="transport">Transport Provider</option>
								  </select>
								  </div>
								  <div class="field-input">
								   <input type="password" class="input-text" name="password" placeholder="Password">
								   </div>
								   <div class="field-input">
                                   <input type="hidden" value="<?php echo $_SESSION['twitter_id'];?>" name="twitter_id">
								  <input type="submit" name="submit" value="Sign in" class="awe-btn awe-btn-1 awe-btn-medium">
								  <button class="awe-btn awe-btn-1 awe-btn-medium">Cancel</button>
								 
									</div>
								</form>
								</div>
						<?php
					//	}	       
					//	}
						//catch( Exception $e )
//						{ 
//						
//							 switch( $e->getCode() )
//							 {
//									case 0 : echo "Unspecified error."; break;
//									case 1 : echo "Hybridauth configuration error."; break;
//									case 2 : echo "Provider not properly configured."; break;
//									case 3 : echo "Unknown or disabled provider."; break;
//									case 4 : echo "Missing provider application credentials."; break;
//									case 5 : echo "Authentication failed. "
//													 . "The user has canceled the authentication or the provider refused the connection.";
//											 break;
//									case 6 : echo "User profile request failed. Most likely the user is not connected "
//													 . "to the provider and he should to authenticate again.";
//											 $twitter->logout();
//											 break;
//									case 7 : echo "User not connected to the provider.";
//											 $twitter->logout();
//											 break;
//									case 8 : echo "Provider does not support this feature."; break;
//							}
//
//							// well, basically your should not display this to the end user, just give him a hint and move on..
//							echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
//
//							echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";
//
//						}
//					
				}

				?>
				</div>

				<div class="col-md-5 col-md-offset-2">
					
				

              </div>

            </div>

          </div>

        </section>

      </div>

    </div>

  </div>
<?php ob_end_flush(); ?>
 <?php include('footer.php'); ?>