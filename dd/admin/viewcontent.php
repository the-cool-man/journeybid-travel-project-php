<?php include('header.php'); ?>
<!-- start: Content -->
			<div id="content" class="span10">
				<ul class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="index.html">Home</a> 
						<i class="icon-angle-right"></i>
					</li>
					<li><a href="#">Pages</a></li>
				</ul>			
				<div class="row-fluid">		
					<div class="box span12">
						<div class="box-content">
							<p class="pages-title-admin"><strong>View Pages</strong></p>
								<?php echo all_page_content() ?>
						</div>
					</div><!--/span-->
				</div><!--/row-->
<?php include('footer.php'); ?>