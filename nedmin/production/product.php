<?php 
include'header.php';

$askproduct=$db->prepare("SELECT * FROM product");
$askproduct-> execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Product settings</h2>
            <div style="margin:4px 0 0 140px; position:absolute;"> 
            <?php 
                      if ($_GET['status'] == "success") {
                        ?> <small style="color:green;"> preferences saved! </small>  <?php
                      }
                    ?> 
                    <?php 
                    if ($_GET['status'] == "fail") {
                      ?> <small style="color:red;"> something vent wrong! </small>  <?php
                    }
                    else {
                      echo(null);
                    }
            ?>
            </div>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <div style="margin:4px 5px 0 0;">
                      <a href="product-add.php"> <button class="btn btn-success btn-xs" name="addproduct">Add Product</button></a>                                                        
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
                  <th style="text-align:center;">Id</th>                  
                  <th style="text-align:center;">Name</th>                  
                  <th style="text-align:center;">Price</th>
                  <th style="text-align:center;">Stock</th>
                  <th style="text-align:center; width: 100px;">Status</th>  
                  <th style="text-align:center; width: 100px;">Featured</th>
                  <th style="text-align:center; width: 100px;">Delete</th>
                  <th style="text-align:center; width: 100px;">Edit</th>
                
                </tr>
              </thead>

              <tbody>
                  
                <?php
                while($productget=$askproduct->fetch(PDO::FETCH_ASSOC) ) { ?>
                <tr>
                  <td width="20"><?php echo $productget['product_id']?></td>
                  <td><?php echo $productget['product_name']?></td>
                  <td><?php echo ($productget['product_price']).($productget['product_moneyunit']) ?></td>
                  <td><?php echo $productget['product_stock']?></td>
                  <!-- status button start -->
                  <td align="center">
                    
                  <?php 
                  
                  if ($productget['product_status']==1) { ?> <button disabled class="btn btn-success" style="width:100%; height:100%;">active</button><?php } 
                  if ($productget['product_status']==0) { ?> <button disabled class="btn btn-danger" style="width:100%; height:100%;">passive</button><?php }
                  
                  ?>


                  </td>
                  <!-- status button end -->

                  <td>
                  <?php 
                  
                  if ($productget['product_featured']==1) { ?>  <a href="../netting/process.php?featuredproduct=true&product_id=<?php echo $productget['product_id'] ?>"><button class="btn btn-success" style="width:100%; height:100%;">Featured!</button>   </a>  <?php } 
                  if ($productget['product_featured']==0) { ?>  <a href="../netting/process.php?undofeaturedproduct=true&product_id=<?php echo $productget['product_id'] ?>"><button class="btn btn-danger" style="width:100%; height:100%;">Not featured</button></a>  <?php }
                  
                  ?>
                  </td>
                  <td> <center> <a href="../netting/process.php?product_id=<?php echo $productget['product_id'] ?>&deleteproduct=true"><button style="width:100%; height:100%;" class="btn btn-danger">Delete</button></a></center></td>
                  <td> <center> <a href="product-edit.php?product_id=<?php echo $productget['product_id'] ?>"> <button style="width:100%; height:100%;" class="btn btn-primary ">Edit</button></a></center></td>
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
        <?php include'footer.php' ?>