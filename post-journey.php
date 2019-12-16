<?php include('header.php');if($_SESSION['values']['email'] == NULL){	echo "<script>window.location='user-login.php';</script>";} ?>
<?php //if(!isset($_SESSION['values']['email'])){ //header('location:user-login.php');//echo "<script>window.location='user-login.php';</script>";//} ?> 

<?php $pageidentity=$_POST['index-tracker'];
	$_SESSION['pt'] = $pageidentity ; 
?>
<?php 
	if(isset($_POST['indexsubmit'])){
	$_SESSION['infrom'] = $_POST['from'];
	$_SESSION['into']= $_POST['to'];
	$_SESSION['indate'] = $_POST['date'];
		}
?>
<?php
	if(isset($_POST['submit'])){
		
		$val = array(
						'descripation' => $_POST['descripation'],
						'from' => $_POST['from'],
						'date' => $_POST['date'],
						'passenger' => $_POST['passenger'],
						'to' => $_POST['to'],
						'help' => $_POST['help'],
						'vechicle' => $_POST['vechicle'],
						'facilities' => $_POST['facilities'],
						'user_id' => $_SESSION['values'],
						'price' => $_POST['price'],
					);
			post_trip($val);
	}
?>
<!--
<section class="sub-banner">
    <div class="bg-parallax bg-1"></div>
    <div class="logo-banner text-center"><a href="index.html" title=""><img src="images/logo-banner.png" alt=""></a></div>
  </section>-->

  
<div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href=""><i class="fa fa-home"></i></a></li>
            <li>Post your journey</li>
          </ul>
        </section>
        <br>
        <section class="user-profile">
			<?php if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; } unset($_SESSION['msg']); ?>
          <div class="row">
            <div class="col-md-12">
			<form method="post" action="post-journey.php" id="journey">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">&nbsp; </h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-6">
                    <div class="field-input">
                      <input type="text"class="input-text" placeholder="Vehicle preference (e.g. coach) *" name="descripation" required>
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text" name="from" value="<?php echo $_SESSION['infrom'];?>" placeholder="From *" required/>
                    </div>
                    <div class="field-input">
                      <input type="text" class="calendar-input input-text" value="<?php echo $_SESSION['indate'];?>" name="date" placeholder="Date *" required>
                    </div>
                    
                    </div>
                    
                    <!--
					<div class="field-input">
                      <input type="text" class="input-text"  placeholder="Budget​"  name="price" required>
                    </div>
                  -->
                  
                  <div class="user-form col-md-6">
                    <div class="field-input">
                      <input type="text" class="input-text"  placeholder="Approx how many people *"  name="passenger" required>
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text"  name="to" value="<?php echo $_SESSION['into'];?>" placeholder="To *"/ required>
                    </div>
                    <div class="field-input">
                      <input type="text" class="input-text"  placeholder="Any further details to describe your trip (e.g. special needs)"  
"  name="help" required>
                    </div>
                  </div>
                </div>
				
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">&nbsp;</h3>
                </div>
                <div class="panel-body">
                  <div class="payment-form">
                    <div class="row form">
                      <div class="col-md-6">
                        <h2>Vehicle Types</h2>
                        <div class="field-input">
                          <div class="check-box">
                            <input type="checkbox" value="Luxury Coach"  name="vechicle[]">
                            <label for="offers">Luxury Coach</label>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Mini Bus"  name="vechicle[]" >
                              <label for="offers">Mini Bus</label>
                            </div>
                          </div>
                          <!--<div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Other" name="vechicle[]" >
                              <label for="offers">Other</label>
                            </div>
                          </div>-->
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="SUV"  name="vechicle[]" >
                              <label for="offers">SUV</label>
                            </div>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Electric" name="vechicle[]" >
                              <label for="offers">Electric</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <h2>Facilities</h2>
                        <div class="field-input">
                          <div class="check-box">
                            <input type="checkbox" value="Air Condition"  name="facilities[]" >
                            <label for="offers">Air Condition</label>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Car Seat-Booster" name="facilities[]" >
                              <label for="offers">Car Seat-Booster</label>
                            </div>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Car Seat-infant" name="facilities[]" >
                              <label for="offers">Car Seat-infant</label>
                            </div>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="DVD/Entertainment" name="facilities[]" >
                              <label for="offers">DVD/Entertainment</label>
                            </div>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Refreshment/Tea/Coffee" name="facilities[]" >
                              <label for="offers">Refreshment/Tea/Coffee</label>
                            </div>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Wheelchair Access" name="facilities[]" >
                              <label for="offers">Wheelchair Access</label>
                            </div>
                          </div>
                          <div class="field-input">
                            <div class="check-box">
                              <input type="checkbox" value="Trailer/Special Luggage" name="facilities[]" >
                              <label for="offers">Trailer/Special Luggage</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="submit text-center">
                      <input type="submit" class="awe-btn awe-btn-1 awe-btn-lager" value="Post" name="submit">
                    </div>
                  </div>
                  <!--<div class="user-form col-md-8">
                  
                  
                  <div class="field-input">
                  <div class="check-box">
                    <input type="checkbox" id="checkbox">
                    <label for="checkbox"><i class="fa fa-paypal"></i> PayPal</label>
                  </div>
                  </div>
                  <div class="field-input">
                  <div class="check-box">
                    <input type="checkbox" id="checkbox">
                    <label for="checkbox"><i class="fa fa-credit-card"></i> Credit Card</label>
                  </div>
                  </div>
                  
                    
                    
                    
                  </div>-->
                </div>
              </div>
			</form>
			 <!--<div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Payer Details</h3>
                </div>
                <div class="panel-body">
                <form class="form-inline"> 
                  <div class="user-form col-md-4">
                    <div class="field-input">
                      <input type="text" value="Email*" class="input-text">
                    </div>
 </div>
 <div class="user-form col-md-4">
                    <div class="field-input">
                      <input type="text" value="Address*" class="input-text">
                    </div>
 </div>
 <div class="user-form col-md-4">
                    <div class="field-input">
                      <input type="text" value="City*" class="input-text">
                    </div>
 </div>
 <div class="clearfix"> </div>
 
 <div class="user-form col-md-3">
                    <div class="field-input">
                      <input type="text" value="State*" class="input-text">
                    </div>
 </div>
  <div class="user-form col-md-3">
                    <div class="field-input">
                      <input type="text" value="Country*" class="input-text">
                    </div>
 </div>
  <div class="user-form col-md-3">
                    <div class="field-input">
                      <input type="text" value="Zip Code*" class="input-text">
                    </div>
 </div>
  <div class="user-form col-md-3">
                    <div class="field-input">
                      <input type="text" value="Phone*" class="input-text">
                    </div>
 </div>

 <div class="col-md-12" style="padding-top:10px;">
                  <button class="awe-btn awe-btn-1 awe-btn-medium">Pay Now</button>
                </div>
 
                  </form>
                </div>
              </div>-->
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<?php include('footer.php'); ?>