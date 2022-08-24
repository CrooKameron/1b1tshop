<?php include "header.php"; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> General Settings  <?php 
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
                    
                   
                    <form action="../netting/process.php" method="POST"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Logo <br><span class="required" style="font-size:12px;">150x50px</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($settingget['settings_logo'])>0) {?>

                    <img width="180" height="50"  src="../../<?php echo $settingget['settings_logo']; ?>">

                    <?php } else {?>


                    <img width="50" height="50"  src="../../dimg/no-image.jpg">


                    <?php } ?>

                    
                  </div>
                  
                </div>

                
                    <input type="hidden" name="old_path" value="<?php echo $settingget['settings_logo']; ?>">
                      

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose Logo<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="settings_logo"  class="form-control col-md-7 col-xs-12">
                  </div>
                  
                  <div align="right" style="margin: 0 0 0;" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                </div>
              </div>
                
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-info" name="uploadlogo">Update</button> <!--  ////////////////////  -->
                        </div>
                      </div>
                    <div class="ln_solid"></div>
                    </form>

     

              <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_title'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_title">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_description'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_description">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website keywords<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_keywords'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_keywords">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website author<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $settingget['settings_author'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="settings_author">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Maintenance mode <span class="required">*</span>
                        </label>
                      <div style="margin:0 0 0 10px;" id="gender" class="btn-group" data-toggle="buttons">
                        <select name="settings_maintenance" id="heard" class="form-control" required>
                          <option value="0" <?php if ($settingget['settings_maintenance'] == 0) { echo 'selected=""'; }  ?>> Passive </option>
                          <option value="1" <?php if ($settingget['settings_maintenance'] == 1) { echo 'selected=""'; }  ?>> Active  </option>
                        </select>
                      </div>


                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="generalsettingssend">Update</button> <!--  ////////////////////  -->
                        </div>
                      </div>

                    </form>
                    </div>
                </div>
              </div>
              </div>
            </div>
        </div>
    </div>



        <!-- /page content -->
<?php include "footer.php"; ?>
