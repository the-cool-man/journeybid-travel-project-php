<?php include('function.php'); ?>
<?php echo chats($_GET['id']); 
unset($_SESSION['group_id']);
//echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$id = explode('=',$actual_link);
//$id1 = explode('&',$id[1]);
//print_r($id1);
//print_r($id[2]);
?>
