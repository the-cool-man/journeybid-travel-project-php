<?php include('header.php'); ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>

<?php $user_regis_since = $_SESSION['values']['member_since'];
	$month=date("jS M Y", strtotime($user_regis_since));
	/*$time=strtotime($user_regis_since);
	$month=date("F",$time);
	$year=date("Y",$time);*/
	$decoded_trans_values = json_decode($_SESSION['values']['meta_value'],true);
	$imgs = $decoded_trans_values['profile_image']; 
  ?>
  
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Dashboard</li>
			<?php if($_SESSION['values']['type'] == 'transport'){ ?>
			<li> Transporter </li>
			<?php } ?>
            <li><?php echo $_SESSION['user_meta_info']->username ;?></li>
          </ul>
        </section>
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Congratulation!</strong> You have successfully registered with Journeybid.com. </div>
        <section class="user-profile">
          <div class="row">
            <div class="col-md-4">
              <div class="user-profile__header">
                <h4><?php echo $_SESSION['user_meta_info']->username ;?></h4>
                <span>Member Since <?php// echo $month." ".$year; ?><?php echo $month; ?></span>
                
				<?php if($decoded_trans_values['profile_image'] ==  NULL){ ?><p><img src="images/avatar.jpg" alt=""></p><?php } else { ?><p><img src="Profile_Picture/<?php echo $imgs; ?>" alt=""></p><?php } ?>
				
				
              </div>	
              <ul class="user-profile__navigation">
                <li><a href="http://journeybid.com/profiles-transport-provider-details.php?tn=<?php echo $_SESSION['values']['id']; ?>"><i class="fa fa-user" style="color:#ccc;"></i> View Profile</a></li>
                <!--<li><a href="#"><i class="fa fa-heart" style="color:#ccc;"></i> My Favorites</a></li>
                <li><a href="#"><i class="fa fa-users" style="color:#ccc;"></i> My Friends</a></li>-->
                <li><a href="trav_trans_interaction.php"><i class="fa fa-envelope" style="color:#ccc;"></i> My Messages</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Sign out</a></li>
              </ul>
            </div>
			
            <div class="col-md-8">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">My Wallet</h3>
                </div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>€0.00</th>
                        <th> € <?php echo $total = transporter_total_balance($_SESSION['values']['id']); ?> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="info">
                        <td>Withdrawn</td>
                        <td>Balance</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!--
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Overview</h3>
                </div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Last Escrow</th>
                        <th>Last Transaction</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="info">
                        <td>0</td>
                        <td>0</td>
                      </tr>
                    </tbody>
                  </table
                >
                </div>
              </div>
            </div>-->
            <!--<div class="col-md-9">
              <h2 class="user-profile__title">Settings</h2>
              <div class="user-form">
                <div class="row">
                  <div class="col-md-6">
                    <h3>Personal Information</h3>
                    <div class="field-input">
                      <input type="text" class="input-text" value="First Name">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Last Name">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Email">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Phone number">
                    </div>
                    <h3>Location</h3>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Home Airport">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Street Address">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="City">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Country of Passport">
                    </div>
                    <div class="field-input">
                      <button class="awe-btn awe-btn-1 awe-btn-medium">Save Changes</button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h3>Change Password</h3>
                    <div class="field-input">
                      <input type="text" class="input-text" value="Current Password">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="New Password">
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" value="New Password Again">
                    </div>
                    <div class="field-input">
                      <button class="awe-btn awe-btn-1 awe-btn-medium">Change Password</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
          <hr>
          <div class="clearfix"> </div>
          <div class="row">
            <div class="col-md-12">
              <ul class="tabs-head nav-tabs-one">
                <li class="active"><a data-toggle="tab" href="#section1">My Bids</a></li>
               <!-- <li><a data-toggle="tab" href="#section2">My Escrow</a></li>
                <li><a data-toggle="tab" href="#section3">Pending Transport Provider Reviews</a></li>-->
              </ul>
              <div class="tab-content">
                <div id="section1" class="tab-pane fade in active">
                  <p><div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Traveller</th>
                        <th>Message</th>
                        <th>Vehicle Type</th>
						<th>Journey</th>
						<th>Bid Amount(€)</th>
                        <th>Paid(€)</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php echo transporter_bid_details(); ?>
                    </tbody>
                  </table>
                  </div>
                  </p>
                </div><!--
                <div id="section2" class="tab-pane fade">
                  <p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Journe</th>
                        <th>Total (€) </th>
                        <th>Paid (€) </th>
                        <th>Transport Provider </th>
                        <th>Date </th>
                        <th>Status </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  </p>
                </div>
                <div id="section3" class="tab-pane fade">
                  <p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Transport Provider </th>
                        <th>Journey</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  </p>
                </div>-->
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  
  <?php include('footer.php'); ?>