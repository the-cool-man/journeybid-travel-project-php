<?php include('header.php'); ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>

	<?php if(isset($_POST['sendmessage'])){
		chat_send_message($_GET['sender_id'],$_SESSION['values']['id'],$_POST['chat_message']);
	}
	if($_GET['stat']){
		update_msgs_status($_GET['id'],$_GET['sender_id']);
	};
	?>

	<div class="container messaging">
		
		<div class="col-sm-2">
			<!--<a href="trav_trans_interaction.php" class="btn btn-primary"> New Message </a><br/><br/>-->
			<?php last_interaction($_SESSION['values']['id']);?>
		</div>
		<?php $id = $_GET['id']; ?>
		<?php if($_GET['id']){ ?>
		  <div class="col-md-10"> <br>

            <section class="user-profile">

              <div class="panel panel-info">

                <div class="panel-heading">

                  <h3 class="panel-title"> Chat </h3>

                </div>

                <div class="panel-body">
				
				<form method="post">
                  <div class="message-wrap col-md-12">
					
                    <div class="msg-wrap">
						<?php echo chats($_GET['id']); ?>
                    </div>

                    <div class="send-wrap ">

                      <textarea class="form-control send-message" rows="3" placeholder="Write a reply..." name="chat_message"></textarea>

                    </div>

                    <div class="btn-panel"><button type="submit" class="col-lg-4 text-right btn btn-primary   send-message-btn pull-right" name="sendmessage"><i class="fa fa-plus"></i> Send Message </button></div>

                  </div>
				</form>
                </div>

              </div>

            </section>

          </div>
		<?php } ?>
	<div class="col-sm-12"> <?php echo $_SESSION['nmf']; ?> </div>		
	<?php unset($_SESSION['nmf']); ?>
	</div>	
 <?php if(isset($_SESSION['group_id'])){ $x = $_SESSION['group_id']; } else { $x = $_GET['id']; } ?>
<script>
$(document).ready(function(){
			setInterval(function(){
				$.ajax({    //create an ajax request to load_page.php
					type: "GET",
					url: "chat.php?id=<?php echo $x; ?>&sender_id=<?php echo $_GET['sender_id']; ?>",             
					dataType: "html",   //expect html to be returned                
					success: function(response){                    
						$(".msg-wrap").html(response); 
						//alert(response);
					}

				});
		}, 1000);
})
</script>
<?php include('footer.php'); ?>
	