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
					$candid = mysql_real_escape_string($_POST['best_suited_candid']);
					$email_notification = $_POST['email_notification'];
					if($email_notification == NULL){
						$email_notification = "No";
					}
					$id = mysql_real_escape_string($_GET['id']);
					$request_created = mysql_real_escape_string($_GET['created']);
					$vehicle = mysql_real_escape_string($_GET['vehicle_type']);
					$from = mysql_real_escape_string($_GET['from']);
					$to = mysql_real_escape_string($_GET['to']);
					$date = mysql_real_escape_string($_GET['date']);
					$passenger_num = mysql_real_escape_string($_GET['passenger_num']);
					$desc = mysql_real_escape_string($_GET['desc']);
					$user_type=$_SESSION['values']['type'];
					$user_id=$_SESSION['values']['id'];
					$ids = 0;
					
					$query="INSERT into bid_details values('$ids','$bid','$mode','$email_notification','$candid','$id','$request_created','$vehicle','$from','$to','$date','$passenger_num','$user_id','$user_type')";
					$query_execution = mysql_query($query) or die("Error in inserting".mysql_error());
					
								
								$message1 ="Transporter";
								$to1 = trim($transporter_email);
								$subject1 = "You have bid on Traveller";
								
							
								$txt1 = "								
								<table class='table'>
					<thead>
						<tr>
							<td style='padding:8px;'>Description</th>
							<td style='padding:8px;'>".$postinfomation['descripation']."</th>
						</tr>
                    </thead>
					<tbody>
						<tr class='active'>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>From</td>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>".$postinfomation['froms']."</td>
						</tr>
                    <tr>
							<td style='padding:8px;'>To</td>
							<td style='padding:8px;'>".$postinfomation['tos']."</td>
                    </tr>
                    <tr class='success'>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #dff0d8'>Date</td>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #dff0d8'>".$postinfomation['date']."</td>
                    </tr>
                    <tr>
							<td style='padding:8px;'>Vehicle</td>
							<td style='padding:8px'>".$postinfomation['vehicle']."</td>
                    </tr>
                    <tr class='info'>
							<td style='background-color:#d9edf7;padding:8px;border-top:1px solid #d9edf7'>Facilities</td>
							<td style='background-color:#d9edf7;padding:8px;border-top:1px solid #d9edf7'>".$postinfomation['facilities']."</td>
                    </tr>
                    <tr>
						<td style='padding:8px;'>Username</td>
						<td style='padding:8px;'>".$x->username."</td>
                    </tr>
                    <tr class='warning'>
						<td style='background-color:#fcf8e3;padding:8px;border-top:1px solid #fcf8e3'>Amount</td>
						<td style='background-color:#fcf8e3;padding:8px;border-top:1px solid #fcf8e3'>Euro ".$_POST['bid_amount']."</td>
                    </tr>
                    <tr>
						<td style='padding:8px;'>Message</td>
						<td style='padding:8px;'>".nl2br($_POST['best_suited_candid'])."</td>
                    </tr>
                    <tr class='danger'>
						<td style='background-color:#f2dede;padding:8px;border-top:1px solid #f2dede'>Click Link to check full journey details</td>
						<td style='background-color:#f2dede;padding:8px;border-top:1px solid #f2dede'>http://journeybid.com/Journey-details.php?id=$id</td>
                    </tr>
                  </tbody>
                </table>";
								
								
								$headers1  = 'MIME-Version: 1.0' . "\r\n";
								$headers1 .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
								$headers1 .= 'From:info@journeybid.com'."\r\n";		

													

								mail($to1, $subject1, $txt1, $headers1);
								
							
						
								$message2 ="Traveller";
								$to2 = $rslt['email'];
								$subject2 = "A Transporter Bid On my Post : info@journeybid.com";
								
								
															
								
								$txt2 = "								
								<table class='table'>
					<thead>
						<tr>
							<td style='padding:8px;'>Description</th>
							<td style='padding:8px;'>".$postinfomation['descripation']."</th>
						</tr>
                    </thead>
					<tbody>
						<tr class='active'>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>From</td>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>".$postinfomation['froms']."</td>
						</tr>
                    <tr>
							<td style='padding:8px;'>To</td>
							<td style='padding:8px;'>".$postinfomation['tos']."</td>
                    </tr>
                    <tr class='success'>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #dff0d8'>Date</td>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #dff0d8'>".$postinfomation['date']."</td>
                    </tr>
                    <tr>
							<td style='padding:8px;'>Vehicle</td>
							<td style='padding:8px'>".$postinfomation['vehicle']."</td>
                    </tr>
                    <tr class='info'>
							<td style='background-color:#d9edf7;padding:8px;border-top:1px solid #d9edf7'>Facilities</td>
							<td style='background-color:#d9edf7;padding:8px;border-top:1px solid #d9edf7'>".$postinfomation['facilities']."</td>
                    </tr>
                    <tr>
						<td style='padding:8px;'>Username</td>
						<td style='padding:8px;'>".$y->username."</td>
                    </tr>
                    <tr class='warning'>
						<td style='background-color:#fcf8e3;padding:8px;border-top:1px solid #fcf8e3'>Amount</td>
						<td style='background-color:#fcf8e3;padding:8px;border-top:1px solid #fcf8e3'>Euro ".$_POST['bid_amount']."</td>
                    </tr>
                    <tr>
						<td style='padding:8px;'>Message</td>
						<td style='padding:8px;'>".nl2br($_POST['best_suited_candid'])."</td>
                    </tr>
                    <tr class='danger'>
						<td style='background-color:#f2dede;padding:8px;border-top:1px solid #f2dede'>Click Link to check full journey details</td>
						<td style='background-color:#f2dede;padding:8px;border-top:1px solid #f2dede'>http://journeybid.com/Journey-details.php?id=$id</td>
                    </tr>
                  </tbody>
                </table>";
								
								
								$headers2  = 'MIME-Version: 1.0' . "\r\n";
								$headers2 .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
								$headers2 .= 'From:info@journeybid.com'."\r\n";		
								
								
								mail($to2,$subject2,$txt2,$headers2);
						
						if($query_execution)
						{
							
							echo "<script>window.location='placed-bid-message.php';</script>";
						}
				}
				else 
				{
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