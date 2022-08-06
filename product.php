﻿<?php include('header.php'); 


$askproduct = $db->prepare("SELECT * FROM product where product_seourl=:seourl");
$askproduct->execute(array(
    'seourl' => $_GET['sef']
));
$getproduct = $askproduct->fetch(PDO::FETCH_ASSOC);


?>

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
                    <div class="dt-img">
							<div class="detpricetag"><div class="inner"><?php echo $getproduct['product_moneyunit'] ?><?php echo $getproduct['product_price'] ?></div></div>
							<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="images\sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="images\sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-5.jpg" alt="" class="img-responsive"></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
						</div>
					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Item id<span><?php echo $getproduct['product_id']?></span></div>
							<div class="infospan">Detail 2<span>H52</span></div>
							<div class="infospan">Detail 3<span>9A7</span></div>
							
							<h4>Available Options</h4>
							
							<form class="form-horizontal ava" role="form">
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
										<select class="form-control" id="qty">
											<option>1
											<option>2
											<option>3
											<option>4
											<option>5
										</select>
									</div>
									<div class="col-sm-4">
										<button class="btn btn-default btn-red btn-sm"><span class="addchart">Add To Chart</span></button>
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
							

                            <!-- an if block that asks if the product is in the stock or not -->
                                <?php
                                    if ($getproduct['product_stock'] > 0) { ?>
                                        <div class="sharing">
                                            <div class="share-bt">
                                                <div class="addthis_toolbox addthis_default_style ">
                                                    <a class="addthis_counter addthis_pill_style"></a>
                                                </div>
                                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="avatock"><span><?php echo $getproduct['product_stock'] ?> Items in stock</span></div>
                                        </div>
                                <?php } else { ?>
                                    <div class="sharingoutofstock">
                                            <div class="share-bt">
                                                <div class="addthis_toolbox addthis_default_style ">
                                                    <a class="addthis_counter addthis_pill_style"></a>
                                                </div>
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
					<div id="myTabContent" class="tab-content shop-tab-ct"  style="padding:0 0 10px 0; ">

						<div class="tab-pane fade active in" id="desc" style="margin:0 20px 0 20px;">
							<div class="i_like_sucking_frytes_cock">
								<?php echo $getproduct['product_detail']?>
							</div>
						</div>
						
					</div>
				</div>
				
				<div id="title-bg">
					<div class="title">Related Product</div>
				</div>
				<div class="row prdct"><!--Products-->
					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="product.htm"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span>$199</span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm">Lens</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<div class="new"></div>
							<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag blue"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->

			<?php include "sidebar.php"; ?>

			<?php include "footer.php"; ?>

			<?php include "scripts.php"; ?>
			
	</div>
</body>
</html>


