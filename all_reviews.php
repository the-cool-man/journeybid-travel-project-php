<?php include 'header.php'; ?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>User Review</li>
          </ul>
        </section>
        <br>
        <div class="row">
          <div class="col-md-12"> <br>
            <section class="user-profile">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Review </h3>
                </div>
                <div class="panel-body">
                  <div class="col-md-12">
					<div class="user-review">
				<?php 
					$query = "SELECT * from reviews where trans_id='$_GET[review]'"; 
					$execute = mysql_query($query);
					while( $vals = mysql_fetch_assoc($execute) ){
						$query1 = "SELECT * from post_journey where id='$vals[jour_id]'";
						$execute1 = mysql_query($query1);
						while( $vals1 = mysql_fetch_assoc($execute1) ){
							
							$query2 = "SELECT * from usermeta where usermeta.user_id=$vals[trans_id]";
								$execute2 = mysql_query($query2);
								$vals2 = mysql_fetch_assoc($execute2);
								$profile_pic = json_decode($vals2['meta_value'],true);

								?>
                <div class="row review-item">
                  <div class="col-xs-12">
                    <div class="review-header"><span class="date"> <?php echo $vals1['date']; ?> </span>
                      <h4><?php echo $vals1['froms']; ?> to <?php echo $vals1['tos']; ?> <?php echo $vals1['passenger'];?> people <span class="label label-primary" style="background:#f86523; color:#fff;"><?php echo $vals['review_rating']; ?>.0</span> 
                      <span class="star" style="color:#f86523; font-size:18px;">
					<?php 
						echo $opt = get_total_reviews_rating($vals['review_rating'])
					?>
                    
                      </span></h4>
                      </div>
                  </div>
                  <div class="col-xs-3 review-number"><?php if($profile_pic['profile_image'] == NULL){ ?>
				  <img src="images/avatar.jpg" class="img-circle"><?php } else { ?><img src="Profile_Picture/<?php echo $profile_pic['profile_image']; ?>"><?php }?></div>
                  <div class="col-xs-9 review-text">
                    <p> <?php echo $vals['review_desc']; ?> </p>
                  </div>
                </div>
							<?php 	} } ?>
<!--
                <div class="row review-item">

                  <div class="col-xs-12">

                    <div class="review-header"><span class="date">3/2/ 2016</span>

                      <h4>Galway to mayo 4 people <span class="label label-primary" style="background:#f86523; color:#fff;">5.0</span> 

                      <span class="star" style="color:#f86523; font-size:18px;">

                     <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                      

                      </span></h4>

              

                      

                      </div>

                  </div>

                  <div class="col-xs-3 review-number"><img src="images/review.jpg" class="img-circle"></div>

                  <div class="col-xs-9 review-text">



                    <p>Our stay was pleasant and joyful. We stayed in an apartment meant for 3 adults. First and foremost, close proximity to tube station was the reason of choosing this hotel. The cleaning services were fantastic. The support services were prompt...</p>

                  </div>

                </div>

                <div class="row review-item">

                  <div class="col-xs-12">

                    <div class="review-header"><span class="date">3/2/ 2016</span>

                      <h4>Galway to mayo 4 people <span class="label label-primary" style="background:#f86523; color:#fff;">5.0</span> 

                      <span class="star" style="color:#f86523; font-size:18px;">

                     <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                      

                      </span></h4>

              

                      

                      </div>

                  </div>

                  <div class="col-xs-3 review-number"><img src="images/review.jpg" class="img-circle"></div>

                  <div class="col-xs-9 review-text">



                    <p>Our stay was pleasant and joyful. We stayed in an apartment meant for 3 adults. First and foremost, close proximity to tube station was the reason of choosing this hotel. The cleaning services were fantastic. The support services were prompt...</p>

                  </div>

                </div>

                <div class="row review-item">

                  <div class="col-xs-12">

                    <div class="review-header"><span class="date">3/2/ 2016</span>

                      <h4>Galway to mayo 4 people <span class="label label-primary" style="background:#f86523; color:#fff;">5.0</span> 

                      <span class="star" style="color:#f86523; font-size:18px;">

                     <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                      

                      </span></h4>

              

                      

                      </div>

                  </div>

                  <div class="col-xs-3 review-number"><img src="images/review.jpg" class="img-circle"></div>

                  <div class="col-xs-9 review-text">



                    <p>Our stay was pleasant and joyful. We stayed in an apartment meant for 3 adults. First and foremost, close proximity to tube station was the reason of choosing this hotel. The cleaning services were fantastic. The support services were prompt...</p>

                  </div>

                </div>-->

              </div>

            </div>

            <br><br>

          <!--  <div class="page-navigation-cn text-center" style="padding-bottom:30px;">

                <ul class="page-navigation">

                  <li class="current"><a href="#" title="">1</a></li>

                  <li><a href="#" title="">2</a></li>

                  <li><a href="#" title="">3</a></li>

                  <li><a href="#" title="">4</a></li>

                  <li><a href="#" title="">5</a></li>

                  <li  class="current"><a href="#" title="">Last</a></li>

                </ul>

              </div>-->

                </div>

              </div>

            </section>

          </div>

        </div>

      </div>

    </div>

  </div>

 <?php include 'footer.php'; ?>