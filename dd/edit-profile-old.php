<?php include('header.php'); ?>
  <div class="main">
    <div class="container">
      <div class="main-cn element-page bg-white clearfix">
        <section class="breakcrumb-sc">
          <ul class="breadcrumb arrow">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li>Edit Profile</li>
          </ul>
        </section>
        <br>
        <section class="user-profile">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Personal</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">
                    <div class="field-input">
                      <input type="text" value="Full Name" class="input-text">
                    </div>
                    <div class="field-input">
                      <input type="text" value="Company Name" class="input-text">
                    </div>
                    <select class="form-control field-input">
                      <option>Please Select</option>
                      <option>English</option>
                    </select>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Photo</label>
                      <input type="file" id="exampleInputFile">
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
                      <input type="text" value="Address" class="input-text">
                    </div>
                    <div class="field-input">
                      <input type="text" value="Zip Code" class="input-text">
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Contacts</h3>
                </div>
                <div class="panel-body">
                  <div class="user-form col-md-8">
                    <div class="field-input">
                      <input type="text" value="Phone" class="input-text">
                    </div>
                    <div class="field-input">
                      <input type="text" value="Mobile" class="input-text">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-top:10px;">
                  <button class="awe-btn awe-btn-1 awe-btn-medium">Update</button>
                </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>