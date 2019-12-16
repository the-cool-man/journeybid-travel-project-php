<?php include('header.php'); ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>
	<?php $total = transporter_total_balance($_SESSION['values']['id']);
		if(isset($_POST['trans_withdraw_btn'])){
			$withdraw_amt = $_POST['withdraw_amount'];
			if($_POST['withdraw_amount'] == 0 ){
				 	$msg = "<span style='color : red'> Amount entered is equal to Zero. </span>";
			}
			else if($_POST['withdraw_amount'] > $total ){
				 	$msg = "<span style='color : red'> Amount entered is more than avail balance. </span>";
			}
			else if($total ==0){
				$msg = "<span style='color : red'> Error Your account doesn't have sufficient balance to Withdraw. </span>";
			}
			else {
				$details = get_username($_SESSION['values']['id']);
				$asd = json_decode($details['meta_value'],true);
				$to = 'info@journeybid.com';
				//$to = 'hcp.lko@gmail.com';
				$subject = "Request for Withdraw";
				$message = '<b> Name of Transporter </b> : '.$asd['username'].'<br/><br/> <b> Email </b> : '.$asd['email'].'<br/><br/><b> Withdram Amount </b> : '.$withdraw_amt.'€';
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@journeybid.com>' . "\r\n";
				$smsg = mail($to, $subject, $message, $headers);
				if($smsg){
					$msg = "<span style='color : green ;font-size : 12px'> Your withdraw request is submitted successfully . Admin will communicate with you very soon. </span>"; ?>
					<script type='text/javascript'> 
						var redirec2 = function() { 
							document.location = 'index.php';
							} 
						setTimeout(redirec2 , 4000);
					</script>
			<?php 	}
				
			}
		}
	?>
  <div class="main">

    <div class="container">

      <div class="main-cn element-page bg-white clearfix">

        <section class="breakcrumb-sc">

          <ul class="breadcrumb arrow">

            <li><a href="index.html"><i class="fa fa-home"></i></a></li>

            <li>Withdraw Money</li>

          </ul>

        </section>

        <br>

        <section class="user-profile">

          <div class="row">

            <div class="col-md-12">

              <div class="panel panel-info">

                <div class="panel-body">

                  <div class="user-form col-md-8 col-xs-offset-1">

                    <form method="post">
					<?php echo $msg; ?>
                      <div class="form-group">

                        <label class="sr-only" for="exampleInputAmount">Amount (in Euro)</label>

                        <div class="input-group">

                          <div class="input-group-addon">€</div>

                          <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="withdraw_amount" required="true">

                          <div class="input-group-addon">.00</div>

                        </div>
						<br/>
						
                        <div role="alert" class="alert alert-info"> <strong>Minimum Amount: €0 !</strong> Maximum Amount: €10000. 
						</div>

                      </div>
					    <div class="submit text-center">
							<button  type="submit" class="awe-btn awe-btn-1 awe-btn-lager" name="trans_withdraw_btn">Withdraw Amount</button>
						</div>

                    </form>



                  </div>

                </div>

              </div>

             
            </div>

          </div>

        </section>

      </div>

    </div>

  </div>

<?php include 'footer.php'; ?>