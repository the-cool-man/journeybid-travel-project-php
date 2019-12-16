<?php include 'header.php'; ?>
<?php 
    $transid = $_GET['trans_ids'];
    $journid = $_GET['journeys_ids'];
	if(isset($_POST['review_submit_btn'])){
		$rdesc = $_POST['review_comment'];
		$rrating = $_POST['optionsRadios'];
		$travid	= $_SESSION['values']['id'];
	
	$query = "INSERT into reviews values('$id','$travid','$transid','$journid','$rdesc','$rrating')";
	$execute = mysql_query($query);  
	if($execute) {
		$uquery = "UPDATE post_journey set journey_status=1 where id='$journid'";
		$uexecute = mysql_query($uquery);
		if($uexecute){
			$jcomplete_msg = "<h5 style='color : green'> Review successfully submitted . </h5>";
			?>
			<script type="text/javascript">
					var redirect3 = function(){
						document.location = 'index.php';
						};
					setTimeout(redirect3, 4000);
			</script>
			<?php
		}
	}
	}
?>
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
				<?php echo $jcomplete_msg; ?>
                  <div class="col-md-12">
            <div class="row" id="post-review-box">
                <div class="col-md-12">
                    <form method="post">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="review_comment" placeholder="Enter your review here..." rows="5" required="required"></textarea>
                        <div class="radio">
							<label>
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
							<i class="fa fa-star"></i>	
							</label>
						</div>
                        <div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="2">
									<i class="fa fa-star"></i>   <i class="fa fa-star"></i>
							</label>
						</div>
                        <div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="3">
								<i class="fa fa-star"></i>   <i class="fa fa-star"></i>   <i class="fa fa-star"></i>
							</label>
						</div>
                        <div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="4">
								<i class="fa fa-star"></i>   <i class="fa fa-star"></i>   <i class="fa fa-star"></i>   <i class="fa fa-star"></i>
							</label>
						</div>
                        <div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="5" checked>
								<i class="fa fa-star"></i>   <i class="fa fa-star"></i>   <i class="fa fa-star"></i>   <i class="fa fa-star"></i>   <i class="fa fa-star"></i>
							</label>
						</div>
                        <button type="submit" class="btn btn-success btn-green pull-right" id="open-review-box" name="review_submit_btn">Leave a Review</button>
                    </form>
                </div>
            </div>
            </div>
            </div>
            </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php include 'footer.php' ;?>