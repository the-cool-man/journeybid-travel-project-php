<?php include('header.php'); ?>
  <div class="main">
    <div class="container">
      <div class="main-cn about-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>How it Works - JourneyBid's Simplicity </li>
          </ul>
        </section>
        <section class="about-cn clearfix">
          
          <div class="about-text">
          
      <div class="row cs-sb-cn">
        <div class="col-md-12">
           <?php
            $select="select * from page where slug='how-it-works'";
			$contents=mysql_query($select);
			$con=mysql_fetch_array($contents);				
					
			echo htmlspecialchars_decode($con['page_content'],ENT_QUOTES);
			?>
        </div>
      </div>
      
      
                  <div class="clearfix"> </div>
            <hr>
      
          <h4 class="text-center">Any other questions? Please do get in touch, we'd love to hear from you.</h4>
          <h5 class="text-center" style="color:#233a7c;"> info@journeybid.com </h5>
            
          </div>
        </section>
        
        
        <section class="follow-about">
          <div class="follow-group">
          <a href="https://www.facebook.com/journeybid" title="" target="_blank"><i class="fa fa-facebook"></i></a> 
          <a href="https://twitter.com/JourneyBid" title="" target="_blank"><i class="fa fa-twitter"></i></a> 
          <a href="#" title=""><i class="fa fa-linkedin"></i></a> 

          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>