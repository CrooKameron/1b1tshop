<?php include "header.php";

if (isset($_GET['sef'])) {

	$askcategory=$db->prepare("SELECT * FROM category where category_seourl=:seourl");
	$askcategory-> execute(array(	
	'seourl' => $_GET['sef']
	));
	$categoryget=$askcategory->fetch(PDO::FETCH_ASSOC);

	$category_id = $categoryget['category_id']; 

	$askproduct = $db->prepare("SELECT * FROM where category_id=:category_id product order by product_id ASC");
	$askproduct->execute(array(
		'category_id' => $category_id
	));

} else {
	$askproduct = $db->prepare("SELECT * FROM product order by product_id ASC");
	$askproduct->execute();
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Category</div>
							<div class="bigtitle">Category</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="title-bg">
				<div class="title">Category - All products</div>
				<div class="title-nav">
					<a href="category.php"><i class="fa fa-th-large"></i>grid</a>
					<a href="category-list.php"><i class="fa fa-bars"></i>List</a>
				</div>
			</div>
			<div class="row prdct">
				<!--Products-->


				<?php while ($productget=$askproduct->fetch(PDO::FETCH_ASSOC)) { ?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span><?php echo $productget['product_moneyunit'].$productget['product_price'];?></span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $productget['product_name'];?></a></span>
							<span class="smalldesc">Item no.: <?php echo $productget['product_id'];?></span> 
							<br><br> <span class="smalldesc">CATEGORY: <?php echo $productget['product_category_id'];?></span>
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
			<!--Products-->
			<ul class="pagination shop-pag">
				<!--pagination-->
				<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
			</ul>
			<!--pagination-->
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