<?php 
include 'header.php';

$askcategory=$db->prepare("SELECT * FROM category");
$askcategory-> execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Category settings</h2>
            <div style="margin:4px 0 0 150px; position:absolute;"> 
                        <?php 
                      if ($_GET['status'] == "successfullyadded") {
                        ?> <small style="color:green;">Category Sucsesfully added!</small>  <?php
                      }
                    ?> 
                    <?php 
                      if ($_GET['status'] == "success") {
                        ?> <small style="color:green;"> preferences saved! </small>  <?php
                      }
                    ?> 
                    <?php 
                     if ($_GET['status'] == "fail") {
                      ?> <small style="color:red;"> something vent wrong! </small>  <?php
                    }
            ?>
            </div>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <div style="margin:4px 5px 0 0;">
                      <a href="category-add.php"><button class="btn btn-success btn-xs" name="addcategory">Add Category</button></a>                                                        
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
                  <th style="text-align:center;">Order</th>                  
                  <th style="text-align:center;">Name</th>                  
                  <th style="text-align:center;">Seourl</th>
                  <th style="text-align:center;">status</th>  
                  <th style="text-align:center;">edit</th>
                  <th style="text-align:center;">delete</th>
                
                </tr>
              </thead>

              <tbody>
                  
                <?php
                while($categoryget=$askcategory->fetch(PDO::FETCH_ASSOC) ) { ?>
                <tr>
                  <td width="20"><?php echo $categoryget['category_order']?></td>
                  <td><?php echo $categoryget['category_name']?></td>
                  <td><?php echo $categoryget['category_seourl']?></td>
                  <!-- status button start -->
                  <td align="center">
                    
                  <?php 
                  
                  if ($categoryget['category_status']==1){ ?> <button class="btn btn-success" style="width:100%; height:100%;">active</button> <?php } 
                  if ($categoryget['category_status']==0) { ?> <button class="btn btn-danger" style="width:100%; height:100%;">passive</button> <?php }
                  
                  ?>


                  </td>
                  <!-- status button end -->
                  <td> <center> <a href="../netting/process.php?category_id=<?php echo $categoryget['category_id'] ?>&deletecategory=true"><button style="width:100%; height:100%;" class="btn btn-danger">Delete</button></a></center></td>
                  <td> <center> <a href="category-edit.php?category_id=<?php echo $categoryget['category_id'] ?>"> <button style="width:100%; height:100%;" class="btn btn-primary ">Edit</button></a></center></td>
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