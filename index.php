<?php include('function.php'); ?>
<?php $usertype =   isset($_SESSION['values']['type']) ? $_SESSION['values']['type'] :"" ; ?>

 <?php
 $successMessageDropLine ='';
 
  if(isset($_POST['drop-us-line-form']))
		{
					
						$dlemail = $_POST['dlemail'];
						$dlname = $_POST['dlname'];
						$dlmessage = $_POST['dlmessage'];
						
						$message ="<b>DROP US A LINE MAIL</b><br/><br/>EMAIL: ".$dlemail."<br/><br/>NAME: ".$dlname."<br/><br/>MESSAGE: ".$dlmessage;
						
						$to = "info@journeybid.com";
						
						$subject = "Drop us Line Mail";
						
						$headers ="From: info@journeybid.com";
						$headers.="MIME-Version: New Mail\r\n"; 
						$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n"; 
						
						$mail_report = @mail($to,$subject,$message,$headers);
						
						if($mail_report)
						{
							$successMessageDropLine = "<span> Thanks for messaging us! We try to be as responsive as possible. We'll get back to you soon. </span>";
							
							
							
						}
						else
						{
							$successMessageDropLine = "<span style='color:red;'> An error occured, please try again </span>";
							
							
						}
						
						echo "<script>window.location='index.php#subscribe';</script>";
		}?>
        
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="images/favicon.png">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Your Easiest Bus, Limo and Private Hire Taxi Bookings</title>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="iconfonts/flaticon.css">
<link rel="stylesheet" href="css/library/font-awesome.min.css">
<link rel="stylesheet" href="css/library/bootstrap.min.css">
<link rel="stylesheet" href="css/library/jquery-ui.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/hover.css">
<style type="text/css">
@media all and (max-device-width: 320px) {
.moblogo {width:264px;}
}
@media and (-webkit-min-device-pixel-ratio:0) {
 .colr {
color:#747474;
}
}

