<?php include('function.php');?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="images/favicon.png">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>JourneyBid your Way - Easiest Bus Limo and Private Hire..... </title>
<!--<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700%7COpen+Sans:300,400,600,700" rel="stylesheet" type="text/css">-->
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/library/font-awesome.min.css">
<link rel="stylesheet" href="css/library/bootstrap.min.css">
<link rel="stylesheet" href="css/library/jquery-ui.min.css">
<link rel="stylesheet" href="css/library/owl.carousel.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/library/jquery-1.11.0.min.js"></script>
</head>
<body>
<?php  $usertype = $_SESSION['values']['type']; ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Search</h4>
      </div>
	<form class="form-inline" method="post" action="search-result.php">
      <div class="modal-body">
          <select class="form-control" name="select_trav_trans">
            <option>Please Select</option>
            <option value="journey">Journeys</option>
            <option value="providers">Providers</option>
          </select>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Password</label>
            <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Search" name="from">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">Go</button>
      </div>
	</form>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="wrap">
<header id="header" class="header">
    <div class="container">
      <div class="logo float-left"><a href="index.php" title=""><img src="images/logo-header1.png" alt=""></a></div>
      <div class="bars" id="bars"></div>
      <nav class="navigation nav-c" id="navigation" data-menu-type="1200">
        <div class="nav-inner"><a href="javascript:void(0)" class="bars-close" id="bars-close">Close</a>
          <div class="tb">
            <div class="tb-cell">
              <ul class="menu-list text-uppercase">
                <?php if(isset($_SESSION['values']['id'])){ ?>
				<li class="current-menu-parent"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tachometer"></i> Dashboard</a>
                  <ul class="sub-menu">
					<?php if($_SESSION['values']['type'] == 'transport'){ ?> <li><a href="transporter-dashboard.php" title="">Dashboard</a></li><?php } else { ?><li><a href="dashboard.php" title="" style="color:#233a7c;">Dashboard</a></li><?php } ?>
                    <li><a href="edit-profile.php" title="" style="color:#233a7c;">Edit Profile</a></li>
                    <li><a href="reset-password.php" title="" style="color:#233a7c;">Change Password</a></li>
                    <!--<li><a href="#" title="" style="color:#233a7c;">Deposit</a></li>
                    <li><a href="#" title="" style="color:#233a7c;">Transfer to Escrow</a></li>-->
                    <?php if($_SESSION['values']['type'] == 'transport'){ ?><li><a href="withdraw-fund.php" title="" style="color:#233a7c;">Withdraw Fund</a></li> <?php } ?>
<!--                    <li><a href="javascript:void(0)" title="" style="color:#233a7c;">Money Transfer Account</a></li>
                    <li><a href="javascript:void(0)" title="" style="color:#233a7c;">My Transaction</a></li>-->
                  </ul>
                </li>
				<?php } ?>
				<?php if($usertype == "traveller"){ ?> 
					 <li><a href="post-journey.php" style="color:#233a7c;"><i class="fa fa-bullhorn"></i> Place your journey</a></li>
				<?php } elseif($usertype == 'transport') { ?>
					<li><a href="index.php" style="color:#233a7c;"><i class="fa fa-gavel"></i> Bid for Journey</a></li>
				<?php } else { ?>
					<li class="current-menu-parent"><a href="post-journey.php" style="color:#233a7c;"><i class="fa fa-bullhorn"></i> Place your journey</a>
					</li>
					<li><a href="index.php" style="color:#233a7c;"><i class="fa fa-gavel"></i> Bid for Journey</a></li>
				<?php } ?>
                <li><a href="how-it-works.php" title="" style="color:#233a7c;"><i class="fa fa-file-text"></i> How it works</a></li>
				<?php if(isset($_SESSION['values']['id'])){ ?>
				<li><a href="javascript:void(0)" title="notification"><i class="fa fa-globe"></i> </a></li>
                <li><a href="trav_trans_interaction.php" title="messages"> <i class="fa fa-envelope"><span class="nm"><?php echo messages_unread($_SESSION['values']['id']);?></span></i>
				<li><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> </a> 
                  <ul class="sub-menu">
                    <!--<li><a href="javascript:void(0)" title="" style="color:#233a7c;">Travellor Cp</a></li>-->
                    <li><a href="logout.php" title="" style="color:#233a7c;">Log Out</a></li>
                  </ul>
                </li>
				<?php } else { ?>
					<li><a href="user-registration.php" title="" style="color:#233a7c;"><i class="fa fa-user"></i> Register</a></li>
					<li><a href="user-login.php" title="" style="color:#233a7c;"><i class="fa fa-sign-in"></i> Login</a></li>
				<?php } ?>
                <li>
                <a href="javascript:void(0)" title="" style="color:#233a7c;" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> &nbsp; </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
<section class="sub-banner">
  <div class="bg-parallax bg-1"></div>
  <div class="logo-banner text-center"><a href="javascript:void(0)" title=""><img src="images/logo-banner.png" alt=""></a></div>
</section>
<?php ob_end_flush(); ?>