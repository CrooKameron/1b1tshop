<?php
$askproduct = $db->prepare("SELECT * FROM product where product_status=:product_status and product_featured=:product_featured");

$askproduct->execute(array('product_featured' => 1, 'product_status' => 1));

$featuredcount = $askproduct->rowCount();


if ($featuredcount >= 4) {


?>

	<div class="f-widget featpro">
		<div class="container">
			<div class="title-widget-bg">
				<div class="title-widget">Featured</div>
				<div class="carousel-nav">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			</div>
			<div id="product-carousel" class="owl-carousel owl-theme">

				<?php
				$askproduct = $db->prepare("SELECT * FROM product where product_status=:product_status and product_featured=:product_featured");
				$askproduct->execute(array(
					'product_featured' => 1,
					'product_status' => 1
				));
				while ($productget = $askproduct->fetch(PDO::FETCH_ASSOC)) {


					$product_id = $productget['product_id'];


					$askproductphoto = $db->prepare("SELECT * FROM productphoto where productphoto_product_id=:productphoto_product_id order by productphoto_id ASC limit 1 ");
					$askproductphoto->execute(array(
						'productphoto_product_id' => $product_id
					));
					$productimageget = $askproductphoto->fetch(PDO::FETCH_ASSOC);

				?>



					<div class="item">
						<div class="productwrap">
							<div class="pr-img">
								<!-- <div class="hot"></div> -->
								<a href="product-<?= seo($productget["product_name"]) . "-" . $productget['product_id'] ?>"><img src="<?php echo $productimageget['productphoto_imagepath'] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag blue">
									<div class="inner"><span><?php echo $productget['product_moneyunit'] . $productget['product_price']; ?></span></div>
								</div>
							</div>
							<span class="smalltitle"><a href="product-<?= seo($productget["product_name"]) . "-" . $productget['product_id'] ?>"><?php echo $productget['product_name']; ?></a></span>
							<span class="smalldesc">Item no.: <?php echo $productget['product_id']; ?></span>
						</div>
					</div>

				<?php } ?>

			</div>
		</div>
	</div>

<?php } ?>