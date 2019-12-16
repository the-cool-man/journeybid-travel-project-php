<?php include 'header.php';?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>Transport Provider Profiles</li>
          </ul>
        </section>
        <br>
        <div class="row">
          <div class="col-md-12">
          <section class="hotel-list">
		  <!----Start---->
		  <?php 
				$transporter_name = $_GET['name'];
				$query = "SELECT * from usermeta";
				$rslt = mysql_query($query) or die("Error in selecting transporter".mysql_error());
				
				while($array = mysql_fetch_array($rslt)){
					//echo $array['user_id'];
					$val = json_decode($array['meta_value'],true);
					$name = $val['username'];
					$type = $val['type'];
					static $count = 0;
					if((strtolower($name) == strtolower($transporter_name)) && ($type == 'transport')){  
					$rval = get_transporter_reviews($array['user_id']);
				 	//print_r(count($rval));
					?>
			<div class="col-md-2" style="margin-right:-30px;"> <a title="Profile Image" href="javascript:void(0)">
			<?php if($val['profile_image'] == NULL){ ?>
					  <img src="images/avatar.jpg" alt="" class="img-thumbnal" width="90px" height="90px">
					  <?php  } else { ?>
							<img src="Profile_Picture/<?php echo $val['profile_image'];?>" class="img-thumbnal" width="90px" height="90px">
					  <?php } ?>
			</a>
			</div>
			<div class="col-md-7">
				<ul class="list-unstyled">
					<li style="padding-bottom:5px;"><a href='profiles-transport-provider-details.php?tn=<?php echo $array['user_id'] ;?>'> <strong><?php echo $name; ?></strong> </a></li>
					<li style="padding-bottom:5px;"> <img src="images/ie.gif"> <?php echo $val['address'];?> </li>
					
					<?php
						if($rval != 0){
								for($i=0;$i<count($rval);$i++){
									$rating_array[] = $rval[$i]['review_rating'];
								}
								$sum=0;
								for($j=0;$j<count($rval);$j++){
									$sum += $rating_array[$j];
									
								}
								$num_of_stars = ($sum/count($rval));
								 //$var = explode('.',$num_of_stars);
								$num_of_stars = round($num_of_stars);
								
								 
						}
					?>
					<li style="padding-bottom:5px;"> Feedback 
						<?php 
							if($rval != 0){
								for($c=0;$c<=$num_of_stars-1;$c++){
									echo " <i class='fa fa-star'></i> ";
								}
								/*if($var[1] >= 5){
								 echo " <i class='fa fa-star'></i> ";
								 }
								 if($var[1] < 5){
								 echo " <i class='fa fa-star-half'></i> ";
								 }*/
							}
							if($rval == 0){
								echo " No feedback";
							}
							
							
						?>
					</li>
					<li style="padding-bottom:5px;"> <a href="all_reviews.php?review=<?php echo $array['user_id']; ?>"><?php if($norrows == 0){ echo count($rval)." Reviews ";} else { echo "0 Reviews "; }?> </a></li>
					<!--<li style="padding-bottom:5px;"> 0 Bids in last 20 days </li>-->
				</ul>
            </div>
			<?php 
					$option1 = $val['vehicle_types'][0];
					$option2 = $val['vehicle_types'][1];
					$option3 = $val['vehicle_types'][2];
					$option4 = $val['vehicle_types'][3];
					
					?>
			
            <div class="col-md-3"> 
			<?php 
					if($option1 != Null){
						echo "<a class='btn btn-primary' href='javascript:void(0)' role='button'>$option1</a>&nbsp;";
					}
					if($option2 != Null){
						echo "<a class='btn btn-primary' href='javascript:void(0)' role='button'>$option2</a>&nbsp;";
					}
					if($option3 != Null){
						echo "<a class='btn btn-primary' href='javascript:void(0)' role='button'>$option3</a>&nbsp;";
					}
					if($option4 != Null){
						echo "<a class='btn btn-primary' href='javascript:void(0)' role='button'>$option4</a>&nbsp;";
					}
			?>
			</div>
			<div class="clearfix"> </div>
			<hr>
			<?php 
					$count++;
					}
					
				}
				if($count == 0){
						echo "<h3 style='color:red;text-align:center'> Transporter with this name not found in Database.. ! </h3>";
				}
			?>
            
           </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
