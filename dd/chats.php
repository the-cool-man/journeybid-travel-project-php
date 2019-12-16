<?php include('header.php'); ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>
<?php if(isset($_POST['sendmessage'])){
		chat_send_message($_GET['reciever_id'],$_SESSION['values']['id'],$_POST['chat_message']);
	}?>
  <div class="main">

    <div class="container">

      <div class="main-cn element-page bg-white clearfix">

        <section class="breakcrumb-sc">

          <ul class="breadcrumb arrow">

            <li><a href="index.html"><i class="fa fa-home"></i></a></li>

            <li>Chat</li>

          </ul>

        </section>

        <br>

        <div class="row">

          <div class="col-md-12"> <br>

            <section class="user-profile">

              <div class="panel panel-info">

                <div class="panel-heading">

                  <h3 class="panel-title"> Chat </h3>

                </div>

                <div class="panel-body">
				
				<form method="post">
                  <div class="message-wrap col-md-12">
					
                    <div class="msg-wrap">
						<?php 
							$query = "select group_id  from chat_group where (sender = '$_GET[sender_id]' and reciever = '$_GET[reciever_id]') or (reciever = '$_GET[sender_id]' and sender = '$_GET[reciever_id]')";
							$execute = mysql_query($query);
							if(mysql_num_rows($execute) == 1 ){
							$values = mysql_fetch_array($execute);
							$_SESSION['group_id'] = $values['group_id'];
							} 
						?>
						<?php echo chats($_SESSION['group_id']); ?>
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

        </div>

      </div>

    </div>

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
<?php unset($_SESSION['group_id']);  ?>
 <?php include('footer.php'); //unset($_SESSION['group_id']); ?>