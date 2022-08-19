<?php include 'header.php'; 

error_reporting(~E_NOTICE);?>

<div class="container">

	<?php
	if ($_GET['status'] == "notregistered") { ?>
		
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
						<div class="row">
							<div class="col-md-12">
								<div class="bigtitle registertitle">You need to create an account or log in<br>to add items in your cart</div>
							</div>
	
						</div>
					</div>
				</div>
			</div>
		</div>
	
	
	<?php } else {
		# code...
	}
	
	?>

	<form action="nedmin/netting/process.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Create your 1b1tshop account</div>
				</div>

				<?php

				if ($_GET['status'] == "passwordsdoesntmatch") { ?>

					<div class="alert alert-danger">
						<strong>Error!</strong> Passwords doesnt match!
					</div>

				<?php } elseif ($_GET['status'] == "passwordshorterthan6chars") { ?>

					<div class="alert alert-danger">
						<strong>Error!</strong> Password must be at least 7 characters.
					</div>

				<?php } elseif ($_GET['status'] == "mailalreadyinuse") { ?>

					<div class="alert alert-danger">
						<strong>Error!</strong> This email is already in use.
					</div>

				<?php } elseif ($_GET['status'] == "unknownfail") { ?>

					<div class="alert alert-danger">
						<strong>Error!</strong> Unsucsesfull attempt, try communicating with the staff.
					</div>

				<?php }
				?>







				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="form-control" required="" name="account_mail" placeholder="Username.">
					</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="account_password1" placeholder="Password.">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="account_password2" placeholder="Confirm password.">
					</div>
				</div>



				<button type="submit" name="registeraccount" class="btn btn-default btn-info">Register!</button>
			</div>

				</form>
			<form action="nedmin/netting/process.php" method="POST" class="form-horizontal checkout" role="form">


			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Forgot your password?</div>
				</div>

				<div class="form-group">
				<div class="col-sm-12">
					<input type="email" class="form-control" required="" name="oooooooooo" placeholder="Mail adress.">
					<span style="margin:0 0 0 10px; font-size: 10px;">you need to use your mail adress as your username to use this feature</span>
				</div>
			</div>
			<button type="submit" name="passwordresetaccount" class="btn btn-default btn-info">Send password reset request</button>




			</div>
		</div>
</div>
</form>
<div class="spacer"></div>
</div>
<br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>