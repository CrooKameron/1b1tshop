<?php include 'header.php';

$askslider = $db->prepare("SELECT * FROM slider where slider_id=:id");
$askslider->execute(array(
    'id' => $_GET['slider_id']
));
$sliderget = $askslider->fetch(PDO::FETCH_ASSOC);



$askbundle = $db->prepare("SELECT * FROM bundle where bundle_slider_id=:bundle_slider_id");
$askbundle->execute(array(
    'bundle_slider_id' => $_GET['slider_id']
));

?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo $sliderget['slider_name'] ?></h2>
                        <div style="margin:4px 0 0 1330px;  position:absolute;">
                            <?php
                            if ($_GET['status'] == "success") {
                            ?> <small style="color:green;"> preferences saved! </small> <?php
                                                                                }
                                                                                    ?>
                            <?php
                            if ($_GET['status'] == "fail") {
                            ?> <small style="color:red;"> something vent wrong! </small> <?php
                                                                                }
                                                                                    ?>
                        </div>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <div style="margin:4px 5px 0 0;">
                                    <a href="slider-product-add.php?slider_id=<?php echo $sliderget['slider_id'] ?>"> <button class="btn btn-success btn-xs" name="addslider">Add item</button></a>
                                </div>
                            </li>
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



                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">product id</th>
                                    <th style="text-align:center;">name</th>
                                    <th style="text-align:center;">price</th>
                                    <th style="text-align:center; width: 100px;">delete</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php


                                while ($bundleget = $askbundle->fetch(PDO::FETCH_ASSOC)) {


                                    $askproduct = $db->prepare("SELECT * FROM product where product_id=:id");
                                    $askproduct->execute(array(
                                        'id' => $bundleget['bundle_product_id']
                                    ));
                                    $productget = $askproduct->fetch(PDO::FETCH_ASSOC);






                                ?>
                                    <tr>
                                        <td style="text-align: center; width: 100px;"><?php echo $productget['product_id'] ?></td>
                                        <td style="text-align: center; width: 500px;"><?php echo $productget['product_name'] ?></td>
                                        <td style="text-align: center; width: 200px;"><?php echo $productget['product_price'] ?></td>

                                        <!-- status button start -->



                                        <td>
                                            <center> <a href="../netting/process.php?bundle_id=<?php echo $bundleget['bundle_id'] ?>&slider_id=<?php echo $sliderget['slider_id'] ?>&bundleproductdel=true"><button style="width:100%; height:100%;" class="btn btn-danger">Delete</button></a></center>
                                        </td>

                                    </tr>

                                <?php } ?>





                            </tbody>
                        </table>




                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
<!-- /page content -->
<!-- /page content -->
<?php include 'footer.php' ?>