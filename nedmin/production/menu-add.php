<?php include "header.php"; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Menu</h2>
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
                  <input placeholder="enter menu name here" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="menu_name">
                </div>
              </div>

              <!-- Ck Editor -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="menu_detail"></textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu url<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter menu url" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="menu_url">
                  <span style="	margin: 0 0 0 7px; font-size: small;">left this field blank if you want to create a custom seo page</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu video<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter video code here" value="<?php echo $menuget['menu_video'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="menu_video">
                  <span style="	margin: 0 0 0 7px; font-size: small;">please only enter the video code separate from the url. <a href="../../images/howtopastevideocode.png" style="margin: 0 0 0 5px;">dont know how?</a></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu order<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter menu order" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="menu_order">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu status<span class="required"> *</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="menu_status" id="heard" class="form-control" required>
                    <option value="0"> Passive </option>
                    <option value="1" selected> Active </option>
                  </select>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="menuadd">Update</button>
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