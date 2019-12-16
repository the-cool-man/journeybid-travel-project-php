<?php
	session_start();
	$conn = mysql_connect('localhost','avclub_journey','admin@123')or die('error');
	mysql_select_db('avclub_db_travel');

?>