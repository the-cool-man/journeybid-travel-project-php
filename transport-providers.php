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
              <div class="confidence">
                <!--            <h2 style="color:#233a7c;">Traveller</h2>
            <div class="col-md-4 text-center"> <img src="images/jbi1.png">
              <h5>Post your trip needs</h5>
            </div>
            <div class="col-md-4 text-center"><img src="images/jbi2.png" >
              <h5>Travel companies make their bid</h5>
            </div>
            <div class="col-md-4 text-center"> <img src="images/jbi3.png">
              <h5>Select and go with the best</h5>
            </div>-->
                <div class="clearfix"> </div>
                <h2 style="color:#233a7c;text-align:center;">Transport Provider</h2>
                <div class="col-md-4 text-center"> <img src="images/jbi4.png">
                  <h5>Join JourneyBid completely free to start receiving business leads.</h5>
                </div>
                <div class="col-md-4 text-center"><img src="images/jbi5.png" >
                  <h5>Review live JourneyBid trips on offer and make a bid for any that you like.</h5>
                </div>
                <div class="col-md-4 text-center"> <img src="images/jbi6.png">
                  <h5>When you win a booking you'll be notified immediately. With our 10% rate due for facilitating it.</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"> </div>
          <div class="cruise-list-cn tour-list-cn">
            <h2 style="color:#233a7c; text-align:center; padding-bottom:30px; padding-top:30px;">JourneyBid Online</h2>
            <?php 
				$start=0;
				$limit=10;
				if(isset($_GET['id']))
					{
						$id=$_GET['id'];
						$start=($id-1)*$limit;
					}
				$select = "select * from post_journey join usermeta on(post_journey.user_id = usermeta.user_id) where post_journey.journey_status=0 && post_journey.cancel_status=0 ORDER BY post_journey.id DESC limit $start,$limit";
				$sel = mysql_query($select);
				$a = mysql_num_rows($sel);
				while( $result = mysql_fetch_assoc($sel)){
					//echo "<pre>";
					//print_r($result);
					$decoded_values = json_decode($result['meta_value']);
				
			  ?>
            <div class="cruise-item hvr-fade col-md-12">
              <figure class="cruise-img"><a href="Journey-details.php?id=<?php echo $result['id']?>"><img src="images/img-6.jpg" alt="" class="thumbnail"></a></figure>
              <div class="cruise-text">
                <div class="cruise-name"><a href="Journey-details.php?id=<?php echo $result['id']?>" style="color:#233a7c;"> <?php echo $result['froms']; ?> to <?php echo $result['tos']; ?> <?php echo $result['passenger']; ?> people</a></div>
                
                
                <p style="padding-top:10px;color:#747474;"><?php echo $result['descripation']; ?></p>
                
                <small style="color:#747474;"> <i class="fa fa-calendar" style="color:#747474;"></i> Journey Created : <?php echo $result['created'];?></small> <small style="color:#747474;" class="pull-right"> <i class="fa fa-calendar" style="color:#747474;"></i> Journey Date : <?php echo $result['date'];?></small>
                
                
                
                <div class="price-box"><span class="price"> <ins>&#8364;<?php echo $result['price']; ?></ins></span> <span class="price night"><a class="btn btn-primary" href="place-bid.php?id=<?php echo $result['id'];?>&created=<?php echo $result['created'];?>&vehicle_type=<?php echo $result['vehicle']; ?>&from=<?php echo $result['froms'];?>&to=<?php echo $result['tos']; ?>&date=<?php echo $result['date']; ?>&passenger_num=<?php echo $result['passenger']; ?>&userid=<?php echo $result['user_id']; ?>&desc=<?php echo $result['descripation']; ?>" role="button" style="border-radius:7padding:0px;px;" <?php if($usertype == 'traveller'){ ?> disabled="disabled"<?php } ?>>Place Bid</a></span></div>
              </div>
            </div>
            <hr>
            <?php } 
				
				
				
				
				
				$rows=mysql_num_rows(mysql_query("select * from post_journey"));
				$total=ceil($rows/$limit);

				if($id>1)
					{
						echo "<a href='?id=".($id-1)."' class='btn btn-primary'>PREVIOUS</a>";
					}
					if($id!=$total)
					{
						echo "<a href='?id=".($id+1)."' class='btn btn-primary'>NEXT</a>";
					}

//					echo "<ul class='page-navigation'>";
//							for($i=1;$i<=$total;$i++)
//							{
//								if($i==$id) { echo "<li class='current'>".$i."</li>"; }
//								
//								else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
//							}
//					echo "</ul>";
				
				?>
          </div>
          <!--      
          <h4 class="text-center">Any other questions? Please do get in touch, we'd love to hear from you.</h4>
          <h5 class="text-center" style="color:#233a7c;"> info@journeybid.com </h5>-->
        </div>
      </section>
      <section class="follow-about">
        <div class="follow-group"> <a href="https://www.facebook.com/journeybid" title="" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/JourneyBid" title="" target="_blank"><i class="fa fa-twitter"></i></a> <a href="#" title=""><i class="fa fa-linkedin"></i></a> </div>
      </section>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
