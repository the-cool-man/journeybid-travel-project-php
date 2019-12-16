<?php include('header.php'); ?>
<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Users</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						   <?php $val = get_admin_payment(); //print_r($val); ?>
							<?php
								?>
								
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									<thead>
										<tr>
											<th>Traveller</th>
											<th>Transporter</th>
											<th>Journey</th>
											<th>Refernce ID</th>
											<th>Email ID</th>
											<th>Paypal ID</th>
											<th>Bid Amount</th>
											<th>Paid Amount</th>
											<th>Admin % Amount</th>
										</tr>
									</thead> 
									<tbody>
									<?php foreach($val as $d){ ?>
										<tr>
											<?php //print_r($d); ?>
											<td>
												<?php 
													$name =  get_username($d['traveller_id']); 
													$name = json_decode($name['meta_value']);
													echo $name->username;
												?>
											</td>
											<td>
												<?php 
													$name =  get_username($d['transporter_id']); 
													$name = json_decode($name['meta_value']);
													echo $name->username;
												?>
											</td>
											<td>
												<?php 
												
												$to = get_post($d['journey_id']); 
												echo $to['froms']. ' - '. $to['tos'];
													
												?>
											</td>
											<?php
												  $rest = $d['travel_amount']*10/100;
											?>
											<td><?php echo $d['txn_id']; ?></td>
											<td>
												<?php 
													echo $name->email;
												?>
											</td>
											<td>
												<?php 
													$name =  get_useremail($d['transporter_id']); 
													$name = json_decode($name['meta_value']);
													echo $name->hangout_id;
													//echo $d['hangout_id'];
												?>
											</td>
											<td><?php echo '€ '.  $d['bid_amount']; ?></td>
											<td><?php echo '€ '.  $d['travel_amount']; ?></td>
											<td><?php echo '€ '.  $rest; ?></td>
											
										</tr>
									<?php	} ?>
		
										</tbody>
									</table> 
								<?php
							
							?>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<?php include('footer.php'); ?>