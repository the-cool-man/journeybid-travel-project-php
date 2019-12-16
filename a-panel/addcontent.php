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
			<?php if(isset($_POST['page-con-submit'])){
								$pagename=$_POST['page-name'];
								$page_data=array('page_name'=>$_POST['pagetitle'],
								'page_content'=>mysql_real_escape_string($_POST['content']));
							}?>	
			<?php echo add_page_content($page_data);?>				
			<?php //echo fetch_page_content($pagename);?>				
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-content">
						<p class="pages-title-admin"><strong>Add content to Page</strong></p>
								<form name="pages-form" method="post">
										<input type="text" class="page-name" name="pagetitle" id="addctopge" placeholder="Enter title"/>
										<textarea name="content" id="abc" style="width:50%;height:250px;" placeholder="Description"></textarea><br/> 
										<input type="submit" name="page-con-submit" value="SUBMIT" class="btn btn-primary pagesub"/>
								</form>
								
					</div>
				</div><!--/span-->
			</div><!--/row-->
<script type="text/javascript">
			tinymce.init({
			selector: "#abc",
				plugins: [
					"advlist autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
</script>
<?php include('footer.php'); ?>