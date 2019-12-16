<?php include('header.php'); ?>
<!-- start: Content -->

<?php

	if(isset($_REQUEST['delete']) && $_REQUEST['delete']!='')
	{
		$user= mysql_real_escape_string($_REQUEST['delete']);
		
		mysql_query("delete from usermeta where user_id='".$user."'");
		
		mysql_query("delete from user where id='".$user."'");	
		
		
		echo "<script>alert('User removed successfully'); window.location='user.php'; </script>";
	}

?>

			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Users</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						   <?php user(); ?>        
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<?php include('footer.php'); ?>