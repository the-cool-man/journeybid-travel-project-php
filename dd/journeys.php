<?php include('header.php'); ?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Traveller Control Panel</li>
          </ul>
        </section>
        <br>
        <div class="row">
          <div class="col-md-9 col-md-push-3">
            <section class="hotel-list">
              <div class="hotel-list-cn clearfix">
			  <?php 
				$select = "select * from post_journey where user_id = '".$_SESSION['values']['id']."'";
				//print_R();
				$sel = mysql_query($select);
				$a = mysql_num_rows($sel);
				while( $result = mysql_fetch_assoc($sel)){
				//print_r($result);
				//foreach($result as $r){
					//print_r($r);
			  ?>
                <div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="hotel-detail.html"><img alt="" src="images/deal/img-7.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="hotel-detail.html"><?php echo $result['descripation']; ?></a></div>
                    <div class="hotel-star-address"> <!--<span class="rating"><img src="images/avatar.jpg"></span>-->
                      <address class="hotel-address">
                      Date: <?php echo $result['date']; ?>
                      </address><br/>
					  <address class="hotel-address">
                      From: <?php echo $result['froms']; ?>
                      </address><br/>
					  <address class="hotel-address">
                      To: <?php echo $result['tos']; ?>
                      </address>
                    </div>
                    <p style="padding-top:15px;"><?php echo $result['facilities']; ?></p>
                    <a class="btn btn-primary" href="#" role="button" style="border-radius:7padding:0px;">Place Bid</a>
                  </div>
                </div>
				<?php } ?>
              </div>
            </section>
          </div>
          <div class="col-md-3 col-md-pull-9">
            <div class="sidebar-cn">
              <div class="search-result">
                <p>We found<br>
                  <ins><?php echo $a; ?></ins> <span>journeys availability</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>