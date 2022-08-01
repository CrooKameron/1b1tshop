<?php include"header.php"; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> About us page Settings<?php 
                      if ($_GET['status'] == "update_success") {
                        ?> <small style="color:green;"> preferences saved!</small>  <?php
                      }
                    ?> 
                    <?php 
                    if ($_GET['status'] == "update_fail") {
                      ?> <small style="color:red;"> something vent wrong!</small>  <?php
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $aboutget['about_title'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="about_title">
                        </div>
                      </div>

                      
            <!-- Ck Editör Başlangıç -->

            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea  class="ckeditor" id="editor1" name="about_content"><?php echo $aboutget['about_content']; ?></textarea>
                            </div>
                          </div>

                          <script type="text/javascript">

                          CKEDITOR.replace( 'editor1',

                          {

                            filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                            filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            forcePasteAsPlainText: true

                          } 

                          );

                        </script>

                        <!-- Ck Editör Bitiş -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video Code<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $aboutget['about_video'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="about_video">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vision<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $aboutget['about_vision'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="about_vision">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mission<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $aboutget['about_mission'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="about_mission">
                        </div>
                      </div>

                     

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="aboutuspagesettingssend">Update</button> 
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
<?php include"footer.php"; ?>
