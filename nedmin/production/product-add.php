<?php include "header.php"; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Product</h2>
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

 
              <!-- select starting -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product category<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="select2_multiple form-control" required="" name="product_category_id">
                    <?php
                    $product_id = $productget['product_category_id'];


                    $askcategory = $db->prepare("SELECT * from category where category_top=:category_top order by category_order");
                    $askcategory->execute(array(
                      'category_top' => 0
                    ));
                    while ($categoryget = $askcategory->fetch(PDO::FETCH_ASSOC)) {
                      $category_id = $categoryget['category_id'];
                    ?> <option <?php if ($category_id == $product_id) {
                                  echo "selected='select'";
                                } ?> value="<?php echo $categoryget['category_id']; ?>"><?php echo $categoryget['category_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <!-- select ending -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Enter the name" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="product_name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product price<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Enter the price" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="product_price">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product money unit<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Enter the money unit" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="product_moneyunit">
                </div>
              </div>



              <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product details<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="product_detail"></textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product keywords<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Enter the product keywords" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="product_keyword">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product stock<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Enter the product stock" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="product_stock">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product status<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="product_status" id="heard" class="form-control" required>
                    <option value="0"> Passive </option>
                    <option value="1" selected> Active </option>
                  </select>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="addproduct">Update</button>
                </div>
              </div>

              <input type="hidden" name="product_id" value="<?php echo $productget['product_id'] ?>">
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