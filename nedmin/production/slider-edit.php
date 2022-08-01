<?php include "header.php";

$askslider = $db->prepare("SELECT * FROM slider where slider_id=:id");
$askslider->execute(array(
    'id' => $_GET['slider_id']
));
$sliderget = $askslider->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit slider<?php
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Image
                                    <br><span class="required" style="font-size:12px;">940x378px</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img width="770" height="309" src="../../<?php echo $sliderget['slider_imagepath']; ?>">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                    name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $sliderget['slider_name'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider
                                    url<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $sliderget['slider_link'] ?>" type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="slider_link">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider
                                    order<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $sliderget['slider_order'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_order">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Price<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $sliderget['slider_price'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Old Price<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $sliderget['slider_oldprice'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_oldprice">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider
                                    title<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $sliderget['slider_title'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="slider_title">
                                </div>
                            </div>

                            <!-- Ck Editör Başlangıç -->

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider
                                    bestdeal<span class="required"> *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="slider_bestdeal" id="heard" class="form-control" required>
                                        <option value="0" <?php if ($getmen['slider_bestdeal'] == 0) {
                                                                    echo 'selected=""';
                                                            } ?>> False
                                        </option>
                                        <option value="1" <?php if ($sliderget['slider_bestdeal'] == 1) {
                                                                    echo 'selected=""';
                                                            }  ?>> True 
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <br>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider
                                    status<span class="required"> *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="slider_status" id="heard" class="form-control" required>
                                        <option value="0" <?php if ($getmen['slider_status'] == 0) {
                                                                echo 'selected=""';
                                                            } ?>> Passive
                                        </option>
                                        <option value="1" <?php if ($sliderget['slider_status'] == 1) {
                                                                echo 'selected=""';
                                                            }  ?>>
                                            Active </option>
                                    </select>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" name="editslider">Update</button>
                                </div>
                            </div>

                            <input type="hidden" name="slider_id" value="<?php echo $sliderget['slider_id'] ?>">

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