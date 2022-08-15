<?php include "header.php";

$askmenu = $db->prepare("SELECT * FROM menu where menu_id=:id");
$askmenu->execute(array(
  'id' => $_GET['menu_id']
));
$menuget = $askmenu->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit menu<?php
                          if ($_GET['status'] == "update_success") {
                          ?> <small style="color:green;"> preferences saved! </small> <?php
                                                                                  }
                                                                                    ?>
            <?php
            if ($_GET['status'] == "update_fail") {
            ?> <small style="color:red;"> something vent wrong! </small> <?php
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $menuget['menu_name'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="menu_name">
                </div>
              </div>



              <!-- Ck Editor -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="menu_detail"><?php echo $menuget['menu_detail']; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">
                CKEDITOR.replace('editor1',

                  {

                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                    forcePasteAsPlainText: true

                  }

                );
              </script>

              <!-- Ck Editor -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu video<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $menuget['menu_video'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="menu_video">
                  <span style="	margin: 0 0 0 7px; font-size: small;">please only enter the video code separate from the url. <a href="../../images/howtopastevideocode.png" style="margin: 0 0 0 5px;">dont know how?</a></span>                
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu url<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $menuget['menu_url'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="menu_url">
                  <span style="	margin: 0 0 0 7px; font-size: small;">left this field blank if you want to create a custom seo page</span>                
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu order<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $menuget['menu_order'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="menu_order">
                </div>
              </div>





              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu status<span class="required"> *</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="menu_status" id="heard" class="form-control" required>
                    <option value="0" <?php if ($menuget['menu_status'] == 0) {
                                        echo 'selected=""';
                                      } ?>> Passive </option>
                    <option value="1" <?php if ($menuget['menu_status'] == 1) {
                                        echo 'selected=""';
                                      }  ?>> Active </option>
                  </select>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="editmenuproperties">Update</button>
                </div>
              </div>

              <input type="hidden" name="menu_id" value="<?php echo $menuget['menu_id'] ?>">

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