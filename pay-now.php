<?php include('header.php'); ?>
<?php //if(!isset($_SESSION['values'])){ header('location:user-login.php');}
	if( $_SESSION['values']['email'] == NULL ) { echo "<script>window.location='user-login.php';</script>"; }
 ?>
<?php $decoded_val = json_decode($_SESSION['values']['meta_value'],true);

$name = $decoded_val['username'];

$email2 = $decoded_val['email'];

$mobile = $decoded_val['mobile'];

$from = $_GET['from'];

$to = $_GET['to'];

$transporter_bid_amount = $_GET['trans_bid'];

$journeyBidCommission = ( $transporter_bid_amount*10 )/100;

 ?>
  <div class="main">

    <div class="container">

      <div class="main-cn element-page bg-white clearfix">

        <section class="breakcrumb-sc">

          <ul class="breadcrumb arrow">

            <li><a href="index.html"><i class="fa fa-home"></i></a></li>

            <li> Confirm with deposit </li>

          </ul>

        </section>

        <br>

        <section class="user-profile">

          <div class="row">

            <div class="col-md-12">

              <div class="panel panel-info">

                <div class="panel-body">

                  <div class="user-form col-md-8 col-xs-offset-1">

                    <form class="form-horizontal" method="post" action="https://www.paypal.com/cgi-bin/webscr" name="_xclick">

                      <div class="form-group">

                        <label for="inputEmail2" class="col-sm-5 control-label">Total Amount</label>

                        <div class="col-sm-7">

                          <input type="text" class="form-control actual_pay_amount" id="inputEmail2" placeholder=""  name="amount" required='required' value="<?php echo $transporter_bid_amount; ?>" pattern="\d*" title="Please Enter Number Only" oninvalid="setCustomValidity('Please Enter Number Only')" />

                        </div>

                      </div>

                      <!--<div class="form-group">

                        <label for="jbf" class="col-sm-5 control-label">Deposit to confirm</label>

                        <div class="col-sm-7">

                          <input type="text" class="form-control journey_bid_commission" id="jbf" placeholder="" required='required' name="jbfees" value="<?php //echo $journeyBidCommission; ?>" disabled="disabled"/>

                        </div>
--> <div style="clear:both"></div>
                      </div>
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="hubgre@gmail.com">
						<input type="hidden" value="<?php echo $from.'-'.$to ;?>" class="invest-field" name="item_name"/>
						<input type="hidden" name="quantity" value="1">
						<input type="hidden" name="currency_code" value="EUR">
						<input type="hidden" name="rm" value="2">
						<input type="hidden" name="tx" value="TransactionID">
						<input type='hidden' name='return' value='http://journeybid.com/thank-you.php'>
						<input type="hidden" name="on1" value="Name of traveller" />
						<input type="hidden" name="os1" value="<?php echo $name; ?>" />
						<input type="hidden" name="on2" value="Email of traveller" />
						<input type="hidden" name="os2" value="<?php echo $email2; ?>" />
						<input type="hidden" name="on3" value="Mobile of traveller" />
						<input type="hidden" name="os3" value="<?php echo $mobile; ?>" />
						<input type="hidden" name="on4" value="Transporter Email"/>
						<input type="hidden" name="os4" value="<?php echo $_GET['transemail'];?>"/>
						<input type="hidden" name="on5" value="Transporter Bid Amount"/>
						<input type="hidden" name="os5" value="<?php echo $_GET['trans_bid'];?>"/>
						<input type="hidden" name="on6" value="Journey ID"/>
						<input type="hidden" name="os6" value="<?php echo $_GET['joun_id'];?>"/>
						<input type="hidden" name="on7" value="Traveller ID"/>
						<input type="hidden" name="os7" value="<?php echo $_GET['tr_id'];?>"/>
						<input type="hidden" name="on8" value="Transporter ID"/>
						<input type="hidden" name="os8" value="<?php echo $_GET['tn_id'];?>"/>
                        <br>
						<div style="clear:both"></div>
                      <div class="form-group">

                      <!--  <div role="alert" class="alert alert-info"> <strong>Includes 10% Journeybid fee</strong> </div>-->

                        <div class="submit text-center">

                          <button class="awe-btn awe-btn-1 awe-btn-lager" type="submit">Pay now</button>

                        </div>

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