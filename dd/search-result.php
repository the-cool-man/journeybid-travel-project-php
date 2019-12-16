<?php include('header.php'); ?>
<?php 
					if(isset($_POST['submit'])){
					$transporter_name = $_POST['from'];
					$options = $_POST['select_trav_trans'];
						if($options == 'providers'){
							echo "<script type='text/javascript'> window.location='providers-list-new.php?name=$transporter_name' </script>";
						}
					}
?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix"> 
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Search Result</li>
          </ul>
        </section>
        <br>
        <div class="row">
          <div class="col-md-9 col-md-push-3">
            <section class="hotel-list">
              <div class="hotel-list-cn clearfix">
			  <?php 
				if(isset($_POST['submit'])){
					$from = $_POST['from'];
					$type = $_POST['type'];
				$select = "select * from post_journey join usermeta on(post_journey.user_id = usermeta.user_id) where post_journey.froms LIKE '%$from%' AND post_journey.journey_status=0 && post_journey.cancel_status=0";
				$sel = mysql_query($select);
				$a = mysql_num_rows($sel);
				while( $result = mysql_fetch_assoc($sel)){
					$decoded_values = json_decode($result['meta_value']);
				
			  ?>
                <div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="Journey-details.php?id=<?php echo $result['id']?>"><img alt="" src="images/deal/img-7.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="Journey-details.php?id=<?php echo $result['id']?>"> <?php echo $decoded_values->username;?> </a></div>
                   <div class="hotel-star-address"> <span class="rating"><?php if($decoded_values->profile_image == NULL){?> <img src="images/avatar.jpg" width="130px" height="130px"><?php } else { ?> <img src="Profile_Picture/<?php echo $decoded_values->profile_image;?>" width="130px" height="130px" ><?php } ?>
				   </span>
                      <address class="hotel-address">
                      Date: <?php echo date("jS M Y", strtotime($result['date']));?>
                      </address><br/>
					  <address class="hotel-address">
						<b>From : </b> <?php echo $result['froms']; ?> <br/><b>To :</b> <?php echo $result['tos']; ?>
                      </address><br/>
					  <address class="hotel-address">
						<b>Travel Description : </b> <?php echo $result['descripation']; ?>
                      </address>
                    </div>
                    <p style="padding-top:15px;"><?php echo $result['facilities']; ?>...</p>
					<?php if($_SESSION['values']['type'] != 'traveller') {  ?>
                    <a class="btn btn-primary" href="place-bid.php?id=<?php echo $result['id'];?>&created=<?php echo $result['created'];?>&vehicle_type=<?php echo $result['vehicle']; ?>&from=<?php echo $result['froms'];?>&to=<?php echo $result['tos']; ?>&date=<?php echo $result['date']; ?>&passenger_num=<?php echo $result['passenger']; ?>&userid=<?php echo $result['user_id']; ?>&desc=<?php echo $result['descripation']; ?>" role="button" style="border-radius:7padding:0px;px;">Place Bid</a>
					<?php } ?>
					</div>
                </div>
				<?php } 	} ?>
                <!--<div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="hotel-detail.html"><img alt="" src="images/deal/img-8.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="hotel-detail.html">Cricket Club Trip</a></div>
                    <div class="hotel-star-address"> <span class="rating"><img src="images/avatar.jpg"></span>
                      <address class="hotel-address">
                      Posted : 1 week, 1 day ago
                      </address>
                    </div>
                    <p style="padding-top:15px;">My stay at cumberland hotel was amazing, loved the location, was close to all the major attractions allthough there rooms seemed...</p>
                  </div>
                </div>
                <div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="hotel-detail.html"><img alt="" src="images/deal/img-9.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="hotel-detail.html">Lads Weekend in Galway</a></div>
                    <div class="hotel-star-address"> <span class="rating"><img src="images/avatar.jpg"></span>
                      <address class="hotel-address">
                      Posted : 1 week, 1 day ago
                      </address>
                    </div>
                    <p style="padding-top:15px;">My stay at cumberland hotel was amazing, loved the location, was close to all the major attractions allthough there rooms seemed...</p>
                  </div>
                </div>
                <div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="hotel-detail.html"><img alt="" src="images/deal/img-10.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="hotel-detail.html">Dublin to Galway 10 People</a></div>
                    <div class="hotel-star-address"> <span class="rating"><img src="images/avatar.jpg"></span>
                      <address class="hotel-address">
                      Posted : 1 week, 1 day ago
                      </address>
                    </div>
                    <p style="padding-top:15px;">My stay at cumberland hotel was amazing, loved the location, was close to all the major attractions allthough there rooms seemed...</p>
                  </div>
                </div>
                <div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="hotel-detail.html"><img alt="" src="images/deal/img-11.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="hotel-detail.html">Dublin to Galway 10 People</a></div>
                    <div class="hotel-star-address"> <span class="rating"><img src="images/avatar.jpg"></span>
                      <address class="hotel-address">
                      Posted : 1 week, 1 day ago
                      </address>
                    </div>
                    <p style="padding-top:15px;">My stay at cumberland hotel was amazing, loved the location, was close to all the major attractions allthough there rooms seemed...</p>
                  </div>
                </div>
                <div class="hotel-list-item">
                  <figure class="hotel-img float-left"><a title="" href="hotel-detail.html"><img alt="" src="images/deal/img-12.jpg"></a></figure>
                  <div class="hotel-text">
                    <div class="hotel-name"><a title="" href="hotel-detail.html">Melia White House Hotel</a></div>
                    <div class="hotel-star-address"> <span class="rating"><img src="images/avatar.jpg"></span>
                      <address class="hotel-address">
                      Posted : 1 week, 1 day ago
                      </address>
                    </div>
                    <p style="padding-top:15px;">My stay at cumberland hotel was amazing, loved the location, was close to all the major attractions allthough there rooms seemed...</p>
                  </div>
                </div>-->
              </div>
              <!--<div class="page-navigation-cn">
                <ul class="page-navigation">
                  <li class="current"><a title="" href="#">1</a></li>
                  <li><a title="" href="#">2</a></li>
                  <li><a title="" href="#">3</a></li>
                  <li><a title="" href="#">4</a></li>
                  <li><a title="" href="#">5</a></li>
                  <li><a title="" href="#">...</a></li>
                  <li class="last"><a title="" href="#">Last</a></li>
                </ul>
              </div>-->
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