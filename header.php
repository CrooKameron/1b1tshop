<?php
include('nedmin/netting/connect.php');
include('nedmin/production/function.php');
//belirli bir veriyi seçme işlemi
$asksetting = $db->prepare("SELECT * FROM settings where settings_id=:id");
$asksetting->execute(array(
	'id' => 0
));
$settingget = $asksetting->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $settingget['setting_description']; ?>">
	<meta name="keywords" c	ontent="<?php echo $settingget['setting_keywords']; ?>">
	<meta name="author" content="<?php echo $settingget['setting_author']; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $settingget['settings_title']; ?></title>

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<link rel="icon" type="image/x-icon" href="/images/shulker-box.webp">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">

	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">

	<!-- Fancy style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">



	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div id="wrapper">
		<div class="header">
			<!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo">
						<a href="index.php"><img src="<?php echo $settingget['settings_logo']; ?>" class="no-select" alt="logo" class="logo img-responsive"></a>
					</div>


					<div class="col-md-8">
						<div class="pushright">
							<div class="top">
							<!--
								<?php
								if (!isset($_SESSION['useraccountmail'])) { ?>
									
									<a href="#" id="reg" class="btn btn-default btn-dark">Login<span>-- Or --</span>Register</a>
									<div class="regwrap">
										<div class="row">
											<div class="col-md-6 regform">
												<div class="title-widget-bg">
													<div class="title-widget">Login</div>
												</div>

												<form role="form" action="nedmin/netting/process.php" method="POST">
													<div class="form-group">
														<input type="text" class="form-control" id="username" name="account_mail" placeholder="Mail">
													</div>
													<div class="form-group">
														<input type="password" class="form-control" id="password" name="account_password" placeholder="Password">
													</div>
													<div class="form-group">
														<button class="btn btn-default btn-red btn-sm" name="login" type="submit">Login</button>
													</div>
												</form>

											</div>
											<div class="col-md-6">
												<div class="title-widget-bg">
													<div class="title-widget">Register</div>
												</div>
												<p>New User? By creating an account you be able to shop.</p>
												<a href="register.php"><button class="btn btn-default btn-yellow">Register</button></a>
											</div>
										</div>
									</div>
									
								<?php
								
								} else if (isset($_SESSION['useraccountmail'])) { ?>
									
									<ul class="small-menu" style="margin: 6px 36px 0 0;">
										<li><a href="account-details.php" style="color: white;" class="myacc">My Account</a></li>
									</ul>
									
								<?php
								}
								?>


							-->

								<!-- start search -->

								<div class="srch-wrap">
									<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
								</div>
								<div class="srchwrap">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label for="search" class="col-sm-2 control-label">Search</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="search">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>

								<!-- end search -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashed"></div>
		</div>
		<!--Header -->
		<div class="main-nav">
			<!--end main-nav -->
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="index.php" class="active no-select">Home</a>
										<div class="curve"></div>
									</li>
									<?php
									$askmenu = $db->prepare("SELECT * FROM menu where menu_status=:menu_status order by menu_order ASC limit 5");
									$askmenu->execute(array(
										'menu_status' => 1
									));

									while ($menuget = $askmenu->fetch(PDO::FETCH_ASSOC)) {

									?><li><a class="no-select" href="<?php
													if (!empty($menuget['menu_url'])) {
														echo $menuget['menu_url'];
													} else {
														echo "page-" . seo($menuget['menu_name']);
													}
													?>"><?php echo $menuget['menu_name'] ?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-md-2 machart">
							<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Cart</span>|<span class="allprice">$0.00</span></button>
							<div class="popcart">
								<table class="table table-condensed popcart-inner">
									<tbody>
										<tr>
											<td>
												<a class="no-select" href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
											</td>
											<td><a class="no-select" href="product.htm">Casio Exilim Zoom</a><br class="no-select"><span class="no-select">Color: green</span></td>
											<td>1X</td>
											<td>$138.80</td>
											<td><a class="no-select" href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
										</tr>
									</tbody>
								</table>
								<span class="sub-tot">Sub-Total : <span>$277.60</span> | <span>Vat (17.5%)</span> : $36.00 </span>
								<br>
								<div class="btn-popcart">
									<a href="checkout.htm" class="btn btn-default btn-red btn-sm">Go to Cart</a>
								</div>
								<div class="popcart-tot">
									<p>
										Total<br>
										<span>$313.60</span>
									</p>
								</div>
								<div class="clearfix"></div>

							</div>

						</div>

					</div>





				</div>
			</div>
		</div>
		<!--end main-nav -->