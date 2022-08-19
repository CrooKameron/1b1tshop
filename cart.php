<?php include "header.php" ?>



<div class="container">

	<div class="title-bg">
		<div class="title">Shopping Cart</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Remove</th>
					<th>Image</th>
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
					$totalpriceofproduct = $getproduct['product_price'] * $cartget['cart_product_qty'];


					$product_id = $getproduct['product_id'];

					$askproductphoto = $db->prepare("SELECT * FROM productphoto where productphoto_product_id=:productphoto_product_id order by productphoto_id ASC limit 1 ");
					$askproductphoto->execute(array(
						'productphoto_product_id' => $product_id
					));
					$productimageget = $askproductphoto->fetch(PDO::FETCH_ASSOC);


				?>
					<tr>
						<td style="align-items: center;"><a href="nedmin/netting/process.php?cart_id=<?php echo $cartget['cart_id']?>&deletecart=true"><button class="btn btn-danger crtrmvitm">&nbsp;<i class="fa fa-trash-o"></i></button></a></td>
						<td><img src="<?php echo $productimageget['productphoto_imagepath'] ?>" width="100" alt=""></td>
						<td><p class="crtrmvitmtext"><?php echo $getproduct['product_name']?></p></td>
						<td><p class="crtrmvitmtext"><?php echo $getproduct['product_id']?></p></td>
						<td><p class="crtrmvitmtext"><?php echo $cartget['cart_product_qty']?></form></td>
						<td><p class="crtrmvitmtext">$<?php echo $getproduct['product_price']?></p></td>
						<td><p class="crtrmvitmtext">$<?php echo $totalpriceofproduct ?></p></td>
					</tr>
					
				<?php $totalprice+=$totalpriceofproduct; } 
				
				

				
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6" style="visibility: hidden;">
			<form class="form-horizontal coupon" role="form">
				<!-- <div class="form-group">
					<label for="coupon2" class="col-sm-3 control-label">Coupon Code</label>
					<div class="col-sm-7">
						<input type="email" class="form-control " id="coupon2" placeholder="Email">
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default btn-red btn-sm">Apply</button>
					</div>
				</div> -->
			</form>
		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				<!-- <div class="subtotal">
					<p>Sub Total : $26.00</p>
					<p>Vat 17% : $54.00</p>
				</div> -->
				<div class="total">Total : $<span class="bigprice"><?php echo $totalprice ?></span></div>
				<a href="checkout.php" class="btn btn-default btn-red btn-sm">Checkout</a>
				<div class="clearfix"></div>
				<a href="index.php" class="btn btn-default btn-yellow">Continue Shopping</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="spacer"></div>
</div>

<?php include "footer.php" ?>