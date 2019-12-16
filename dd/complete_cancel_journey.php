<?php include('header.php'); ?>
<?php if(!isset($_SESSION['values'])){ header('location:user-login.php');} ?>


 <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>Dashboard</li>
			<?php if($_SESSION['values']['type'] == 'traveller'){ ?>
				<li> Traveller </li>
			<?php } ?>
            <li><?php echo $_SESSION['user_meta_info']->username ;?></li>
          </ul>
        </section>
				<?php 
					$journey_details = single_get_journey_details($_GET['jid']);
				?>
				
		<?php
			
			$nquery = "SELECT * from payment_details where journey_id=".$_GET['jid'];
			$nexecute = mysql_query($nquery);
			$no_of_rws = mysql_num_rows($nexecute);
			$nvals = mysql_fetch_assoc($nexecute);
			
				$trans_name = get_transpoter($nvals['transporter_id']);
			    $name = json_decode($trans_name['meta_value'],true);
				
		?>		
		
		<div class="col-sm-12">		
			<div class="panel panel-info">
				<div class="panel-body">
						<form class="com_can_form">
						<div class="form-group field_m_t">
							<div class="col-sm-2"><label for="">Date : </label></div>
							<div class="col-sm-9">
								<input type="text" name="" class="form-control" value="<?php echo $journey_details['date']; ?>" readonly="readonly"/><br/>
							
							</div>
						</div>
						<div class="form-group field_m_t">
							<div class="col-sm-2"><label for="">Journey From : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" class="form-control" value="<?php echo $journey_details['froms']; ?>" readonly="readonly"/><br/>
							
							</div>
						</div><br/>
						<div class="form-group field_m_t">
							<div class="col-sm-2"><label for="">Journey To : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" class="form-control" value="<?php echo $journey_details['tos']; ?>"  readonly="readonly"/><br/>
							
							</div>
						</div><br/>
						<div class="form-group field_m_t">
							<div class="col-sm-2"><label for="">No. of Passenger : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" class="form-control" value="<?php echo $journey_details['passenger']; ?>" readonly="readonly"/><br/>
							
							</div>
						</div><br/>
						<div class="form-group field_m_t">
							<div class="col-sm-2"><label for="">Price : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" class="form-control" value="<?php echo $journey_details['price'].'€'; ?>" readonly="readonly"/><br/>
							
							</div>
						</div><br/>
						<div class="form-group field_m_t">	
							<div class="col-sm-2"><label for="">Help : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" class="form-control" value="<?php echo $journey_details['help']; ?>"  readonly="readonly"/><br/>
							
							</div>
						</div><br/>
						<div class="form-group field_m_t">
							<div class="col-sm-2"><label for="">Description : </label></div>
							<div class="col-sm-9">
							
								<textarea class="form-control" readonly="readonly"><?php echo $journey_details['descripation']; ?></textarea><br/>
							
							</div>
						</div><br/>
						<div class="form-group field_m_t">	
							<div class="col-sm-2"><label for="">Assign : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" readonly="readonly" class="form-control" value="<?php if($no_of_rws == 0){ echo "Pending" ;} else { echo $name['username']; } ?>" placeholder="Assigned Transporter Name"/><br/>
							
							</div>
						</div>
						<!--<div class="form-group field_m_t">	
							<div class="col-sm-2"><label for="">Bid Amount of transporter : </label></div>
							<div class="col-sm-9">
							
								<input type="text" name="" class="form-control" value="" placeholder="Bid Amount"/><br/>
							
							</div>
						</div>-->
						<div class="form-group field_m_t">	
							<div class="col-sm-2"></div>
							<div class="col-sm-9">
								<select required="required" class="form-control" name="trav_sel_op" class="trav_sel_op">
									<option value=""> --Select Operation-- </option>
									<option value="Complete"> Complete </option>
									<option value="Cancel"> Cancel </option>
								</select><br/>
							
							</div>
						</div><br/><br/>
						<input type="hidden" name="trans_ids" value="<?php echo $nvals['transporter_id'];?>"/>
						<input type="hidden" name="journeys_ids" value="<?php echo $_GET['jid']; ?>"/>
						<div class="form-group field_m_t">
							<div class="col-sm-2"></div>
							<div class="col-sm-9">
								<input type="submit" class="btn btn-danger btn-lg" name="com_can_btn" value="Confirm" id="ccbtn"/>
							</div>
						</div>
						</form>
				</div>
			</div>
		</div>
                  
      </div>
      </div>
      </div>
<?php include('footer.php'); ?>