::-webkit-input-placeholder {
 color: #747474;
}
#content {
	width: 900px;
	margin: 0 auto;
	font-family:Arial, Helvetica, sans-serif;
}
.page {
	float: right;
	margin: 0;
	padding: 0;
}
.page li {
	list-style: none;
	display:inline-block;
}
.page li a, .current {
	display: block;
	padding: 5px;
	text-decoration: none;
	color: #8A8A8A;
}
.current {
	font-weight:bold;
	color: #000;
}
.button {
	padding: 5px 15px;
	text-decoration: none;
	background: #333;
	color: #F3F3F3;
	font-size: 13PX;
	border-radius: 2PX;
	margin: 0 4PX;
	display: block;
	float: left;
}
.button:hover {
	color : white;
	text-decoration : none;
}
</style>
</head>
<body>
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
  
  <!--- old not working -->
  <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand"><img src="images/logo-header.png" class="img-responsive"></a>
        </div>
       <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['values']['id'])){ ?>
				<li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tachometer"></i> Dashboard <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					<?php if($_SESSION['values']['type'] == 'transport'){ ?> <li><a href="transporter-dashboard.php" title="">Dashboard</a></li><?php } else { ?><li><a href="dashboard.php" title="" style="color:#233a7c;">Dashboard</a></li><?php } ?>
                    <li><a href="edit-profile.php" title="" style="color:#233a7c;">Edit Profile</a></li>
                    <li><a href="reset-password.php" title="" style="color:#233a7c;">Change Password</a></li>
                    <?php if($_SESSION['values']['type'] == 'transport'){ ?><li><a href="withdraw-fund.php" title="" style="color:#233a7c;">Withdraw Fund</a></li> <?php } ?>
                  </ul>
                </li>
				<?php } ?>
				<?php if($usertype == "traveller"){ ?> 
					 <li><a href="post-journey.php" style="color:#233a7c;"><i class="fa fa-bullhorn"></i> Sign in and Post </a></li>
				<?php } elseif($usertype == 'transport') { ?>
					<li><a href="index.php" style="color:#233a7c;"><i class="fa fa-gavel"></i> Bid for Journey</a></li>
				<?php } else { ?>
					<li><a href="post-journey.php" style="color:#233a7c;"><i class="fa fa-bullhorn"></i> Place your journey</a>
					</li>
					<li><a href="index.php" style="color:#233a7c;"><i class="fa fa-gavel"></i> Bid for Journey</a></li>
				<?php } ?>
                <li><a href="transport-providers.php" title="" style="color:#233a7c;"><i class="fa fa-file-text"></i> Transport Providers</a></li>
               
				<?php if(isset($_SESSION['values']['id'])){ ?>
				<li><a href="javascript:void(0)" title="notification"><i class="fa fa-globe"></i> </a></li>
                <li><a href="trav_trans_interaction.php" title="messages"> <i class="fa fa-envelope"><span class="nm"><?php echo messages_unread($_SESSION['values']['id']);?></span></i></a></li>
				<li><a href="javascript:void(0)" class="dropdown" data-toggle="dropdown"> <i class="fa fa-user"></i> <span class="caret"></span></a> 
                  <ul class="dropdown-menu">
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
                      </div><!--/.nav-collapse -->
      </div>
    </nav>
   <!-- -->
   
   <!--- new working condition-->
   <!--<header id="header" class="header">
    <div class="container">
      <div class="logo float-left"><a href="index.php" title=""><img src="images/logo-header1.png" alt="" class="img-responsive moblogo"></a></div>
      <div class="bars" id="bars"></div>
      <nav class="navigation nav-c" id="navigation" data-menu-type="1200">
        <div class="nav-inner"><a href="javascript:void(0)" class="bars-close" id="bars-close">Close</a>
          <div class="tb">
            <div class="tb-cell">
              <ul class="menu-list text-uppercase">
                <?php if(isset($_SESSION['values']['id'])){ ?>
                <li class="current-menu-parent"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tachometer"></i> Dashboard</a>
                  <ul class="sub-menu">
                    <?php if($_SESSION['values']['type'] == 'transport'){ ?>
                    <li><a href="transporter-dashboard.php" title="">Dashboard</a></li>
                    <?php } else { ?>
                    <li><a href="dashboard.php" title="" style="color:#233a7c;">Dashboard</a></li>
                    <?php } ?>
                    <li><a href="edit-profile.php" title="" style="color:#233a7c;">Settings</a></li>
                    <li><a href="reset-password.php" title="" style="color:#233a7c;">Change Password</a></li>
                  </ul>
                </li>
                <?php } ?>
                <?php if($usertype == "traveller"){ ?>
                <li><a href="post-journey.php" style="color:#fff;"><i class="fa fa-bullhorn"></i> Place your journey</a></li>
                <?php } elseif($usertype == 'transport') { ?>
                <li><a href="index.php" style="color:#233a7c;"><i class="fa fa-gavel"></i> Bid for Journey</a></li>
                <?php } else { ?>
                <li class="current-menu-parent"><a href="post-journey.php" style="color:#233a7c;"><i class="fa fa-bullhorn"></i> Place a journey</a> </li>
                <li><a href="javascript:void(0)" style="color:#233a7c;"><i class="fa fa-gavel"></i> Bid on Journeys</a></li>
                <?php } ?>
                <li><a href="how-it-works.php" title="" style="color:#233a7c;"><i class="fa fa-file-text"></i> How it works</a></li>
                <?php if(isset($_SESSION['values']['id'])){ ?>
                <li><a href="javascript:void(0)" title="notification"><i class="fa fa-globe"></i> </a></li>
                <li> 
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" title="messages"> <i class="fa fa-envelope"></i>
                <li><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> </a>
                  <ul class="sub-menu">
                    <li><a href="logout.php" title="" style="color:#233a7c;">Log Out</a></li>
                  </ul>
                </li>
                <?php } else { ?>
                <li><a href="user-registration.php" title="" style="color:#233a7c;"><i class="fa fa-user"></i> Register</a></li>
                <li><a href="user-login.php" title="" style="color:#233a7c;"><i class="fa fa-sign-in"></i> Login</a></li>
                <?php } ?>
                <li> <a href="javascript:void(0)" title="" style="color:#233a7c;" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> &nbsp; </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>-->
   <!-- -->
  
  <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <div class="carousel-inner">
      <div class="item slides active">
        <div class="slide-1">
          <div class="container">
            <div class="col-md-10 col-md-offset-1" style="padding-left:40px;">
              <h2 style="color:#fff;text-shadow: 1px 1px 3px rgba(12, 6, 6, 1);text-align:center;" class="texth"> 
              <span style="font-size:25px; font-style:italic;">Reach out to Ireland’s travel sector with just one post.</span> 
             
              </h2>
            </div>
            <!--<div class="col-md-3">
              <h3 class="addition">Bring down the price<br>
                Broaden the choice </h3>
            </div>-->
          </div>
        </div> 
        <div class="hero">
          <hgroup> </hgroup>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="banner-cn">
      <div class="form-cn form-car">
        <form method="post" action="post-journey.php" id="search">
          <h2 style="color:#233a7c; font-weight:300;"> Where Ireland’s bus and coach firms JourneyBid for trips. </h2>
          <div class="form-search clearfix">
            <div class="form-field field-picking" style="color:#000;">
              <input type="text" id="picking" class="field-input colr" name="from" placeholder="Pick-up area or city?" style="color:#747474; font-weight:400;" required>
            </div>
            <div class="form-field field-droping">
              <input type="text" class="field-input" placeholder="Destination?" style="color:#747474; font-weight:400;" name="to" required>
            </div>
            <div class="form-field field-date">
              <input type="text" class="field-input calendar-input" placeholder="Date" style="color:#747474; font-weight:400;" name="date" required>
            </div>
            <input type="hidden" name="index-tracker" value="indexpage"/>
            <div class="form-submit">
              <button type="submit" name="indexsubmit" class="awe-btn awe-btn-lager awe-search" style="padding:0px;width:206px;">Post / Sign in</button>
            </div>
          </div>
          <h4 style="color:#747474;"> Post your trip needs for immediate quotes today! Completely free. </h4>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="col-md-12" style="margin-left:40px;">
        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
          <!-- Bottom Carousel Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#quote-carousel" data-slide-to="1"></li>
            <li data-target="#quote-carousel" data-slide-to="2"></li>
          </ol>
          <!-- Carousel Slides / Quotes -->
          <div class="carousel-inner">
            <!-- Quote 1 -->
            <div class="item active">
              <!-- <blockquote>-->
              <div class="row">
                <div class="col-sm-2"> <img class="img-circle" src="images/testimonial-1.png" style="width: 100px;height:100px; border:4px solid #fff;"> </div>
                <div class="col-sm-7">
                  <p style="color:#fff; font-size:13px;text-shadow: 1px 1px 1px rgba(1, 1, 1, 1);" class="testi"> "We used to call around to get the best deal, now... just one post." </p>
                  <small style="color:#fff;text-shadow: 1px 1px 1px rgba(1, 1, 1, 1);" class="testi">Professional Services Manager, Galway</small> </div>
              </div>
              <!--   </blockquote>-->
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <!--  <blockquote>-->
              <div class="row">
                <div class="col-sm-2"> <img class="img-circle" src="images/testimonial-2.png" style="width: 100px;height:100px; border:4px solid #fff;"> </div>
                <div class="col-sm-7">
                  <p style="color:#fff;font-size:13px;text-shadow: 1px 1px 1px rgba(1, 1, 1, 1);" class="testi"> "JourneyBid brings in the business, saves us money on marketing and ads." </p>
                  <small style="color:#fff;text-shadow: 1px 1px 1px rgba(1, 1, 1, 1);" class="testi"> Bus Company , Co. Meath</small> </div>
              </div>
              <!--   </blockquote>-->
            </div>
            <!-- Quote 3 -->
            <div class="item">
              <!--<blockquote style="color:#fff;">-->
              <div class="row">
                <div class="col-sm-2"> <img class="img-circle" src="images/testimonial-3.png" style="width: 100px;height:100px; border:4px solid #fff;"> </div>
                <div class="col-sm-7">
                  <p style="color:#fff;font-size:13px;text-shadow: 1px 1px 1px rgba(1, 1, 1, 1);" class="testi">"Easiest coach trip! More options and cheaper than before."</p>
                  <small style="color:#fff;text-shadow: 1px 1px 1px rgba(1, 1, 1, 1);" class="testi"> Global Tech Firm, Dublin.</small> </div>
              </div>
              <!--  </blockquote>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="confidence-subscribe no-bg">
    <div class="container">
      <div class="row cs-sb-cn">
        <div class="col-md-12">
          <div class="confidence">
            <?php
			$sql = "select * from page where slug = 'How-it-works' ";
			$sq = mysql_query($sql);
			$res = mysql_fetch_array($sq);
			//print_r($res);
		  ?>
            <h2 class="text-center" style="color:#233a7c; font-weight:300;"><?php echo $res['page_name']; ?></h2>
            <?php echo $res['page_content']; ?> </div>
        </div>
      </div>
    </div>
  </section>
  <!--add this -->
  <section class="confidence-subscribe">
    <div class="container">
      <div class="row cs-sb-cn">
        <div class="col-md-12">
          <div class="confidence">
            <h2 class="text-center" style="color:#233a7c; font-weight:300; padding-bottom:10px;">Corporate Transport & VIP</h2>
            <h4 class="text-center" style="color:#747474; padding-bottom:15px;"> Best deals for your party, guaranteed. Disco bus to big day out.</h4>
            </h4>
            <div class="col-md-3" style="padding-right:10px;"> <img src="images/choice1.jpg" class="thumbnail">
              <h4 class="text-center" style="padding-right:10px;color:#233a7c;">GROUPS & FRIENDS</h4>
            </div>
            <div class="col-md-3" style="padding-right:10px;"><img src="images/choice2.jpg" class="thumbnail" >
              <h4 class="text-center" style="color:#233a7c;">VIP & EXECS </h4>
            </div>
            <div class="col-md-3" style="padding-right:10px;"> <img src="images/choice3.jpg" class="thumbnail">
              <h4 class="text-center" style="color:#233a7c;">BIG DAYS OUT</h4>
            </div>
            <div class="col-md-3" style="padding-right:10px;"> <img src="images/choice4.jpg" class="thumbnail">
              <h4 class="text-center" style="color:#233a7c;">SCHOOLS & SPORT</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--add this -->
  <section class="sales">
    <div class="container">
      <div class="title-wrap" style="background:none;">
        <div class="container">
          <div class="travel-title text-center">
            <h2 style="color:#233a7c; font-weight:300;" class="text-center"> Traveller </h2>
          </div>
        </div>
      </div>
      
               <!--   <h2 style="color:#233a7c;">Traveller</h2>-->
            <div class="col-md-4 text-center"> <img src="images/jbi1.png">
              <h5>Post your trip needs</h5>
            </div>
            <div class="col-md-4 text-center"><img src="images/jbi2.png" >
              <h5>Travel companies make their bid</h5>
            </div>
            <div class="col-md-4 text-center"> <img src="images/jbi3.png">
              <h5>Select and go with the best</h5>
            </div>
      
      
      
    </div>
  </section>
  <div class="container">
    <div class="row destacados">
      <h2 class="text-center"><img src="images/logo-header1.png"></h2>
      <br>
      <br>
      <?php 
	$sql3 = "select * from page where slug = 'Why-JourneyBid' ";
	$sq3 = mysql_query($sql3);
	$res3 = mysql_fetch_array($sq3);
  ?>
      <?php echo $res3['page_content']; ?> </div>
  </div>
  <!-- add this-->
  <section class="confidence-subscribe">
    <div class="bg-parallax bg-3" style="background-position: 50% 15px;"></div>
    <div class="container">
      <div class="row cs-sb-cn">
        <div class="col-md-6">
          <div class="confidence">
            <h3 class="text-center"><img src="images/book-confidence.png">
              <!--Book with Confidence-->
            </h3>
            <ul>
              <li><span class="label-nb">
                <!--<img src="images/bullets.png">-->
                </span>
                <h5>Flying in for a Festival? </h5>
                <p>Book the best deal to and from your event or private party. Be creative, we'll do our best! </p>
              </li>
              <li><span class="label-nb">
                </span>
                <h5>Corporate Travel</h5>
                <p>We’ll get your best Christmas travel sorted, executive pick-ups too. Best rates and luxury service around. Tell us what you need. </p>
              </li>
              <li><span class="label-nb">
                </span>
                <h5>Schools, Sports and Clubs </h5>
                <p>From full scale family gathering, to your school tour or sports club outing, we’ll keep the costs down. </p>
              </li>
            </ul>
          </div>
        </div>
       
        <div class="col-md-6">
          <div class="subscribe" id="subscribe">
            <h2 style="color:#233a7c; font-weight:300; text-align:center;">Drop us a line.<br>
              We’re open to your ideas.</h2>
            <div class="contact-cn1">
              <div class="showsuccessmessage">
                <p style="color:green;font-size:16px;text-align:center;"> <?php echo $successMessageDropLine; ?>
                  <?php unset($successMessageDropLine);?>
                </p>
              </div>
              <form method="post" action="">
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required="required" name="dlemail"/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" required="required" name="dlname"/>
                </div>
                <div class="form-group">
                  <textarea class="field-input" rows="4" cols="54" id="message" name="dlmessage" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="drop-us-line-form">Submit</button>
              </form>
            </div>
            <div class="follow-us">
              <h2 style="color:#233a7c; text-align:center;">Follow us</h2>
              <div class="follow-group"> <a href="https://www.facebook.com/journeybid" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/JourneyBid" title="" target="_blank"><i class="fa fa-twitter"></i></a> <a href="javascript:void(0)" title="" target="_blank"><i class="fa fa-linkedin"></i></a> <a href="javascript:void(0)" title="" target="_blank"><i class="fa fa-google-plus"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- add this-->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="logo-foter"><a href="index.php" title=""><img src="images/logo-footer.png" alt=""></a></div>
          <p style="color:#fff; font-size:13px; margin-top:7px;">JourneyBid's mission is to enrich group travel planning. With single-post updates and faster, cheaper, bookings, with confidence and value. JourneyBid is your new travel marketplace. Let bus and travel firms bid for your trips: corporate, school or festival transport. No more costly searches. <br />
            <br />
            One stop marketplace for bus and coach planning, commission free for group travellers and group planners. <br />
            <br />
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (+353) 91 556 608 <br />
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email: info@journeybid.com </p>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2">
          <div class="ul-ft">
            <ul>
              <li><a href="about-us.php" title="">About</a></li>
              <li><a href="how-it-works.php" title="">How it Works</a></li>
              <li><a href="faq.php" title="">FAQ</a></li>
              <li><a href="https://journeybid.wordpress.com/" target="_blank">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2">
          <div class="ul-ft">
            <ul>
              <li><a href="privacy.php" title="">Privacy Policy</a></li>
              <li><a href="terms-conditions.php" title="">Term of Service</a></li>
              <li><a href="providers-list.php" title="">Providers</a></li>
              <li><a href="contact.php" title="">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <p class="copyright">© 2016 JourneyBid™ All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</div>
<script type="text/javascript" src="js/library/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/library/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
