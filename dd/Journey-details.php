<?php include('header.php'); ?>

	<?php
		//print_r($_SESSION['values']);
		//echo "<pre>";
	 	$udi = json_decode($_SESSION['values']['meta_value'],true);
		//print_r($udi);
		//echo $udi['profile_image'];
		$journey_id=$_GET['id'];
		$selectquery="SELECT * from post_journey join usermeta on(post_journey.user_id = usermeta.user_id) where post_journey.id='$journey_id'";
		$rslt=mysql_query($selectquery) or die("Error in querying".mysql_error());
		$row=mysql_fetch_array($rslt);
		//print_r($row);
		$decoded_val = json_decode($row['meta_value']);
		//print_r($decoded_val);
		?>
		
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow"> 
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Journey Details</li>
          </ul>
        </section>
        <br>
        <div class="row">
          <div class="col-md-12"> <br>
            <section class="user-profile">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Profile </h3>
                </div>
                <div class="panel-body">
                  <div class="col-md-2 text-center"> <?php if($udi['profile_image'] == NULL){ ?>
					  <img src="images/avatar.jpg" class="img-circle">
					  <?php  } else { ?>
							<img src="Profile_Picture/<?php echo $udi['profile_image'];?>" class="img-circle">
					  <?php } ?>
					  
					  <span class="label label-primary center-block" style="margin-top:10px;">
                    <h5><strong><?php echo $decoded_val->username;?></strong></h5>
                    </span></div>
                  <div class="col-md-6">
                    <table class="table table-striped">
                      <span class="label label-info">Open for bidding</span>
                      <thead>
                        <tr>
                          <th><strong>Vehicle Types</strong></th>
                          <th><?php echo $row['vehicle']; ?></th>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <td><strong>Created</strong></td>
                          <td><?php echo $row['created']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Address</strong></td>
                          <td><?php echo $row['froms']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Address to</strong> </td>
                          <td><?php echo $row['tos']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Date of journey</strong> </td>
                          <td><?php echo $row['date']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Date of returns</strong> </td>
                          <td>2015-07-31 22:30:00</td>
                        </tr>
                        <tr>
                          <td><strong>Passengers</strong> </td>
                          <td><?php echo $row['passenger']; ?></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <div class="col-md-4"> <img alt="" src="images/deal/img-7.jpg"></a></div>
                  <div class="clearfix"> </div>
                  <!--<div class="row review-item">
                    <div class="col-xs-12">
                      <div class="review-header"><!--<span class="date">3/2/ 2015</span>-->
                        <!--<h4>Review <span class="star"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i></span></h4>
                        <a class="btn" href="#">See all reviews</a><br/><br/>
                        <!--<a class="btn" href="place-bid.php?id=<?php// echo $row[id];?>&created=<?php// echo $row['created'];?>&vehicle_type=<?php //echo $row['vehicle']; ?>&from=<?php //echo $row['froms'];?>&to=<?php// echo $row['tos']; ?>&date=<?php //echo $row['date']; ?>&passenger_num=<?php// echo $row['passenger']; ?>&userid=<?php //echo $row['user_id']; ?>&desc=<?php //echo $row['descripation']; ?>">Click To Bid</a>-->
						<!--</div>
                    </div>
                  </div>-->
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Description </h3>
                </div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <p><?php echo $row['descripation']; ?></p>
                  </div>
                  <div class="clearfix" style="height:60px;"> </div>
                  <hr>
                  <!--<ul class="tabs-head nav-tabs-one">
                    <li class="active"><a data-toggle="tab" href="#section1">Bids(1)</a></li>
                    <li><a data-toggle="tab" href="#section2">Messages</a></li>
                    <li><a data-toggle="tab" href="#section3">Escrow</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="section1" class="tab-pane fade in active">
                      <p>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>Transport Provider</th>
                            <th>Bid</th>
                            <th>Time of Bid</th>
                            <th>Pay via Escrow</th>
                            <th>Pre Pay amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"></th>
                            <td>BusManCanJG</td>
                            <td>€75.00</td>
                            <td>July 28</td>
                            <td>E</td>
                            <td>10%</td>
                          </tr>
                        </tbody>
                      </table>
                      </p>
                    </div>
                    <div id="section2" class="tab-pane fade">
                      <p>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>Journe</th>
                            <th>Total (€) </th>
                            <th>Paid (€) </th>
                            <th>Transport Provider </th>
                            <th>Date </th>
                            <th>Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                          </tr>
                        </tbody>
                      </table>
                      </p>
                    </div>
                    <div id="section3" class="tab-pane fade">
                      <p>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>Transport Provider </th>
                            <th>Journey</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                          </tr>
                        </tbody>
                      </table>
                      </p>
                    </div>
                  </div>---->
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php include('footer.php'); ?>