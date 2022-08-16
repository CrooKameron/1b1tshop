<?php include 'header.php';?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">


    </div>

    <div class="col-md-12">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="aranan" placeholder="Enter a keyword...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="arama">Search!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">     
             <div align="left" class="col-md-6">
              <h2> Product Image gallery <small>
                <?php
                if ($_GET['status']=='ok') {?> 
                
                <b style="color:green;">Success!</b>

                <?php } elseif ($_GET['status']=='no')  {?>

                <b style="color:red;">Failed.</b>

                <?php } ?></small></h2><br>
              </div>
              <form  action="../netting/process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>">

                <div align="right" class="col-md-6">
                  <button type="submit" name="productphotodelete"  class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i> Delete selected images</button>
                  <a class="btn btn-success" href="product-photo-upload.php?product_id=<?php echo $_GET['product_id'];?>"><i class="fa fa-plus" aria-hidden="true"></i> Upload Photos!</a>
                </div>
                <div class="clearfix"></div>
              </div>


              <div class="x_content">


                <?php

                $atthepage = 25; // sayfada gösterilecek içerik miktarını belirtiyoruz.


                $query=$db->prepare("SELECT * from productphoto");
                $query->execute();
                $total_productphoto=$query->rowCount();

                $total_page = ceil($total_productphoto / $atthepage);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

          // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($page < 1) $page = 1; 

        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($page > $total_page) $page = $total_page; 

                $limit = ($page - 1) * $atthepage;

                $productphotoask=$db->prepare("SELECT * from productphoto where productphoto_product_id=:id order by productphoto_order DESC limit $limit,$atthepage");
                $productphotoask->execute(array(
                  'id' => $_GET['product_id']
                  ));

                  while($productphotoget=$productphotoask->fetch(PDO::FETCH_ASSOC)) { ?>



                  <div class="col-md-55">
                   <label>
                    <div class="image view view-first">
                      <img style="width: 250px; height: 150px; display: block;" src="../../<?php echo $productphotoget['productphoto_imagepath']; ?>" alt="image" />
                      <div class="mask">
                        <p><?php echo $productphotoget['productphoto_name']; ?> <?php echo $productphotoget['productphoto_id']; ?></p>
                        <div class="tools tools-bottom">

                          <!--<a href="#"><i class="fa fa-times"></i></a>-->

                        </div>

                      </div>

                    </div>

                    <?php  array("$productphotoselect"); ?>


                    <input type="checkbox" name="productphotoselect[]"  value="<?php echo $productphotoget['productphoto_id']; ?>" > select
                  </label>


                </div>

                <?php } ?>

                <div align="right" class="col-md-12">
                  <ul class="pagination">

                    <?php

                    $s=0;

                    while ($s < $total_page) {

                      $s++; ?>

                      <?php 

                      if ($s==$page) {?>

                      <li class="active">

                        <a href="productphoto.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                      </li>

                      <?php } else {?>


                      <li>

                        <a href="productphoto.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                      </li>

                      <?php   }

                    }

                    ?>

                  </ul>
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



<?php include 'footer.php'; ?>
