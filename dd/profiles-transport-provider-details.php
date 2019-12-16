<?php 
error_reporting(E_ALL);
include 'header.php';
?>
<?php
	//$trans_name = $_GET['tn'];
	//$trns_array = unserialize($trans_name);
	
	//$user_regis_since = $_SESSION['values']['member_since'];
	//$time=strtotime($user_regis_since);
	//$month=date("F",$time);
	//$year=date("Y",$time);
	
	
	$transdetails = get_transpoter($_GET['tn']);
	
	$msd = get_user_member_since_detail($_GET['tn']);
	$ddd = ($msd['member_since']) ;
	//echo $ddd;
	//echo "<pre>";
	$dvals = json_decode($transdetails['meta_value'],true);
	$option1 = $dvals['vehicle_types'][0];
	$option2 = $dvals['vehicle_types'][1];
	$option3 = $dvals['vehicle_types'][2];
	$option4 = $dvals['vehicle_types'][3];
	
	$rval = get_transporter_reviews($_GET['tn']);			
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
	
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix"> 
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li><?php echo $dvals['username']; ?></li>
          </ul>
        </section>
        <br>
        <div class="col-md-12"> <br>
          <section class="user-profile">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4 class="panel-title" style="font-size:20px;"> <a href="#"> <i class="fa fa-star"></i> </a><?php echo $dvals['username']; ?></h4>
            </div>
            <div class="panel-body">
              <div class="col-md-3" style="background:#eee; padding-top:12px;"> <?php if($dvals['profile_image'] == NULL){ ?>
					  <img src="images/avatar.jpg" alt="" class="img-thumbnal center-block">
					  <?php  } else { ?>
							<img src="Profile_Picture/<?php echo $dvals['profile_image'];?>" class="img-thumbnal center-block">
					  <?php } ?>
					  
					  
                <h5 class="text-center"><strong><a href="#" style="font-size:17px;"><?php echo $dvals['username']; ?></a></strong></h5>
                <p class="text-center">Rating:<?php 
							if($rval != 0){
								for($c=0;$c<=$num_of_stars-1;$c++){
									echo " <i class='fa fa-star'></i> ";
								}
							}
							if($rval == 0){
								echo " No Rating";
							}
							
							
						?><!--<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <a href="#">(1 Review) </a>--> </p>
                <p class="text-center"> <img src="images/ie.gif"> <?php echo $dvals['address']; ?> </p>
                <hr>
                <p class="text-center" style="font-size:12px;"> Member Since:<?php echo $ddd;?></p>
                <!--<p class="text-center" style="font-size:12px;"> Last Activity: Feb 05, 2015</p>-->
              </div>
              <div class="col-md-9">
                <ul class="tabs-head nav-tabs-one">
                  <li class="active"><a data-toggle="tab" href="#section1">About</a></li>
                <!--  <li><a data-toggle="tab" href="#section2">Fleet</a></li>-->
                  <li><a data-toggle="tab" href="#section3">Reviews</a></li>
                </ul>
                <div class="tab-content">
                  <div id="section1" class="tab-pane fade in active"><br>
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:17px;">Vehicle Types</h4>
                      </div>
                      <div class="panel-body"> <?php 
						if($option1 != Null) { echo "<span class='label label-primary' style='padding:10px;'> <a href='javascript:void(0)' style='color:#fff;text-decoration:none'> $option1 </a></span>&nbsp;";} 
						if($option2 != Null) { echo "<span class='label label-primary' style='padding:10px;'> <a href='javascript:void(0)' style='color:#fff;text-decoration:none'> $option2 </a></span>&nbsp;";}
						if($option3 != Null) { echo "<span class='label label-primary' style='padding:10px;'> <a href='javascript:void(0)' style='color:#fff;text-decoration:none'> $option3 </a></span>&nbsp;";}
						if($option4 != Null) { echo "<span class='label label-primary' style='padding:10px;'> <a href='javascript:void(0)' style='color:#fff;text-decoration:none'> $option4 </a></span>&nbsp;";}
					  ?></div>
                    </div>
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:17px;">Company Description</h4>
                      </div>
                      <div class="panel-body">
                        <p> <?php echo $dvals['company_description']; ?></p>
                      </div>
                    </div>
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:17px;">Insurance Details</h4>
                      </div>
                      <div class="panel-body">
                        <p> <?php echo $dvals['insurance_details']; ?> </p>
                      </div>
                    </div>
                  </div>
                  <!--<div id="section2" class="tab-pane fade"><br>
                    <div class="media">
                      <div class="media-left"> <a href="#"> <img alt="64x64" data-src="holder.js/64x64" class="media-object img-thumbnail" src="images/nissan.jpg" data-holder-rendered="true"> </a> </div>
                      <div class="media-body">
                        <h4 class="media-heading"> Nisan Micra </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
                    </div>
                    <hr>
                    <div class="media">
                      <div class="media-left"> <a href="#"> <img alt="64x64" data-src="holder.js/64x64" class="media-object img-thumbnail" src="images/nissan.jpg" data-holder-rendered="true"> </a> </div>
                      <div class="media-body">
                        <h4 class="media-heading"> Volvo XXX </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac . </div>
                    </div>
                  </div>-->
                  <div id="section3" class="tab-pane fade">
                    <p>
                    <div id="section1" class="tab-pane fade in active"><br>
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h4 class="panel-title" style="font-size:17px;">As Transport Provider</h4>
                        </div>
                        <div class="panel-body">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Traveller Name</th>
                                <th>Rating </th>
                               <!-- <th>Count</th>-->
                              </tr>
                            </thead>
                            <tbody>														<?php							if( count($rval) == 0 ){																echo "<tr>";																	echo "<td>";																			echo '<b>No Rating</b>';																			echo "</td>";																	echo "</tr>";																}														for($m=0;$m<count($rval);$m++){								$number_of_stars =$rating_array[$m];																	$travellerName = get_username($rval[$m]['trav_id']);																$travellerN = json_decode($travellerName['meta_value']);														?>															 <tr>									<td scope="row"><?php echo $travellerN->username; ?></td>									<td>									<?php 																		if($number_of_stars == 1){echo '<i class="fa fa-star"></i>';} 																		if($number_of_stars == 2){echo '<i class="fa fa-star"></i><i class="fa fa-star"></i>';}									if($number_of_stars == 3){echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}									if($number_of_stars == 4){echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}									if($number_of_stars == 5){echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}																		?>																		</td>									                              </tr>							  							<?php	}  ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Journey</th>
                            <th>Bid </th>
                            <th>Rater</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"><a href="#"> dublin to cork 5 people </a></th>
                            <td>$200</td>
                            <td>Admin</td>
                            <td> Jul 16, 2015 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </p>
                </div>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
        </div>
        </section>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>