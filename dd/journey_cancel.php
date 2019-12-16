<?php include 'header.php'; ?>
<?php 
    $journid = $_GET['journeys_ids'];
	if(isset($_POST['cancel_submit_btn'])){
		$rdesc = $_POST['cancel_comment'];
		$travid	= $_SESSION['values']['id'];
	$query = "INSERT into cancel_journey values('$id','$travid','$journid','$rdesc')";
	$execute = mysql_query($query);  
	if($execute) {
		$uquery = "UPDATE post_journey set cancel_status=1 where id='$journid'";
		$uexecute = mysql_query($uquery);
		if($uexecute){
			$jcancel_msg = "<h5 style='color : green'> Journey successfully cancelled . </h5>";
		?>
		<script type="text/javascript">
			var redirect4 = function(){
				document.location = 'index.php';
				};
				setTimeout(redirect4, 4000);
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
            <li> Cancel Journey </li>
          </ul>
        </section>
        <br>
        <div class="row">
          <div class="col-md-12"> <br>
            <section class="user-profile">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Cancel Journey </h3>
                </div>
                <div class="panel-body">

                  <div class="col-md-12">
				  <?php echo $jcancel_msg; ?>
            <div class="row" id="post-review-box">
                <div class="col-md-12">
                    <form method="post">
                        <textarea class="form-control animated" cols="50" id="new-review" name="cancel_comment" placeholder="Reason to cancel Journey..." rows="8" autofocus="true" required></textarea><br/>
						<button type="submit" class="btn btn-success btn-green pull-right" id="open-review-box" name="cancel_submit_btn"> Cancel Journey </button>
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