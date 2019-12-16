<?php include('header.php'); ?>
  <div class="main">
    <div class="container">
      <div class="main-cn bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>Contact us</li>
          </ul>
        </section>
        <section class="contact-page">
          <div class="contact-maps">
<!--            <div id="contact-maps" data-map-zoom="16" data-map-latlng="45.738028, 21.224535" data-map-content="Book Awesome"></div>
-->          </div>
          <div class="contact-cn">
            
            <div class="row">
        <div class="col-md-8">			<?php				if(isset($_POST['submit'])){					$too = 'info@journeybid.com';					$subb = "Someone Ping You"; 					$msgg = "<table style='width:500px'>									<tr>										<th>Name</th>										<td>$_POST[name]</td>									</tr>									<tr>										<th>Email</th>										<td>$_POST[email]</td>									</tr>									<tr>										<th>Subject</th>										<td>$_POST[subject]</td>									</tr>									<tr>										<th>Message</th>										<td>$_POST[message]</td>									</tr>							<table>";					$header = "MIME-Version: 1.0" . "\r\n";					$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";					$header .= 'From: <info@journeybid.com>' . "\r\n";					$i = mail($too,$subb,$msgg,$header);					if($i){						echo "<script>Thanks for Contacting Us</script>";					}				}			?>
            <div class="well well-sm">
                <form method="post">		
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs" name="submit">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Location</legend>
            <address>
            
            Unit 3 Moycullen Business Park<br />
Galway, Ireland
           <br /><br />
                <abbr title="Phone">
                    <strong>Phone:</strong></abbr><br />
                (+353) 91 556 608
            </address>
            <address>
                <strong>Email</strong><br>
                <a href="mailto:info@journeybid.com">info@journeybid.com</a>
            </address>
            </form>
        </div>
    </div>
            
            <!--<div class="form-contact">
              <form id="contact-form" action="#" method="post">
                <div class="form-field">
                  <label for="name">First Name <sup>*</sup></label>
                  <input type="text" name="name" id="name" class="field-input">
                </div>
                <div class="form-field">
                  <label for="email">Last Name <sup>*</sup></label>
                  <input type="text" name="email" id="email" class="field-input">
                </div>
                <div class="form-field">
                  <label for="email">Email <sup>*</sup></label>
                  <input type="text" name="email" id="email" class="field-input">
                </div>
                <div class="form-field">
                  <label for="email">Telephone <sup>*</sup></label>
                  <input type="text" name="email" id="email" class="field-input">
                </div>
                <div class="form-field">
                  <label for="email">Subject <sup>*</sup></label>
                  <input type="text" name="email" id="email" class="field-input">
                </div>
                <div class="form-field form-field-area">
                  <label for="message">Message <sup>*</sup></label>
                  <textarea name="message" id="message" cols="30" rows="10" class="field-input"></textarea>
                </div>
                <div class="form-field text-center">
                  <button type="submit" id="submit-contact" class="awe-btn awe-btn-2 arrow-right arrow-white awe-btn-lager">Submit</button>
                </div>
                <div id="contact-content"></div>
              </form>
            </div>-->
            
            
            
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>