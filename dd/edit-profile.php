<?php include 'header.php'; //print_r($_SESSION['values']); ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>

		<?php $encoded_meta = $_SESSION['values']['meta_value']; 
		$decoded_meta = json_decode($encoded_meta,true);
		$sel = "select * from user join usermeta on(user.id = usermeta.user_id) where id = '".$_SESSION['values']['user_id']."'";
		$aa = mysql_query($sel);
		$va = mysql_fetch_array($aa);
		//print_R($va);
		?>
		<?php if(isset($_POST['update_profile_btn'])){
		if(!file_exists('Profile_Picture')){
			mkdir('Profile_Picture');
		}
		if($_FILES['upload_profile_image']['name'] != '' &&  $_FILES['upload_profile_image']['name'] != NUll) {
			$temp = explode(".", $_FILES['upload_profile_image']['name']);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$temporary = $_FILES['upload_profile_image']['tmp_name'];
			$target = 'Profile_Picture'."/".basename($newfilename);
			move_uploaded_file($temporary,$target);
		}else{
			$newfilename = $decoded_meta['profile_image'];
		}
		$contact_person = $_POST['contact_person'];
		$company_name = $_POST['company_name'];
		$preferred_language = $_POST['preferred_language'];
		$address = $_POST['address'];
		$zipcode = $_POST['zipcode'];
		$company_description = $_POST['company_description'];
		$insurance_details = $_POST['insurance_details'];
		$facebook_url = $_POST['facebook_url'];
		$website = $_POST['website'];
		$linkedin_url = $_POST['linkedin_url'];
		/*$yahoo_url = $_POST['yahoo_url'];
		$msn_id = $_POST['msn_id'];*/
		$about_us = $_POST['about_us'];
		$icq_id = $_POST['icq_id'];
		$skype_id = $_POST['skype_id'];
		$hangout_id = $_POST['hangout_id'];
		$phone = $_POST['phone'];
		$mobile = $_POST['mobile'];
		$profile_edit_details = array('contact_person' => "$contact_person", 'company_name' => "$company_name",'profile_image' => "$newfilename",'preferred_language' => "$preferred_language", 'address' => "$address",'zipcode' => "$zipcode",'company_description' => "$company_description",'insurance_details' => "$insurance_details",'facebook_url' => "$facebook_url",'website' => "$website",'linkedin_url' => "$linkedin_url",'icq_id' => "$icq_id",'skype_id' => "$skype_id",'hangout_id' => "$hangout_id",'phone' => "$phone",'mobile' => "$mobile",'vehicle_types' => $_POST['vehicle_types'],'about_us' => "$about_us");
		$x = array_merge($decoded_meta,$profile_edit_details);
		//print_r($profile_edit_details);
		//print_r($x);
		$val = json_encode($x);
		//print_r($val);
		$update = "UPDATE usermeta set meta_value='$val' where user_id='".$_SESSION['values']['user_id']."'";
		$query = mysql_query($update) or die("Error in updating".mysql_error());
			if($query){
				//unset($_SESSION['values']['meta_value']);
				$_SESSION['values']['meta_value'] = $val;
				//print_R($_SESSION['values']['meta_value']);
				//exit;
				if($_SESSION['values']['type'] == 'transport'){ echo "<script>setTimeout(function() {window.location='transporter-dashboard.php'}, 2000); </script>"; }
				else{
				echo "<script>setTimeout(function() {window.location='dashboard.php'}, 2000); </script>"; }
				//echo "<script> window.location='edit-profile.php'</script>";
				
			}
		}
		?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Edit Profile</li>
            <li><?php echo $_SESSION['user_meta_info']->username ;?></li>
          </ul>
        </section>
        <br>
        <section class="user-profile">
          <div class="row">
            <div class="col-md-12">
			<form method="post" enctype="multipart/form-data">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Personal</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['contact_person']; ?>" class="input-text" name="contact_person" placeholder="Contact Person">
                    </div>
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['company_name']; ?>" class="input-text" name="company_name" placeholder="Company Name">
                    </div>
                    <select class="form-control field-input" name="preferred_language">
                      <option value="Language-not-selected">Please Select Language</option>
                      <option value="English">English</option>
                    </select>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Photo</label>
                      <input type="file" id="exampleInputFile" name="upload_profile_image">
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Address</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['address']; ?>" class="input-text" name="address" placeholder="Address" required="required">
                    </div>
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['zipcode']; ?>" class="input-text" name="zipcode" placeholder="Zip Code" required="required">
                    </div>
                  </div>
                </div>
              </div>
			  <?php if($_SESSION['values']['type'] == 'traveller') { ?>
			<div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Profile</h3>
                </div>
                <div class="panel-body">
					<div class="user-form col-md-8">
						<div class="field-input">
						  <input type="text" value="<?php echo $decoded_meta['about_us']; ?>" class="input-text" name="about_us" placeholder="About me" required="required">
						</div>
					</div>
                </div>
            </div>
			  <? } ?>
			  <?php if($_SESSION['values']['type'] == 'transport') { ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Profile</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['company_description']; ?>" class="input-text" name="company_description" placeholder="Company Description">
                    </div>
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['insurance_details']; ?>" class="input-text" name="insurance_details" placeholder="Insurance Details">
                    </div>
                  </div>
                </div>
              </div>
              <? } ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Contacts</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">

                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['website']; ?>" class="input-text" name="website" placeholder="Website (If any)">
                    </div>

                    <!--<div class="field-input">
                      <input type="text" value="<?php //echo $decoded_meta['yahoo_url']; ?>" class="input-text" name="yahoo_url" placeholder="Yahoo email">
                    </div>
                    <div class="field-input">
                      <input type="text" value="<?php //echo $decoded_meta['msn_id']; ?>" class="input-text" name="msn_id" placeholder="MSN ID">
                    </div>-->

                   
    
                    <div class="field-input">
                      <input type="text" value="<?php echo $decoded_meta['mobile']; ?>" class="input-text" name="mobile" placeholder="Mobile" required="required">
                    </div>										
					<div class="field-input">      
						<input type="email" value="<?php echo $decoded_meta['hangout_id']; ?>" class="input-text" name="hangout_id" placeholder="Paypal ID" required="required">  </div>
                  </div>
                </div>
              </div>
              <?php if($_SESSION['values']['type'] == 'transport') { ?>
              <div class="panel panel-info">
					<div class="panel-heading">
					  <h3 class="panel-title">Vehicle Types</h3>
					</div>
					<div class="panel-body">
						<div class="user-form col-md-8">
							<label class="checkbox-inline">
							  <input type="checkbox" id="inlineCheckbox1" value="Luxury Coach" name="vehicle_types[]"> Luxury Coach
							</label>
							<label class="checkbox-inline">
							  <input type="checkbox" id="inlineCheckbox2" value="Mini Bus" name="vehicle_types[]"> Mini Bus
							</label>
							<label class="checkbox-inline">
							  <input type="checkbox" id="inlineCheckbox3" value="Other" name="vehicle_types[]"> Other
							</label>
							<label class="checkbox-inline">
							  <input type="checkbox" id="inlineCheckbox3" value="SUV" name="vehicle_types[]"> SUV
							</label>
						</div>
					</div>
              </div>
			  <?php } ?>  
              <div class="col-md-12" style="padding-top:10px;">
                <button class="awe-btn awe-btn-1 awe-btn-medium" name="update_profile_btn">Update</button>
              </div>
			  </form>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>