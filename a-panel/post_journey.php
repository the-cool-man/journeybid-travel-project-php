<?php include('header.php'); ?><?php	if(isset($_GET['del'])){		$del = "delete from post_journey where id = '$_GET[del]'";		$query = mysql_query($del);	}?>
<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Journey</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content" style="overflow-y:scroll;">
						   <?php all_journey(); ?>        
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<?php include('footer.php'); ?>