<?php include"header.php"; 

$askcategory=$db->prepare("SELECT * FROM category where category_id=:id");
$askcategory-> execute(array(
  'id' => $_GET['category_id']
));
$categoryget=$askcategory->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit category<?php 
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $categoryget['category_name'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="category_name">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category order<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $categoryget['category_order'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="category_order">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category status<span class="required"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">


                          <select name="category_status" id="heard" class="form-control" required>
                              <option value="0" <?php if ($categoryget['category_status']=="0") { echo 'selected=""'; } ?>> Passive </option>
                              <option value="1" <?php if ($categoryget['category_status']=="1") { echo 'selected=""'; }  ?>> Active </option>
                          </select>


                        </div>
                      </div>

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="editcategoryproperties">Update</button> 
                        </div>
                      </div>

                      <input type="hidden" name="category_id" value="<?php echo $categoryget['category_id'] ?>">

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