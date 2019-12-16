<?php include('config.php'); ob_start(); ?>
<?php
	function add_page_content($page_data){
		if($page_data['page_name'] != NULL){
			$x = explode(' ',$page_data['page_name']);
			$content = mysql_real_escape_string(trim($page_data['page_content']));
			$slug = implode('-',$x).chr(rand(0,100).chr(100,10000));
		$insert="insert into page values('$id' ,'$page_data[page_name]','$content','".date('d-m-y')."','$slug')";
		$query=mysql_query($insert) or die("Error in inserting content ".mysql_error());
		}
	 }
	function fetch_page_content($pagename){
		$select="select * from page";
			$contents=mysql_query($select);
				while($con=mysql_fetch_array($contents)){
					echo $con['page_name']."<br/>";
					echo $con['page_content']."<br/>";
					echo $con['date']."<br/>";
			}
	}
	function signup($val){
		$activation_key = md5(rand(99,99999999));
		$membersince = date('d-m-Y');
		$ins = "insert into user values('$id','$val[email]','$val[password]','$val[type]','$membersince','$activation_key',0)";
		$query = mysql_query($ins);
		$ins1 = "insert into usermeta values('" . mysql_insert_id() . "','user-detail','".json_encode( $val )."','$id')";
		$query = mysql_query($ins1);
		if($query){
			//$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Registration Completed , Please check your Email to get it activated.</div>';
			
						$email = $val['email'];
						$message ="http://journeybid.com/confirmation-user.php?user_key=$activation_key";
						$to = "$email";
						$subject = "Thanking you - info@journeybid.com";
						$txt .= 'Click the link to activate your account :: ' . $message .  "\n" ;
						$headers = "From: info@journeybid.com";
						$mail_report = mail($to,$subject,$txt,$headers);
						
						if($mail_report){
						echo "<script>window.location='registration-complete-message.php';</script>";
						}
		}
	}
	function transport($val){
		$activation_key_trans = md5(rand(99,9999999999));
		$membersince = date('d-m-Y');
		$ins = "insert into user values('$id','$val[email]','$val[password]','$val[type]','$membersince','$activation_key_trans',0)";
		$query = mysql_query($ins);
		$ins1 = "insert into usermeta values('" . mysql_insert_id() . "','user-detail','".json_encode( $val )."','$id')";
		$query = mysql_query($ins1);
		if($query){
			//$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Registration Completed , Please check your Email to get it activated.</div>';
						$email = $val['email'];
						$message ="http://journeybid.com/confirmation-user.php?user_key=$activation_key_trans";
						$to = "$email";
						$subject = "Thanking you - info@journeybid.com";
						$txt .= 'Click the link to activate your account :: ' . $message .  "\n" ;
						$headers = "From: info@journeybid.com";
						$mail_report = mail($to,$subject,$txt,$headers);
						if($mail_report){
						echo "<script>window.location='registration-complete-message.php';</script>";
						}
		}
	}
	function login($val){
		
		$ins = "select * from user join usermeta on(usermeta.user_id = user.id) where user.email = '$val[email]' and user.password = '$val[password]' and user.status='1'";
		$query = mysql_query($ins);
		if(mysql_num_rows($query) == 1){
			$value = mysql_fetch_array($query);
			
			$user_meta_values = json_decode($value['meta_value']);
			$_SESSION['user_meta_info']=$user_meta_values;
			$_SESSION['values'] = $value;
			
				if( $val['newMessage'] == 'true' ){
					echo "<script>window.location='trav_trans_interaction.php';</script>";
				}
				if($value['type']=='transport'){
					echo "<script>window.location='transporter-dashboard.php';</script>";
					//header('location:transporter-dashboard.php');
				}
				if($_SESSION['pt']){
					//header('location:post-journey.php');
					echo "<script>window.location='post-journey.php';</script>";
				}
				if( $value['type']=='traveller' ) {
					//header('location:dashboard.php');
					echo "<script>window.location='dashboard.php';</script>";
				}
				
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Please use Correct Email/Password</div>';
		}
	}
	function logout(){
		session_destroy();
		unset($_SESSION);
		header('location:index.php');
	}
	function adminlogin($val){
		 $ins = "select * from user where email = '$val[email]' and password = '$val[password]' and type = 'admin'";
		$query = mysql_query($ins)or die(mysql_error());
		if(mysql_num_rows($query) == 1){
			$value = mysql_fetch_array($query);
			$_SESSION['value'] = $value;
			//header('location:home.php');
			echo "<script>window.location='home.php'</script>";
		}else{
			$msg = 'PLease fill email/password correct';
		}
	}
	function user(){
		$sel = "select * from user join usermeta on (user.id = usermeta.user_id) where user.type='traveller' or user.type='transport'";
		$query = mysql_query($sel);
	?>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<thead>
			<tr>
				<th>Username</th>
				<th>Date registered</th>
				<th>Role</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead> 
		<tbody>
		<?php while($d = mysql_fetch_array($query)){ ?>
			<tr>
				<?php $value = json_decode($d['meta_value']); ?>
				<td><?php echo $value->username; ?></td>
				<td><?php echo $value->email; ?></td>
				<td><?php echo $value->mobile; ?></td>
				<td><?php echo $value->type; ?></td>
				
				<td class="center">
					<a class="btn btn-danger" href="#"><i class="halflings-icon white trash"></i> </a>
				</td>
			</tr>
		<?php	} ?>
		
		</tbody>
	</table> 
	<?php
	}
	function post_trip($val){
		
		$user_id = $val['user_id']['id'];
		$vec = implode(',' , $val['vechicle']);
		$fac = implode(',' , $val['facilities']);
		$a = date('d M Y');
		$ins = "insert into post_journey values('$id','$val[descripation]','$val[from]','$val[to]','$val[passenger]','$val[date]','$val[help]','$vec','$fac','$user_id','$a','$val[price]','$intialstatus','$initial_cancel_status')";
		$queryy = mysql_query("SELECT MAX(id) FROM post_journey;");
		$data = mysql_fetch_array($queryy);
		$dataa = $data[0]+1;
		$query = mysql_query($ins);
		if($query){
			
			sendmail_to_transporter($val,$dataa);
			$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Thanks Your Journey Has been Posted</div>';
			echo "<script type='text/javascript'>setTimeout(function(){location.href='http://journeybid.com/Journey-details.php?id=$dataa' } , 1000); </script>";
		}
		
	}
	function sendmail_to_transporter($val,$lii){
		
		$vehi = implode(',' , $val['vechicle']);
		$faci = implode(',' , $val['facilities']);
		
		$sel = "select email from user where type='transport'";
		$query = mysql_query($sel);
		$traveller_name = json_decode($_SESSION['values']['meta_value'],true);
		
		while($d = mysql_fetch_array($query)){
			$to = $d['email'];
			$subject = "Traveller ".$traveller_name['username']." has posted New Journey ";
			$message = "<table class='table'>
					<thead>
						<tr>
							<td style='padding:8px;'>Description</th>
							<td style='padding:8px;'>".$val['descripation']."</th>
						</tr>
                    </thead>
					<tbody>
						<tr class='active'>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>From</td>
							<td style='background-color:#f5f5f5;padding:8px;border-top:1px solid #ddd'>".$val['from']."</td>
						</tr>
                    <tr>
							<td style='padding:8px;'>To</td>
							<td style='padding:8px;'>".$val['to']."</td>
                    </tr>
                    <tr class='success'>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #dff0d8'>Date</td>
							<td style='background-color:#dff0d8;padding:8px;border-top:1px solid #dff0d8'>".$val['date']."</td>
                    </tr>
                    <tr>
							<td style='padding:8px;'>Vehicle</td>
							<td style='padding:8px'>"."$vehi"."</td>
                    </tr>
                    <tr class='info'>
							<td style='background-color:#d9edf7;padding:8px;border-top:1px solid #d9edf7'>Facilities</td>
							<td style='background-color:#d9edf7;padding:8px;border-top:1px solid #d9edf7'>"."$faci"."</td>
                    </tr>
                    <tr>
						<td style='padding:8px;'>Username</td>
						<td style='padding:8px;'>".$traveller_name['username']."</td>
                    </tr>
                    <tr class='warning'>
						<td style='background-color:#fcf8e3;padding:8px;border-top:1px solid #fcf8e3'>Amount</td>
						<td style='background-color:#fcf8e3;padding:8px;border-top:1px solid #fcf8e3'>Euro ".$val['price']."</td>
                    </tr>
                    <tr>
						<td style='padding:8px;'>Message</td>
						<td style='padding:8px;'>".$val['help']."</td>
                    </tr>
                    <tr class='danger'>
						<td style='background-color:#f2dede;padding:8px;border-top:1px solid #f2dede'>Click here to get full journey detail</td>
						<td style='background-color:#f2dede;padding:8px;border-top:1px solid #f2dede'>http://journeybid.com/Journey-details.php?id="."$lii"."</td>
                    </tr>
                  </tbody>
                </table>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <info@journeybid.com>' . "\r\n";
			mail($to, $subject, $message, $headers);
		
		}
	}
	function all_journey(){
		$sel = "select * from post_journey join usermeta on (post_journey.user_id = usermeta.user_id)";
		$query = mysql_query($sel);
	?>
	<table id="tabless" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Description</th>
				<th>From</th>
				<th>To</th>
				<th>Passenger</th>
				<th>Message</th>
				<th>Vehicle Types</th>
				<th>Facilities</th>
				<th>User</th>
				<th>Type</th>
				<th>Action</th>
			</tr>
		</thead> 
		<tbody>
	<?php while($d = mysql_fetch_array($query)){ ?>
			<tr>
				<?php $value = json_decode($d['meta_value']); ?>
				<td><?php echo $d['descripation']; ?></td>
				<td><?php echo $d['from']; ?></td>
				<td><?php echo $d['to']; ?></td>
				<td><?php echo $d['passenger']; ?></td>
				<td><?php echo $d['help']; ?></td>
				<td><?php echo $d['vehicle']; ?></td>
				<td><?php echo $d['facilities']; ?></td>
				<td><?php echo $value->username; ?></td>
				<td><?php echo $value->type; ?></td>
				
				<td class="center">
					<a class="btn btn-danger" href="?del=<?php echo $d['id']; ?>"><i class="halflings-icon white trash"></i> </a>
				</td>
			</tr>
	<?php }  ?>
		
		</tbody>
	</table> 
	<?php
	}
	function all_page_content()
		{
		$sel = "select * from page";
		$query = mysql_query($sel);
	?>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<thead>
			<tr>
				<th>Page Name</th>
				<th>Page content</th>
				<th>Last Updated</th>
				<th>Action </th>
			</tr>
		</thead> 
		<tbody>
	<?php while($d = mysql_fetch_array($query)){ ?>
			<tr>
				<td><?php echo $d['page_name']; ?></td>
				<td><?php echo $d['page_content']; ?></td>
				<td><?php echo $d['date']; ?></td>
				<td><a href="editpage.php?edit=<?php echo $d['id']; ?>">Edit</a> | <a href="deletepage.php?edit=<?php echo $d['id']; ?>">Delete</a></td>
			</tr>
		<?php	//print_r($d);
		} 
	?>	
		</tbody>
	</table> 
	<?php
	}
	function user_journey(){
		$sel = "select * from post_journey join bid_details on(post_journey.id = bid_details.main_auto_id) where post_journey.user_id = '".$_SESSION['values']['id']."'";
		$query = mysql_query($sel);
		$count = 1;
		
		while($d = mysql_fetch_array($query)){
			//echo "<pre>";
			//print_r($d['journey_status']);
			$jid = $d[0];
			$traveller_id = $_SESSION['values']['user_id'];
			$transporter = get_transpoter($d['user_id']);
			
			$transporter_id = $transporter['user_id'];
			$trans_details = json_decode($transporter[2]);
			if($d['journey_status'] == 1 ){
				$journey_current_status = "<a href='javascript:void(0)' class='btn btn-primary approve' data-btn='$count'>Completed</a>";
			} else {
				$journey_current_status = "<a href='pay-now.php?transemail=$trans_details->email&from=$d[froms]&to=$d[tos]&trans_bid=$d[bid_amount]&joun_id=$jid&tr_id=$traveller_id&tn_id=$transporter_id' class='btn btn-primary approve' data-btn='$count'>APPROVE</a>";
			}
			echo "<tr><td>".$count."</td><td>".$trans_details->username."</td><td>".$d['best_candid_comments']."</td><td>".$d['froms']. '-' .$d['tos']."</td><td>".$d['bid_amount'].'€'."</td><td>".$journey_current_status."</td><td><a href='chats.php?sender_id=".$_SESSION['values']['id']."&reciever_id=".$transporter['user_id']."'><i class='fa fa-envelope fa-2x'></i></a></td></tr>";
			$count++;
		}
	}
	function getGroupid($reciever,$sender){
		$sel = "select group_id from chat_group where (sender = '$sender' && reciever = '$reciever') || (reciever = '$sender' && reciever = '$sender')";
		$query = mysql_query($sel);
		$d = mysql_fetch_array($query);
		$value = $d[0];
		return $value;
	}
	
	function get_transpoter($id){
		$sel = "select * from usermeta where user_id = '$id'";
		$query = mysql_query($sel);
		$val = mysql_fetch_array($query);
		return $val;
	}
	function transporter_bid_details(){
		$uid = $_SESSION['values']['id'];
		$sel = "select * from bid_details join usermeta on(bid_details.user_id = usermeta.user_id) where bid_details.user_id='".$_SESSION['values']['id']."'";
		$query = mysql_query($sel);
		$count = 1;
		while($d = mysql_fetch_array($query)){
			$userdetails = get_user_by_post_id($d['main_auto_id']);
			$traveller_post_desc = json_decode($userdetails['meta_value']);
			$trav_id = $userdetails['user_id'];
			$journ_id = $userdetails['id'];
			$det = get_traveller_amount($uid,$trav_id,$journ_id);
			//print_R($det);
			echo "<tr><td>".$count."</td><td>".$traveller_post_desc->username."</td><td>".$userdetails['descripation']."</td><td>".$userdetails['vehicle']."</td><td>".$userdetails['froms']. '-' .$userdetails['tos']."</td><td>".$d['bid_amount']."</td><td>".$det['travel_amount']."</td></tr>";
			$count++;
		}
	}
	function get_user_by_post_id($id){
		$sel = "select * from post_journey join usermeta on(post_journey.user_id = usermeta.user_id) where post_journey.id = '$id'";
		$query = mysql_query($sel);
		$posts = mysql_fetch_array($query);
		//print_r($posts);
		return $posts;
	}
	function edit_user_profile($id){
		$select = "SELECT * from usermeta where user_id='$id'";
		$query = mysql_query($select);
		$row = mysql_fetch_array($query);
		print_r($row);
	}
	function get_username($id){
		$sel = "select * from usermeta where user_id = '$id'";
		$query = mysql_query($sel);
		$value = mysql_fetch_array($query);
		return $value;
	}
	function get_post($id){
		$sel = "select * from post_journey where id = '$id'";
		$query = mysql_query($sel);
		$value = mysql_fetch_array($query);
		return $value;
	}
	function update_forgot_password($newpass,$cemail){
		$update_query = "UPDATE user set password='$newpass' where email='$cemail'";
		mysql_query($update_query);
	}
	function reset_password($email,$oldpass,$newpass){
		$select = "SELECT email,password from user where email='$email' AND password='$oldpass'";
		$query = mysql_query($select) or die("error ".mysql_error());
		if(mysql_num_rows($query) == 1){
			$update = "UPDATE user set password='$newpass' where email='$email'";
			$rslt = mysql_query($update);
			if($rslt){ 
				session_destroy();
				unset($_SESSION);
				echo "<script>setTimeout(function() {window.location='user-login.php'}, 5000); </script>";
				$_SESSION['msg10'] = "<span style='color:green'>Password Has been successfully changed , login again with new password.</span>";
				
			}
		}
	}
	function select_user($type){
		if($type=='traveller'){
			$query = "SELECT user_id,id,meta_value from user join usermeta on(usermeta.user_id=user.id) where user.type='transport'";
		} else {
			$query = "SELECT user_id,email,meta_value from user join usermeta on(usermeta.user_id=user.id) where user.type='traveller'";
		}
		$execute = mysql_query($query);
		while( $val = mysql_fetch_array($execute)){
			$decoded_vals = json_decode($val['meta_value'],true);
			echo "<option value=".$val['user_id'].">".$decoded_vals['username']."</option>";
		}
	}
	function chat_send_message($to,$from,$msg,$stat){
		$sel = "select * from chat_group where (sender = '$from' and reciever = '$to') or (reciever = '$from' and sender = '$to')";
		$query = mysql_query($sel);
		if(mysql_num_rows($query) < 1){
			$today = date("Ymd");
			$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
			$unique = $today . $rand;
			$chat_group = "INSERT into chat_group values('$id','".$unique."','$from','$to')";
			$execute = mysql_query($chat_group);
			$_SESSION['group_id'] = $unique;
		}
		$query = "select group_id  from chat_group where (sender = '$from' and reciever = '$to') or (reciever = '$from' and sender = '$to')";
		$execute = mysql_query($query);
		if(mysql_num_rows($execute) == 1 ){
		$values = mysql_fetch_array($execute);
		$_SESSION['group_id'] = $values['group_id'];
		}
		if($stat == 1){ $status = $stat; } else { $status = 0; }
		$msg_send = "INSERT into chat values('$id','$from','$msg','$status',CURDATE(),CURTIME(),'$_SESSION[group_id]')";
		$execute = mysql_query($msg_send);
		if($msg_send){
			$uone = get_useremail($_SESSION['values']['id']);
			$rsltone = json_decode($uone['meta_value'],true);
			$name_of_sender = $rsltone['username'];
			$utwo = get_useremail2($to);
			$rslttwo = json_decode($utwo['meta_value'],true);
			$too = $rslttwo['email'];
			$subb = "You Have New Message"; 
			$link_msg ="http://www.journeybid.com/user-login.php?new_msg=true";
			$msgg = "$name_of_sender has sent you a new message.<br/><br/> Click the link to read $link_msg";
			$header = "MIME-Version: 1.0" . "\r\n";
			$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$header .= 'From: <info@journeybid.com>' . "\r\n";
			mail($too,$subb,$msgg,$header);
		}
	}
	function last_interaction($id){
		$query = "SELECT * from  chat_group  where sender = '$id' or reciever = '$id'";
		$execute = mysql_query($query);
		if(! mysql_num_rows($execute) == 0 ){
		while($value = mysql_fetch_array($execute)){
			if($value['sender'] == $id){
				
				$username = select_user_name($value['reciever']);
				$num_of_pending_msgs = one_to_one_pending_msg($value['group_id'],$_SESSION['values']['id']);
				if($num_of_pending_msgs == 0){ unset($num_of_pending_msgs); 
					echo "<a href='trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[reciever]&stat=1' data-value=''trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[reciever]''>$username</a>$num_of_pending_msgs<br/>";
				}else{
					echo "<a href='trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[reciever]&stat=1' data-value=''trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[reciever]''>$username</a><span class='o2omsg1'>$num_of_pending_msgs</span><br/>";
				}
			} else {
				$num_of_pending_msgs = one_to_one_pending_msg($value['group_id'],$_SESSION['values']['id'])."<br/>";
				$username = select_user_name($value['sender']);
				if($num_of_pending_msgs == 0){ unset($num_of_pending_msgs); 
					echo "<a href='trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[sender]&stat=1' data-value='trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[sender]'>$username</a>$num_of_pending_msgs<br/>";
				}else{
					echo "<a href='trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[sender]&stat=1' data-value='trav_trans_interaction.php?id=$value[group_id]&sender_id=$value[sender]'>$username</a><span class='o2omsg2'>$num_of_pending_msgs</span><br/>";
				}
			} 
		}
	}
	else {
		$nomessage = "<h1 style='clear:both;width:100%;text-align:center'> No messages found </h1>";
		$_SESSION['nmf'] = $nomessage;
	}
	}
	function select_user_name($id){
		$query = "Select meta_value from usermeta where user_id='$id'";
		$execute = mysql_query($query);
		while( $val = mysql_fetch_array($execute)){
			$decoded_val = json_decode($val['meta_value'],true);
			return $name = $decoded_val['username'];
		}
	}
	
	function send_chat(){
		if(isset($_POST['submit'])){
			chat_send_message($_GET['sender_id'],$_SESSION['values']['id'],$_POST['rlp']);
		}
		?>
		<!--</div>
		</div>
		</div>-->
			<br/>
			<br/>
			<form method="post">
				<textarea name="rlp" placeholder="Reply" class="form-control" width="100%" rows="6"></textarea>
				<input type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">
			</form>
		<?php
		}
		function get_chat_profile_image($user_id){
			$query = "SELECT meta_value from usermeta where user_id='$user_id'";
			$execute = mysql_query($query);
				while( $values = mysql_fetch_assoc($execute) ){
					$decoded_val = json_decode( $values['meta_value'],true );
					return $pi = $decoded_val['profile_image'];
				}
		}
		function get_total_journeys($sessionid){
			$query = "SELECT * from post_journey where user_id='$sessionid'";
			$execute = mysql_query($query);
			$number_of_rows = mysql_num_rows($execute);
				if($number_of_rows == 0){
					return $no_journey_found = "<h2 style='text-align:center'> NO journeys Posted </h2>";
				}
				else {
					$counter = 1;
					while( $vals = mysql_fetch_assoc($execute) ){
						$notb = get_bid_userid($vals['id']);
						if($notb == 0){
							$notb = 'Pending';
						}
						if($vals['journey_status'] == 1){		
							$notb = 'Complete';
							$disabled = 'btn disabled';
						}
						if($vals['cancel_status'] == 1){		
							$notb = 'Cancelled';
							$disabled = 'btn disabled';
						}
						/*if ($notb != 0 || $vals['journey_status'] != 1 || $vals['cancel_status'] != 1 ) {
							$notb = "$notb Bids";
						}*/
						$jourid = $vals['id'];
						echo "<tr><td>".$counter."</td><td>".$vals['created']."</td><td>".$vals['date']."</td><td>".$vals['passenger']."</td><td>".$vals['froms'].' - '.$vals['tos']."</td><td>".$vals['price']."€</td><td>".$notb."</td><td><a href='complete_cancel_journey.php?jid=$jourid' data-toggle='tooltip' title='Completed / Cancel' class='ccj ".$disabled."'  ><span class='glyphicon glyphicon-check fa-2x'></span></a></td></tr>";
						$counter++;
						unset($disabled);
					}
				}
		}
		
		function get_bid_userid($journeyid){
			$q = "SELECT main_auto_id from bid_details where main_auto_id='$journeyid'";
						$ex = mysql_query($q) or die(mysql_error());
						return $nos_of_tras_bids = mysql_num_rows($ex);
		}
		
		/*
		function single_get_bid_userid($jnrid){
			$q = "SELECT * from bid_details where main_auto_id='$jnrid'";
			$ex = mysql_query($q);
			$counter = 1;
			while( $vals = mysql_fetch_assoc($ex) ){
				$trans_details = get_transpoter($vals['user_id']);
				$uds = json_decode( $trans_details['meta_value'],true );
				echo "<tr><td>".$counter."</td><td>".$vals['date_of_journey']."</td><td>".$vals['num_of_passenger']."</td><td>".$vals['departure_from'].' - '.$vals['departure_to']."</td><td>".$uds['username']."</td><td>".$uds['email']."</td><td><a href='complete_cancel_journey.php?jid=$jourid' data-toggle='tooltip' title='Complete/Cancel'><span class='glyphicon glyphicon-check fa-2x'></span></a></td></tr>";
				$counter++;
				}
		} */
		function single_get_journey_details($jnrid){
			$query = "SELECT * from post_journey where id='$jnrid'";
			$execute = mysql_query($query);
			return $vals = mysql_fetch_assoc($execute);
		}
		function get_transporter_reviews($uid){
			$rquery = "SELECT * from reviews where trans_id='$uid'";
			$rexecute = mysql_query($rquery);
			//$norrows = mysql_num_rows($rexecute);
				while( $rval = mysql_fetch_assoc($rexecute) ){
					$value[] = $rval;
				}
				return $value;
		}
		function get_total_reviews_rating($ratings){
				
				if($ratings == 1){
					return $rslt = "<i class='fa fa-star'></i>";
					exit;
				}
				if($ratings == 2){
					return $rslt = "<i class='fa fa-star'></i> <i class='fa fa-star'></i>";
				}
				if($ratings == 3){
					return $rslt = "<i class='fa fa-star'></i> <i class='fa fa-star'> </i><i class='fa fa-star'></i>";	
				}
				if($ratings == 4){
					return $rslt = "<i class='fa fa-star'></i> <i class='fa fa-star'> </i><i class='fa fa-star'></i> <i class='fa fa-star'></i>";
				
				}
				if($ratings == 5){
					return $rslt = "<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>";
				}
				
			}
			function get_traveller_amount($trans_id,$trav_id,$jour_id){
				$query2 = "SELECT travel_amount from payment_details where transporter_id='$trans_id' && traveller_id='$trav_id' && journey_id='$jour_id'";
				$execute2 = mysql_query($query2);
				while( $valss = mysql_fetch_assoc($execute2) ){
					return $valss;
				}
			}
			function transporter_total_balance($userid){
				$query = "SELECT travel_amount from payment_details where transporter_id='$userid'";		
				$execute = mysql_query($query);
				while( $val= mysql_fetch_assoc($execute) ){
					$sum +=$val['travel_amount'];
				}
				return $sum;
			}
			
			function check_duplicate_request_for_same_journey($transid,$journeyid){
				$query4 = "SELECT * from bid_details where main_auto_id='$journeyid' && user_id='$transid'";
				$execute4 = mysql_query($query4);
				return $rslt = mysql_num_rows($execute4);
			}
			function get_useremail($id1){
				$query1 = "SELECT meta_value from usermeta where user_id='$id1'";
				$execute1 = mysql_query($query1);
				while( $vals =mysql_fetch_array($execute1)){
					return $vals;
				}
			}
			function get_useremail2($id2){
				$query2 = "SELECT meta_value from usermeta where user_id='$id2'";
				$execute2 = mysql_query($query2);
				while( $values =mysql_fetch_array($execute2)){
					return $values;
				}
			}
			function get_user_member_since_detail($id){
				$query6 = "SELECT member_since from user where id='$id'";
				$execute6 = mysql_query($query6);
				while( $vll = mysql_fetch_assoc($execute6) ){
					return $vll;
				}
			}
			function messages_unread($sessid){
				$sel = "select group_id from chat_group where sender = '$sessid' or reciever = '$sessid'";
				$query = mysql_query($sel);
				$d = mysql_fetch_array($query);
				$msgquery = "SELECT * from chat where chat.status=0 && chat.group_id = '$d[group_id]' && sender != '$sessid'";
				$msgexecute = mysql_query($msgquery);
				return $msgnumrows = mysql_num_rows($msgexecute);
			}
			function one_to_one_pending_msg($gid,$cur_u_id){
				$otoq = "SELECT * from chat where group_id='$gid' && status=0 && sender != $cur_u_id";
				$otoq_execute = mysql_query($otoq);
				return $otoq_rows = mysql_num_rows($otoq_execute);
			}
			function update_msgs_status($gid,$usid){
				$upquery = "UPDATE chat set status=1 where sender='$usid' && group_id='$gid'";
				mysql_query($upquery);
			}
			function get_admin_payment(){
				$sel = "select * from payment_details";
				$query = mysql_query($sel);
				$row = array();
				while($d = mysql_fetch_array($query)){
					$row[] = $d;
				}
				return $row;
			}
			function getAllProvidersListing(){
				$selectQuery = "SELECT id,email from user where type='transport'";
				$executeQuery = mysql_query($selectQuery) or die(mysql_error());
				$count=1;
				while( $row=mysql_fetch_assoc($executeQuery) ){
					
						$providerNameJson = getNameOfProviders($row['id']);
						
						$arrayproviderNameJson = json_decode($providerNameJson['meta_value'],true);
						
				?>
                    <tr class="success">
                      <td><?php echo $count; ?></td>
                      <td><?php echo $arrayproviderNameJson['username']; ?></td>
                      <td><a class="btn btn-primary" href="http://journeybid.com/profiles-transport-provider.php?name=<?php echo $arrayproviderNameJson['username']; ?>" role="button">View Profile</a></td>
                    </tr>
			<?php 	
				$count++;
			 } }
			 
			 function getNameOfProviders($id){
				 $selectNameQuery = "SELECT meta_value from usermeta where user_id='$id'";
				 $executeselectNameQuery = mysql_query($selectNameQuery) or die(mysql_error());
				 while( $n = mysql_fetch_assoc($executeselectNameQuery) ){
					 return $n;
				 }
			 }
ob_end_flush();
?>