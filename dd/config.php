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
		$conn = mysql_connect('localhost','journeybid_main','journeybid@123')or die('error'.mysql_error());
		mysql_select_db('journeybid_main');
		
		//$base_url="http://journeybid.com/hybridauth/index.php";
	}
	
	$config =array(
		"base_url" => "http://journeybid.com/hybridauth/index.php", 
		"providers" => array (
			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1083381226750-t15cc3s3ao5k62j6l9o0b82ni15itcd9.apps.googleusercontent.com", "secret" => "6UR1825uTVuRk1sOZfUXMi1d" , "redirect URL"=>'http://journeybid.com/hybridauth/index.php?hauth.done=Google'), 
			),
			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "937023149703157", "secret" => "cda88d2dd750106fb81236296824a97a" ), 
			),
			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "76eRG5VT5fbZzVQEF6uwgQcKw", "secret" =>"XKDjbu4aPGS0L0ok6AH1prrvXRH0pKWwYlEvVb4P9nboUTwsZq" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => true,
		"debug_file" => "error_log",
	);
?>