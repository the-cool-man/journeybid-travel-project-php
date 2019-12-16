<?php include 'header.php';?>
	
	<?php
	
	$name = $_POST['option_selection1'];
	$email2 = $_POST['option_selection2'];
	$mobile = $_POST['option_selection3'];
	$email = $_POST['option_selection4'];
	$trans_bid = $_POST['option_selection5'];
	$journeys_id = $_POST['option_selection6'];
	$traveller_id = $_POST['option_selection7'];
	$transporter_id = $_POST['option_selection8'];
    $trav_bid = $_POST['mc_gross'];
	$payer_id = $_POST['payer_id'];
	$tax_id = $_POST['txn_id'];
	//echo $email."<br/>";
	//echo $email2;
	?>
	
	
	<?php
	
		if(!empty($name) && !empty($email2) && !empty($email)){
			$query = "SELECT * from post_journey where id='$journeys_id'";
			$execute = mysql_query($query);
			$rslt = mysql_fetch_array($execute);
			$frm = $rslt['froms'];
			$t = $rslt['tos'];
			$ps = $rslt['passenger'];
			$dt = $rslt['date'];
			$ds = $rslt['descripation'];
			$to = "$email";
			$subject = "Thanking you - info@journeybid.com";
			$txt .= 'Your bid has been approved by traveller :: ' . $name .  "\n" . 'Email of traveller :: '. $email2 . "\n" .'Mobile number of Traveller :: ' .$mobile. "\n" . 'Amount Paid by Traveller :: '.$trav_bid.'€'.  "\n" .'Traveller Start Point :: '.$rslt['froms']. "\n" .'Traveller Destination Point :: '.$rslt['tos']. "\n" .'Number of Passenger :: '.$rslt['passenger']. "\n" .'Date of Journey :: '.$rslt['date']. "\n" .'Journey Description :: '.$ds;
			$headers = "From: info@journeybid.com";
			
			/*****************************************************/
			
			$txt2 .= 'Payment Successfully Done :-'."\n".'Amount Paid : '.$trav_bid.'€'. "\n" .'Transporter Email-ID : '.$to;	
			$mail_report_traveller = mail($email2,$subject,$txt2,$headers);
			
			
			
			$mail_report = mail($to,$subject,$txt,$headers);
			if($mail_report){
				$query = "INSERT into payment_details values('$id','$traveller_id','$transporter_id','$journeys_id','$payer_id','$tax_id','$trans_bid','$trav_bid',1)";
				$successfully_inserted_details = mysql_query($query);
				echo "<h1 class='text-center'>Thank You ..!!!</h1>";
				if($successfully_inserted_details){ ?>
					<script type="text/javascript">
						var redi = function(){
							document.location = 'index.php';
						};
						setTimeout(redi, 4000);
					</script>
	<?php		
			} 
		}
	} else {
		echo "<h1 class='text-center'>Error Occured ..!</h1>";
	}
	?>
	

<?php include 'footer.php';?>