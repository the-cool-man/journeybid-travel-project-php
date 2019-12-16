<?php include 'header.php'; ?>

    <div class="container" style="padding:50px">
      <div class="main-cn about-page bg-white clearfix">
        
        <section class="about-cn clearfix">
          <div class="about-text">
            <div class="row">
				<div class="col-md-8 col-md-offset-2">
				<table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr class="danger">
                      <th>S.NO.</th>
                      <th>Provider Name</th>
                      <th>View Profile</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php echo getAllProvidersListing(); ?>
                  </tbody>
                </table>
			</div>                                
                            </div>
          </div>
        </section>
        
      </div>
    </div>
<?php include 'footer.php'; ?>