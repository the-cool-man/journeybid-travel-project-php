<?php
	session_start();	
	
	if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '192.168.1.111')
	{
		//error_reporting(E_ALL ^ E_DEPRECATED);
		error_reporting(0);
		$conn = mysql_connect('localhost','root','')or die('error'.mysql_error());
		mysql_select_db('journeybid');
		
		//$base_url="http://localhost/journeybid/hybridauth/index.php";
	}
	else
	{
		error_reporting(0);
		$conn = mysql_connect('localhost','journeybid_','Aj_9121212')or die('error'.mysql_error());
		mysql_select_db('journeybid_main');
		
		//$base_url="http://journeybid.com/hybridauth/index.php";
	}
	
	

?>