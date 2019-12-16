<?php include 'header.php'; ?>

<div class="container" style="padding:50px">
  <div class="main-cn about-page bg-white clearfix">
    <section class="about-cn clearfix">
      <div class="about-text">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="bs-example" data-example-id="contextual-table">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Transport Provider</th>
                    <th>Profile</th>
                  </tr>
                </thead>
                <tbody>				<?php 					$transporter_name = $_GET['name'];					$query = "SELECT * from usermeta";					$rslt = mysql_query($query);					while($d = mysql_fetch_array($rslt)) {						$val = json_decode($d['meta_value'], true);						$name = $val['username'];						$type = $val['type'];						static $count = 0;						if( (strtolower($name) == strtolower($transporter_name)) && ($type == 'transport') ){						?>						<tr class="active">							<th scope="row"><?php echo $count; ?></th>							<td><?php echo $name; ?></td>							<td><a class="btn btn-primary" href="http://journeybid.com/profiles-transport-provider.php?name=<?php echo $name; ?>" role="button">View Profile</a></td>						</tr>					<?php 						$count++;						}					}					if($count == 0){						 echo getAllProvidersListing();					}			?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<?php include 'footer.php'; ?>
