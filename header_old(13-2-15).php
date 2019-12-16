<?php include('function.php'); ?>
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
<link rel="stylesheet" href="css/library/jquery.mb.YTPlayer.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php  $usertype = $_SESSION['values']['type'];
?>

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
			  <select class="form-control traveller-transporter-search" name="select_trav_trans" required="required">
				<option>Please Select</option>
				<option value="journey">Journeys</option>
				<option value="providers">Providers</option>
			  </select>
			  <div class="form-group">
				<label class="sr-only" for="exampleInputPassword3"></label>
				<input type="text" name="from" class="form-control" id="exampleInputPassword3" placeholder="Search" required="required">
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
        <div class="nav-inner"><a href="#" class="bars-close" id="bars-close">Close</a>
          <div class="tb">
            <div class="tb-cell">
              <ul class="menu-list text-uppercase">
                <?php if(isset($_SESSION['values']['id'])){ ?>
				<li class="current-menu-parent"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tachometer"></i> Dashboard</a>
                  <ul class="sub-menu">
					<?php if($_SESSION['values']['type'] == 'transport'){ ?> <li><a href="transporter-dashboard.php" title="">Dashboard</a></li><?php } else { ?><li><a href="dashboard.php" title="">Dashboard</a></li><?php } ?>
                    <!--<li><a href="http://avclub.in/travel/journeys.php" title="">Account Overview</a></li>-->
                    <li><a href="edit-profile.php" title="">Settings</a></li>
                    <li><a href="reset-password.php" title="">Change Password</a></li>
                    <li><a href="#" title="">Deposit</a></li>
                    <li><a href="#" title="">Transfer to Escrow</a></li>
                    <li><a href="#" title="">Withdraw Fund</a></li>
                    <li><a href="#" title="">Money Transfer Account</a></li>
                    <li><a href="#" title="">My Transaction</a></li>
                  </ul>
                </li>
				<?php } ?>
				<?php if($usertype == "traveller"){ ?> 
					 <li><a href="post-journey.php"><i class="fa fa-bullhorn"></i> Place your journey</a></li>
				<?php } else { ?>
					<li><a href="#"><i class="fa fa-gavel"></i> Bid Journey</a></li>
				<?php } ?>
                <li><a href="how-it-works.php" title=""><i class="fa fa-file-text"></i> How it works</a></li>
                
				<?php if(isset($_SESSION['values']['id'])){ ?>
				<li><a href="#" title="notification"><i class="fa fa-globe"></i> </a></li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="messages"> <i class="fa fa-envelope"></i>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> </a>
                  <ul class="sub-menu">
                    <li><a href="#" title="">Travellor Cp</a></li>
                    <li><a href="logout.php" title="">Log Out</a></li>
                  </ul>
                </li>
				<?php } else { ?>
					<li><a href="user-registration.php" title=""><i class="fa fa-user"></i> Register</a></li>
					<li><a href="user-login.php" title=""><i class="fa fa-sign-in"></i> Login</a></li>
				<?php } ?>
                <li>
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> <i class="fa fa-search"></i> </button>
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
  <div class="logo-banner text-center"><a href="#" title=""><img src="images/logo-banner.png" alt=""></a></div>
</section>