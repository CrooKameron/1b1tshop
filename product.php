<?php 

include('header.php'); 


$askproduct = $db->prepare("SELECT * FROM product where product_id=:product_id");
$askproduct->execute(array(
    'product_id' => $_GET['product_id']
));
$getproduct = $askproduct->fetch(PDO::FETCH_ASSOC);

$count=$askproduct->rowCount();
if ($count==0 || $getproduct['product_status'] == 0) {
	header("Location:prdctnotfound.php");
}
?>
   <!-- i will use this at bundle page -->
	<!-- <div class="container">
		<ul class="small-menu">
			<li><a href="" class="myacc">My Account</a></li>
			<li><a href="" class="myshop">Shopping Chart</a></li>
			<li><a href="" class="mycheck">Checkout</a></li>	
		</ul>
		<div class="clearfix"></div>
		<div class="lines"></div>
	</div> -->
	
	<div class="container">
		<div class="row">
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $getproduct['product_name']?></div>
				</div>
				<div class="row">
					<div class="col-md-6">

					
					<?php
					$product_id = $getproduct['product_id'];
					$askproductphoto = $db->prepare("SELECT * FROM productphoto where productphoto_product_id=:productphoto_product_id order by productphoto_id ASC limit 1 ");
					$askproductphoto->execute(array(
						'productphoto_product_id' => $product_id
					));
					$productimageget = $askproductphoto->fetch(PDO::FETCH_ASSOC);
					?>



                    <div class="dt-img">
							<a class="fancybox" href="<?php echo $productimageget['productphoto_imagepath']?>" data-fancybox-group="gallery" title="<?php echo $getproduct['product_name']?>"><img src="<?php echo $productimageget['productphoto_imagepath']?>" alt="" class="img-responsive"></a>
						</div>

						<!-- <div class="thumb-img">
							<a class="fancybox" href="images\sample-2.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
						</div> -->

					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Item id<span><?php echo $getproduct['product_id']?></span></div>
							<div class="infospan">Price<span><?php echo $getproduct['product_moneyunit'].$getproduct['product_price'] ?></span></div>
							
							<h4>Available Options</h4>
							
							<form class="form-horizontal ava" role="form" action="nedmin/netting/process.php" method="POST">
								<!-- <div class="form-group">
									<label for="mem" class="col-sm-2 control-label">Option</label>
									<div class="col-sm-10">
										<select class="form-control" id="mem">
											<option>Option 1
											<option>Option 2
											<option>Option 3
											<option>Option 4
											<option>Option 5
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="dash"></div>
								</div> -->
								<!-- <div class="form-group">
									<label for="color" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select class="form-control" id="color">
											<option>Blank 1
											<option>Blank 2
											<option>Blank 3
											<option>Blank 4
											<option>Blank 5
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="dash"></div>
								</div> -->
								<div class="form-group"> 
									<label for="qty" class="col-sm-2 control-label">Qty</label>
									<div class="col-sm-4">
										<select class="form-control" value="1" name="cart_product_qty" id="cart_product_qty">
											<option name="opt1" value="1">1</option>
											<option name="opt2" value="2">2</option>
											<option name="opt3" value="3">3</option>
											<option name="opt4" value="4">4</option>
											<option name="opt5" value="5">5</option>
											<option name="opt6" value="10">10</option>
											<option name="opt7" value="15">15</option>
										</select>
									</div>
									<div class="col-sm-4">
										<button type="submit" name="addtocart" class="btn btn-default btn-red btn-sm"><span class="addcart">Add To cart</span></button>
									</div>
									<div class="clearfix"></div>
								</div>
								<input type="hidden" name="account_id" value="<?php echo $accountget['account_id'] ?>">
								<input type="hidden" name="product_id" value="<?php echo $getproduct['product_id'] ?>">
							</form>
							

                            <!-- an if block that asks if the product is in the stock or not -->
                                <?php
                                    if ($getproduct['product_stock'] > 0) { ?>
                                        <div class="sharing">
                                            <div class="share-bt">

                                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="avatock"><span><?php echo $getproduct['product_stock'] ?> Items in stock</span></div>
                                        </div>
                                <?php } else { ?>
                                    <div class="sharingoutofstock">
                                            <div class="share-bt">

                                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="avatock"><span>oops, sorry! out of stock  (╯°□°)╯︵ ┻━┻</span></div>
                                        </div>
                                <?php } ?>
                              
                            <!-- end -->
							
						</div>
					</div>
				</div>

				<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab" >
						<li class="active"><a href="#desc" data-toggle="tab">Items included</a></li>
					</ul>
					<div id="myTabContent" class="tab-content shop-tab-ct desccontainer">

						<div class="tab-pane fade active in" id="desc" style="margin:0 20px 0 20px;">
							<div class="i_like_sucking_frytes_cock">
								<?php echo $getproduct['product_detail']?>
							</div>
						</div>
						
					</div>
				</div>
				

				<div class="row prdct"><!--Products-->
				
				<div id="title-bg">
					<div class="title">Related Product</div>
				</div>
				<?php 	

				$category_id=$getproduct['product_category_id'];

				$askproductbottom = $db->prepare("SELECT * FROM product where product_category_id=:category_id order by rand() limit 3");
				$askproductbottom->execute(array(
				'category_id' => $category_id
				));

				while ($productgetbottom=$askproductbottom->fetch(PDO::FETCH_ASSOC))  { 
					
					$product_id = $productgetbottom['product_id'];


					$askproductphoto = $db->prepare("SELECT * FROM productphoto where productphoto_product_id=:productphoto_product_id order by productphoto_id ASC limit 1 ");
					$askproductphoto->execute(array(
						'productphoto_product_id' => $product_id
					));
					$productimageget = $askproductphoto->fetch(PDO::FETCH_ASSOC);
					
					?>



				
				
				<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<a href="product-<?=seo($productgetbottom["product_name"])."-".$productgetbottom['product_id']?>"><img src="<?php echo $productimageget['productphoto_imagepath'] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><!--<span class="oldprice">$314</span>--><?php echo $productgetbottom['product_moneyunit'].$productgetbottom['product_price'];?></span></div></div>
							</div>
							<span class="smalltitle"><a href="product-<?=seo($productgetbottom["product_name"])?>"><?php echo $productgetbottom['product_name'];?></a></span>
							<span class="smalldesc">Item no.: <?php echo $productgetbottom['product_id'];?></span> 
						</div>
					</div>

					<?php }?>


				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->

			<?php include "sidebar.php"; ?>

			<?php include "footer.php"; ?>

			<?php include "scripts.php"; ?>
			
	</div>
</body>
</html>


