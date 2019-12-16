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
				<i class="icon-angle-right"></i>
				<li><a href="#">Edit</a></li>
			</ul>			
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-content">
						<?php if(isset($_POST['page_update_submit'])){
							$page_id=$_GET['edit'];
							$title=$_POST['pagetitle'];
							//$content=$_POST['content'];
							$description=trim($_POST['content']);
							
							//$slug = str_replace(' ','-', strtolower($title));
							
							$description=htmlspecialchars($_POST['content'],ENT_QUOTES);
							
							$update="update page set page_name='$title',page_content='$description' where id='$page_id'";
							$query=mysql_query($update) or die("Error in updating content ".mysql_error());
						}?>
						<?php 
						$page_id=$_GET['edit'];
						$query="SELECT * from page where id='$page_id'";
						$execute=mysql_query($query) or die(mysql_error());
						$data=mysql_fetch_array($execute);
						?>
						<form name="pages-form" method="post">
							<span class="editpagetitle">Title</span><br/><input type="text" class="page-name" name="pagetitle" id="addctopge" value="<?php echo $data['page_name']; ?>"/><br/>
							<span class="editpagetitle">Description</span><br/><textarea name="content" id="abc" style="width:50%; height:250px;"><?php echo htmlspecialchars_decode($data['page_content'],ENT_QUOTES); ?></textarea><br/> 
							<input type="submit" name="page_update_submit" value="UPDATE" class="btn btn-primary pagesub"/>
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