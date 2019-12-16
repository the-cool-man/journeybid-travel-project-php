<?php
	include_once 'function.php';
	
	

// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '937023149703157','cda88d2dd750106fb81236296824a97a' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://www.journeybid.com/fb-signin.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=email,first_name,last_name,gender,birthday,bio,location,work' );
  $response = $request->execute();
  // get response
  		$graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	  	$first_name = $graphObject->getProperty('first_name'); // To Get Facebook first name
		$last_name = $graphObject->getProperty('last_name'); // To Get Facebook first name
	    $femail = $graphObject->getProperty("email");   // To Get Facebook email ID
		$gender = $graphObject->getProperty("gender");
		$bio = $graphObject->getProperty("bio");  
	    $location = $graphObject->getProperty("location");
	    $work = $graphObject->getProperty("work");
		$fb_birthday = $graphObject->getProperty("birthday");
		
		$org=explode('/',$fb_birthday);
		$month=$org[0];
		$day=$org[1];
		$year=$org[2];
	    
		 
		$ins = "select * from user join usermeta on(usermeta.user_id = user.id) where user.email = '$femail'";
		$query = mysql_query($ins);
		if(mysql_num_rows($query) == 1)
		{
			$value = mysql_fetch_array($query);
			
			
			
			if($value['status']==0)
			{
				echo "<script>alert('Your account has not been verified yet. We have sent you a verification email to your email id, please verify your email.');</script>";
				echo "<script>window.location='user-login.php'</script>";
				exit();
			}
			else
			{	
			
			$user_meta_values = json_decode($value['meta_value']);
			$_SESSION['user_meta_info']=$user_meta_values;
			$_SESSION['values'] = $value;
			
				if($value['type']=='transport'){
					echo "<script>window.location='transporter-dashboard.php';</script>";
					//header('location:transporter-dashboard.php');
				}
				if($_SESSION['pt']){
					//header('location:post-journey.php');
					echo "<script>window.location='post-journey.php';</script>";
				}
				if( $value['type']=='traveller' ) {
					//header('location:dashboard.php');
					echo "<script>window.location='dashboard.php';</script>";
				}
			}
				
			
				
		}
		
		//when login is failed force to signup//
		else
		{
			
			$url = 'http://graph.facebook.com/'.$fbid.'/picture?type=large';
			$data = file_get_contents($url);
			$fileName = time().'.jpg';
			$file = fopen($fileName, 'w+');
			$fl=fputs($file, $data);	
			fclose($file);
			copy($fileName, 'Profile_Picture/'.$fileName);			
			unlink($fileName); 
	
			    $_SESSION['FULLNAME'] = $first_name.' '.$last_name;
				$_SESSION['EMAIL'] =  $femail;
				$_SESSION['fb_image']  = $fileName;
				
			echo "<script>window.location='login-with.php?provider=Facebook'</script>";
		}
} 
else
 {
  //$loginUrl = $helper->getLoginUrl();
  
  $loginUrl = $helper->getLoginUrl(array(
   'scope' => 'email,user_birthday,user_about_me,user_location,user_work_history'
 ));
 
 
 // 'scope' => ' email,user_birthday,user_about_me'

 header("Location: ".$loginUrl);
}

ob_flush();	
?>