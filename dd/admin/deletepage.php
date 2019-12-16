<?php
include('../config.php');
$page_id=$_GET['edit'];
$query="delete from page where id='$page_id'";
$execute=mysql_query($query) or die(mysql_error());
if($execute){ header("location:http://avclub.in/travel/admin/viewcontent.php");}
?>