<?php include"header.php"; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Communication Settings  <?php 
                      if ($_GET['status'] == "update_success") {
                        ?> <small style="color:green;"> preferences saved! </small>  <?php
                      }
                    ?> 
                    <?php 
                    if ($_GET['status'] == "update_fail") {
                      ?> <small style="color:red;"> something vent wrong! </small>  <?php
                    }
                  ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">1st Phone number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_phone1'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_phone1">
                        </div>
                      </div> <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">2nd Phone number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_phone2'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_phone2">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">1st GSM Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_gsm1'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_gsm1">
                        </div>
                      </div>                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">2nd GSM Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_gsm2'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_gsm2">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">1st Fax number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_fax2'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_fax1">
                        </div>
                      </div>                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">2nd Fax number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_fax1'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_fax2">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">1st Email Adress<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_mail1'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_mail1">
                        </div>
                      </div>                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">2nd Email Adress<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_mail2'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_mail2">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> City  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_city'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_city">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> District  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_district'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_district">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Adress  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_adress'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_adress">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Online support shift  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_shift'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_shift">
                        </div>
                      </div>


                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="communicationsettingssend">Update</button> <!--  ////////////////////  -->
                        </div>
                      </div>

                    </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>



        <!-- /page content -->
<?php include"footer.php"; ?>
