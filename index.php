<?php include('header.php'); ?>
	<div class="container">
		<div class="clearfix"></div>
		<div class="lines"></div>

<?php include("slider.php") ?>

		
<?php include("featured.php") ?>  <!-- featured products bar will not appear if you dont have 4 or more featured products -->
	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				
				<div class="title-bg">
					<div class="title">All kits</div>
				</div>
				<div class="row prdct"><!--Products-->
  
				<?php
				$askproduct = $db->prepare("SELECT * FROM product where product_status=:product_status");
				$askproduct->execute(array(
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

					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product-<?= seo($productget["product_name"]) . "-" . $productget['product_id'] ?>"><img src="<?php echo $productimageget['productphoto_imagepath'] ?>" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$<?php echo $productget['product_price']?></div></div>
						</div>
							<span class="smalltitle"><a href="product-<?= seo($productget["product_name"]) . "-" . $productget['product_id'] ?>"><?php echo $productget['product_name'] ?></a></span>
						</div>
					</div>
				

				<?php } ?>
				</div><!--Products-->
				<div class="spacer"></div>
				
			</div><!--Main content-->
			
			
	<?php include "sidebar.php"; ?>

	<?php include "footer.php"; ?>

	<?php include "scripts.php"; ?>



	</div>
  </body>
</html>
