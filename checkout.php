<?php include "header.php" ?>

<div class="container">
	<div class="row">

	</div>

	<form class="form-horizontal checkout" role="form" action="about.php">
		<div class="row">
			<div class="col-md-6 bill">
				<div class="title-bg">
					<div class="title">Customer Info</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="name" placeholder="name" name="name">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="last_name" placeholder="surname" name="surname">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="phone" placeholder="phone number: 123-123-1234" name="phone">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="ign" placeholder="ign - (in game name)" name="ign">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="form-control" id="company" placeholder="email" name="email">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" id="city" placeholder="security code" name="securitycode">
						<span class="chckoutscinfo">please create a code at least 6 digits of numbers and save it somewhere<p>that will be your verification code for your purchase</p></span>
					</div>
					<div class="col-sm-6">

					</div>
				</div>

			</div>
			<div class="col-md-6 ship">
			<div class="title-bg">
					<div class="title">Payment Method</div>
				</div>
				<br class="no-select">

				<div class="radio" style="margin:-15px 0 0 0;">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="optionsRadios1" checked="optionsRadios1">
						Credit Card
					</label>
				</div>
				<br class="no-select">

				<div class="radio" style="margin:-8px 0 0 0;">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="optionsRadios2" name="optionsRadios2">
						Paypal
					</label>
				</div>
				<br class="no-select">

				<div class="radio" style="margin:-8px 0 0 0;">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios3" value="optionsRadios3" name="optionsRadios3">
						Direct Bank Transfer
					</label>
				</div>
			</div>
		</div>

		<!-- <div class="row">
			<div class="title-bg">
				<div class="title">Order Comments</div>
			</div>
			<p>Notes about order, for example instructions for delivery.</p>
			<div class="form-group ">
				<div class="col-sm-12">
					<textarea class="form-control"></textarea>
				</div>
			</div>
		</div> -->


		<div class="title-bg">
			<div class="title">Confirm Order</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Name</th>
						<th>Item Id.</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$userid = $accountget['account_id'];
				$askcart = $db->prepare("SELECT * FROM cart where cart_account_id=:id");
				$askcart->execute(array(
					'id' => $userid
				));
				$totalprice=0;
				while ($cartget = $askcart->fetch(PDO::FETCH_ASSOC)) {
					
					$product_id=$cartget['cart_product_id'];
					$askproduct = $db->prepare("SELECT * FROM product where product_id=:product_id");
					$askproduct->execute(array(
						'product_id' => $product_id
					));
					$getproduct = $askproduct->fetch(PDO::FETCH_ASSOC);




					$product_id = $getproduct['product_id'];

					$askproductphoto = $db->prepare("SELECT * FROM productphoto where productphoto_product_id=:productphoto_product_id order by productphoto_id ASC limit 1 ");
					$askproductphoto->execute(array(
						'productphoto_product_id' => $product_id
					));
					$productimageget = $askproductphoto->fetch(PDO::FETCH_ASSOC);




					$askslider = $db->prepare("SELECT * FROM slider where slider_id=:id");
					$askslider->execute(array(
						'id' => $cartget['cart_slider_id']
					));
					$sliderget = $askslider->fetch(PDO::FETCH_ASSOC);


					
					
					if     ($cartget['cart_product_id'] != null) {$totalpriceofproduct = $getproduct['product_price'] * $cartget['cart_product_qty']; } 
					elseif ($cartget['cart_product_id'] == null) {$totalpriceofproduct = $sliderget['slider_price'] * $cartget['cart_product_qty']; } 
				?>
					<tr>
						<td><?php if ($cartget['cart_product_id'] != null) { echo $getproduct['product_name']; } elseif ($cartget['cart_product_id'] == null) { echo $sliderget['slider_name']; } ?>   </td>
						<td><?php if ($cartget['cart_product_id'] != null) { echo $getproduct['product_id']; } elseif ($cartget['cart_product_id'] == null) { echo $sliderget['slider_id']; } ?>   </td>
						<td><?php echo $cartget['cart_product_qty'] ?></td>
						<td>$ <?php if ($cartget['cart_product_id'] != null) { echo $getproduct['product_price']; } elseif ($cartget['cart_product_id'] == null) { echo $sliderget['slider_price']; } ?> </td>
						<td>$<?php  echo $totalpriceofproduct ?></td>
					</tr>
					<?php $totalprice+=$totalpriceofproduct; } ?>
				</tbody>
			</table>
		</div>
		<div class="row">

			<div class="checkbox chckoutchb">
				<label>
					<input type="checkbox"> I have read and agree to the <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">Terms and conditions</a>
				</label>
			</div>

			<div class="col-md-3 col-md-offset-9">
				<div class="subtotal-wrap">

					<div class="subtotal">

						<p>Sub Total : $<?php echo $totalprice ?></p>
						<p>Taxes 17% : $<?php echo $taxes=$totalprice%17?></p>
					</div>
					<div class="total">Total : <span class="bigprice">$<?php echo $taxes+$totalprice ?></span></div>

					<button class="btn btn-default btn-red btn-sm" title="you will be redirected to about this website page">Order Now</button>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</form>
	<div class="spacer"></div>
</div>


<?php include "footer.php" ?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap\js\bootstrap.min.js"></script>

<!-- map -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js\jquery.ui.map.js"></script>
<script type="text/javascript" src="js\demo.js"></script>

<!-- owl carousel -->
<script src="js\owl.carousel.min.js"></script>

<!-- rating -->
<script src="js\rate\jquery.raty.js"></script>
<script src="js\labs.js" type="text/javascript"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>

<!-- fancybox -->
<script type="text/javascript" src="js\product\jquery.fancybox.js?v=2.1.5"></script>

<!-- custom js -->
<script src="js\shop.js"></script>
</div>
</body>

</html>