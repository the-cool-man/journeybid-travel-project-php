<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['values'])){ 
//header('location:user-login.php');
echo "<script>window.location='user-login.php';</script>";
} ?>

	<?php
		//echo "<pre>";
		//print_r($_SESSION['values']);
		
		$transporter_email = trim($_SESSION['values']['email']);
		//trim($transporter_email)
		$traveller_id = $_GET['userid'];
		$tra = "SELECT email from user where id='$traveller_id'";
		$query = mysql_query($tra);
		$rslt = mysql_fetch_array($query);
		$rslt['email'];
		$userinfomation = get_username($_GET['userid']);
		$postinfomation = get_post($_GET['id']);
		$x = json_decode($userinfomation['meta_value']);
		$y = json_decode($_SESSION['values']['meta_value']);
		//echo ;
		//print_R($_SESSION['values']);
		//echo "</pre>";
	?>
	<?php
			$nr = check_duplicate_request_for_same_journey($_SESSION['values']['id'],$_GET['id']);
			//echo $nr;
			if($nr == 1){
				$error_msgs = '<div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <strong>Congratulation!</strong> You have already placed bid for this Journey. </div>';
			}
			else{
				unset($error_msgs);
			} 
				
			if(isset($_POST['place_bid'])){
				if($nr == 0){
					$bid = $_POST['bid_amount'];
					$mode = $_POST['payment_mode'];
					if($mode == NULL){
						$mode = "Not pay via Escrow";
					}
					$candid = $_POST['best_suited_candid'];
					$email_notification = $_POST['email_notification'];
					if($email_notification == NULL){
						$email_notification = "No";
					}
					$id = $_GET['id'];
					$request_created = $_GET['created'];
					$vehicle = $_GET['vehicle_type'];
					$from = $_GET['from'];
					$to = $_GET['to'];
					$date = $_GET['date'];
					$passenger_num = $_GET['passenger_num'];
					$desc = $_GET['desc'];
					$user_type=$_SESSION['values']['type'];
					$user_id=$_SESSION['values']['id'];
					$query="INSERT into bid_details values('$ids','$bid','$mode','$email_notification','$candid','$id','$request_created','$vehicle','$from','$to','$date','$passenger_num','$user_id','$user_type')";
					$query_execution = mysql_query($query) or die("Error in inserting".mysql_error());
					
								
								$message1 ="Transporter";
								$to1 = trim($transporter_email);
								$subject1 = "Thanking you - info@journeybid.com";
								$txt1 .= "You have bid on Traveller \r\n ".'Descripation :' . $postinfomation['descripation'] .  "\r\n From :". $postinfomation['froms'].  "\r\n To : ". $postinfomation['tos'].  "\r\n Date : ". $postinfomation['date'].  "\r\n Vehicle". $postinfomation['vehicle'].  "\r\n Facilities". $postinfomation['facilities'].  "\r\n Username : ".$x->username."\r\n. Amount : ".$_POST['bid_amount']."\r\n Message : ". $_POST['best_suited_candid']."\r\n Click Link to check full journey details : http://journeybid.com/Journey-details.php?id=$id";
								$headers1 = "From: info@journeybid.com";
								mail($to1,$subject1,$txt1,$headers1);
						
								$message2 ="Traveller";
								$to2 = $rslt['email'];
								$subject2 = "Thanking you - info@journeybid.com";
								$txt2 .= "A Transporter Bid On my Post \r\n ".'Descripation :' . $postinfomation['descripation'] .  "\r\n From :". $postinfomation['froms'].  "\r\n To : ". $postinfomation['tos'].  "\r\n Date : ". $postinfomation['date'].  "\r\n Vehicle : ". $postinfomation['vehicle'].  "\r\n Facilities : ". $postinfomation['facilities'].  "\r\n Username : ".$y->username."\r\n. Amount : ".$_POST['bid_amount']."\r\n Message : ". $_POST['best_suited_candid']."\r\n Click Link to check full journey details : http://journeybid.com/Journey-details.php?id=$id";
								$headers2 = "From: info@journeybid.com";
								mail($to2,$subject2,$txt2,$headers2);
						//$error_msgs = "<span style='color : green; padding-left:40px;'>You have successfully placed bid for this Journey.</span>";
						if($query_execution){
							//echo "<script>setTimeout(function(){ window.location='transporter-dashboard.php'},6000);</script>";
							echo "<script>window.location='placed-bid-message.php';</script>";
						}
				}
				else {
				$error_msgs = "<span style='color : red; padding-left:40px;'>You have already placed bid for this Journey.</span>";
				}

			}
			
	?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>Place Bid</li>
          </ul>
        </section>
		<?php echo $error_msgs; ?>
        <br>
        <section class="user-profile">
          <div class="row">
            <div class="col-md-9">
            <h3> Journeys: <?php echo  $_GET['desc'];?> </h3>
            <p> Name: <?php echo $_SESSION['user_meta_info']->username;?> </p>
            <p> Location</p>
			<p>&nbsp;&nbsp; From : <b><?php echo  $_GET['from']; ?></b></p>	
			<p>&nbsp;&nbsp; To : <b><?php echo $_GET['to']; ?></b></p>	
			<form method="post">
                  <div class="user-form col-md-8">
                    <div class="field-input">
                      <input type="text" class="input-text" placeholder="Amount" name="bid_amount" required   title="Please Enter Number Only" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" />
                    </div>
                    <!--<div class="checkbox"><label><input type="checkbox" value="Pay via Escrow" name="payment_mode"> I only accept payments via Escrow</label></div>-->
                    <div class="form-group">
					<textarea class="form-control" rows="3" placeholder="What makes you best candidate for this bid" name="best_suited_candid" required></textarea>
                    </div>
                    <!--<div class="checkbox"><label><input type="checkbox" value="Yes" name="email_notification"> Notify me by email if someone bids lower than me</label></div>-->
                  </div>
                  <div class="col-md-12" style="padding-top:10px;">
                  <!--<button class="awe-btn awe-btn-1 awe-btn-medium place_bid">Place Bid </button>-->
                  <input type="submit" class="awe-btn awe-btn-1 awe-btn-medium" value="Place Bid" name="place_bid">
				  
                </div>
				</form>
            </div>
            <div class="col-md-3"> <img class="img-rounded" src="images/deal/img-7.jpg"> 
            
            <span style="margin-top:10px;" class="label label-info center-block">
                    <h5><strong> Traveller </strong></h5>
                    </span>   
            <span style="margin-top:10px;" class="label label-primary center-block">
                    <h5><strong><a href="#" style="color:#fff;"> <?php echo $x->username; ?> </a></strong></h5>
                    </span>
                               <!-- <span style="margin-top:10px;" class="label label-success center-block">
                    <h5><strong> <a href="#" style="color:#fff;">Reviews </a><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i> </strong></h5>
                    </span>--->
                    </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>