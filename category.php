<?php include "header.php";

if (isset($_GET['sef'])) {

	$askcategory = $db->prepare("SELECT * FROM category where category_seourl=:seourl");
	$askcategory->execute(array(
		'seourl' => $_GET['sef']
	));
	$categoryget = $askcategory->fetch(PDO::FETCH_ASSOC);

	$category_id = $categoryget['category_id'];

	$askproduct = $db->prepare("SELECT * FROM product where product_category_id=:category_id and product_status=:product_status order by product_id ASC");
	$askproduct->execute(array(
		'category_id' => $category_id,
		'product_status' => 1
	));
} else {
	$askproduct = $db->prepare("SELECT * FROM product order by product_id ASC");
	$askproduct->execute();
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="title-bg">
				<div class="title">Products</div>
				<div class="title-nav">
					<a href="category.php"><i class="fa fa-th-large"></i>grid</a>
					<a href="category-list.php"><i class="fa fa-bars"></i>List</a>
				</div>
			</div>
			<div class="row prdct">
				<!--Products-->


				<?php
				if (!$askproduct->rowCount()) {
				?>
					<p style="margin:0 0 0 20px;">no product found in this category :(</p>
				<?php
				}
				while ($productget = $askproduct->fetch(PDO::FETCH_ASSOC)) { 


					$product_id = $productget['product_id'];


					$askproductphoto = $db->prepare("SELECT * FROM productphoto where productphoto_product_id=:productphoto_product_id order by productphoto_id ASC limit 1 ");
					$askproductphoto->execute(array(
					'productphoto_product_id' => $product_id
					));
					$productimageget = $askproductphoto->fetch(PDO::FETCH_ASSOC);

				?>



					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<a href="product-<?= seo($productget["product_name"]) . "-" . $productget['product_id'] ?>"><img src="<?php echo $productimageget['productphoto_imagepath'] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale">
									<div class="inner on-sale"><span class="onsale">
											<!--<span class="oldprice">$314</span>--><?php echo $productget['product_moneyunit'] . $productget['product_price']; ?>
										</span></div>
								</div>
							</div>
							<span class="smalltitle"><a href="product-<?= seo($productget["product_name"]) ?>"><?php echo $productget['product_name']; ?></a></span>
							<span class="smalldesc">Item no.: <?php echo $productget['product_id']; ?></span>
						</div>
					</div>

				<?php } ?>


				<!-- <div class="col-md-4">
					
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
								<div class="hot"></div>
								<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale">
									<div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span>$199</span></div>
								</div>
							</div>
							<span class="smalltitle"><a href="product.htm">Red T-Shirt</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
				 -->



			</div>

		</div>

		<?php include "sidebar.php" ?>
	</div>
	<div class="spacer"></div>
</div>

<?php include "footer.php" ?>

<?php include "scripts.php" ?>


</div>
</body>

</html>