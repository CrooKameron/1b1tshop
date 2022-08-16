<?php include "header.php"; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Slider</h2>
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
            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter slider name here" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider url<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter slider link here" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_link">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider order<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter slider order here" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="slider_order">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Price<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter slider price here" type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_price">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Old Price<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter slider old price here" type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_oldprice">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider title<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="enter slider title here" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_title">
                </div>
              </div>

             

              <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                  Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="slider_desc"><?php echo $sliderget['slider_desc']; ?></textarea>
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
              <!-- Ck Editör Bitiş -->

 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose
                    Image<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name" name="slider_imagepath" class="form-control col-md-7 col-xs-12">
                  </div>

                  <div align="right" style="margin: 0 0 0;" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                  </div>
                </div>

                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Best
                  Deal<span class="required"> *</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="slider_status" id="heard" class="form-control" required>
                  <option value="0" selected="">False</option>
                  <option value="1">True</option>

                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>

              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                  status<span class="required"> *</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="slider_status" id="heard" class="form-control" required>
                    <option value="0">   Passive </option>
                    <option value="1" selected=""> Active </option>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                </div>
              </div>



               

                <input type="hidden" name="old_path" value="<?php echo $sliderget['slider_imagepath']; ?>">


               

                <div class="form-group">
                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="slideradd">Create</button>

                    <!--  ////////////////////  -->
                  </div>
                </div>
                <div class="ln_solid"></div>
              

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