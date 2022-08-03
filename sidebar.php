<div class="col-md-3">
	<!--sidebar-->
	<div class="title-bg">
		<div class="title">Categories</div>
	</div>

	<div class="categorybox">
		<ul>
			<?php
			$askcategory = $db->prepare("SELECT * FROM category where category_status=:category_status order by category_order ASC");
			$askcategory->execute(array(
				'category_status' => 1
			));
			while ($categoryget = $askcategory->fetch(PDO::FETCH_ASSOC)) { ?>

				<li><a href="category-<?=seo($categoryget["category_name"]) ?>"><?php echo $categoryget['category_name'] ?></a></li>

			<?php } ?>
		</ul>
	</div>

	<div class="ads">
		<a href="product.htm"><img src="images/adshere.gif" class="img-responsive" alt=""></a>
	</div>

</div>
<!--sidebar-->