<?php include('header.php'); ?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>Add amount to wallet</li>
          </ul>
        </section>
        <br>
        <section class="user-profile">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Your Current Available Balance: €0.00</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">
                    <form class="">
                      <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Amount (in Euro)</label>
                        <div class="input-group">
                          <div class="input-group-addon">€</div>
                          <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                          <div class="input-group-addon">.00</div>
                        </div>
                        <br>
                        <div role="alert" class="alert alert-info"> <strong>Minimum Amount: €0 !</strong> Maximum Amount: €10000. </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Payment Information</h3>
                </div>
                <div class="panel-body">
                  <div class="payment-form">
                    <div class="row form">
                      <div class="col-md-6">
                        <h2>Your Information</h2>
                        <div class="form-field">
                          <input type="text" class="field-input" placeholder="First Name">
                        </div>
                        <div class="form-field">
                          <input type="text" class="field-input" placeholder="Last Name">
                        </div>
                        <div class="form-field">
                          <input type="text" class="field-input" placeholder="Email">
                        </div>
                        <div class="form-field">
                          <input type="text" class="field-input" placeholder="Email (confirm)">
                        </div>
                        <div class="form-field">
                          <input type="text" class="field-input" placeholder="Phone number">
                        </div>
                        <div class="form-field">
                          <input type="text" class="field-input" placeholder="Country of Passport">
                        </div>
                        
                      </div>
                      <div class="col-md-6">
                        <h2>Your payment details</h2>
                        <span>Select Payment Method <img alt="" src="images/icon-payment.png"></span>
                        <ul>
                          <li>
                            <div class="radio-checkbox">
                              <input type="radio" class="radio" id="radio-1" name="radio-1">
                              <label for="radio-1">Visa</label>
                            </div>
                          </li>
                          <li>
                            <div class="radio-checkbox">
                              <input type="radio" class="radio" id="radio-2" name="radio-1">
                              <label for="radio-2">MasterCard</label>
                            </div>
                          </li>
                          <li>
                            <div class="radio-checkbox">
                              <input type="radio" class="radio" id="radio-3" name="radio-1">
                              <label for="radio-3">JCB</label>
                            </div>
                          </li>
                          <li>
                            <div class="radio-checkbox">
                              <input type="radio" class="radio" id="radio-4" name="radio-1">
                              <label for="radio-4">American Express</label>
                            </div>
                          </li>
                          <li>
                            <div class="radio-checkbox">
                              <input type="radio" class="radio" id="radio-5" name="radio-1">
                              <label for="radio-5">PayPal</label>
                            </div>
                          </li>
                          <li>
                            <div class="radio-checkbox">
                              <input type="radio" class="radio" id="radio-6" name="radio-1">
                              <label for="radio-6">Carte Bleue</label>
                            </div>
                          </li>
                        </ul>
                        <div class="row">
                          <div class="col-sm-6 col-md-12 col-lg-6 cart-number">
                            <label>Card Number</label>
                            <div class="row">
                              <div class="col-xs-3">
                                <div class="form-field">
                                  <input type="text" class="field-input">
                                </div>
                              </div>
                              <div class="col-xs-3">
                                <div class="form-field">
                                  <input type="text" class="field-input">
                                </div>
                              </div>
                              <div class="col-xs-3">
                                <div class="form-field">
                                  <input type="text" class="field-input">
                                </div>
                              </div>
                              <div class="col-xs-3">
                                <div class="form-field">
                                  <input type="text" class="field-input">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-12 col-lg-6 card-holder">
                            <label>Card Holder Name</label>
                            <div class="form-field">
                              <input type="text" class="field-input">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-12 col-lg-6 expiry-date">
                            <label>Expiry Date</label>
                            <div class="row">
                              <div class="col-xs-6">
                                <div class="form-field">
                                  <input type="text" class="field-input calendar-input hasDatepicker" id="dp1442456604462">
                                </div>
                              </div>
                              <div class="col-xs-6">
                                <div class="form-field">
                                  <input type="text" class="field-input calendar-input hasDatepicker" id="dp1442456604463">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-12 col-lg-6 cvc-code">
                            <label>CVC-code</label>
                            <div class="form-field">
                              <input type="text" class="field-input">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="submit text-center">
                      
                      <button class="awe-btn awe-btn-1 awe-btn-lager">Pay now</button>
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