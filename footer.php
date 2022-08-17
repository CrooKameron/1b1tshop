</div>
	</div>
<div class="f-widget"><!--footer Widget-->
		<div class="container">
			<div class="row">
				
				<div class="col-md-4"><!--footer newsletter widget-->
					<div class="title-widget-bg">
						<div class="title-widget">Newsletter Signup</div>
					</div>
					<div class="newsletter">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<form role="form" action="nedmin/netting/process.php" method="POST">
							<div class="form-group">
								<label>Your Email address</label>
								<input type="email" class="form-control newstler-input" id="exampleInputEmail1" placeholder="Enter email" name="email">
								<button class="btn btn-default btn-red btn-sm" type="submit" name="newslettersub">Sign Up</button>
							</div>
						</form>
					</div>
				</div><!--footer newsletter widget-->

<div class="col-md-4"><!--footer twitter widget-->
					<div class="title-widget-bg">
						<div class="title-widget">Twitter Updates</div>
					</div>
					<ul class="tweets">
						<li>Check out this great #themeforest item for you
						'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
						<li class="lastone">Check out this great #themeforest item for you
						'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
					</ul>
					<div class="clearfix"></div>
					<a href="<?php echo $settingget['settings_twitter'] ?>" class="btn btn-default btn-follow"><i class="fa fa-twitter fa-2x"></i><div>Follow us on twitter</div></a>
				</div><!--footer twitter widget-->


				<div class="col-md-4" style="float: right;"><!--footer contact widget-->
					<div class="title-widget-bg">
						<div class="title-widget"><a class="title-widget" style="  text-decoration: none;" href="https://ppf.one/simmbo">Contact us!</a></div>
					</div>
					<ul class="contact-widget">
						<li class="fphone"><?php echo $settingget['settings_phone1']; echo"<br>"; echo $settingget['settings_phone2'];?></li>
						<li class="fmobile"><?php echo $settingget['settings_gsm1']; echo"<br>"; echo $settingget['settings_gsm2']; ?></li>
						<li class="fmail lastone"><?php echo $settingget['settings_mail1']; echo"<br>"; echo $settingget['settings_mail2'];?></li>
					</ul>
				</div><!--footer contact widget-->



			</div>
			<div class="spacer"></div>
		</div>
	</div><!--footer Widget-->
	<div class="footer"><!--footer-->
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<ul class="footermenu"><!--footer nav-->
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">My Cart</a></li>
						<li><a href="checkout.php">Checkout</a></li>
						<li><a href="about.php">About us</a></li>
					</ul><!--footer nav-->
					<div class="f-credit">&copy;Made by <a href="https://ppf.one/simmbo"><?php echo $settingget['settings_author'] ?></a></div>
					<a href=""><div class="payment visa"></div></a>
					<a href=""><div class="payment paypal"></div></a>
					<a href=""><div class="payment mc"></div></a>
					<a href=""><div class="payment nh"></div></a>
				</div>
				<div class="col-md-3"><!--footer Share-->
					<div class="followon">Follow us on</div>
					<div class="fsoc">
						<a href="<?php echo $settingget['settings_twitter'] ?>;" class="ftwitter">Twitter</a>
						<a href="<?php echo $settingget['settings_facebook'] ?>;" class="ffacebook">Facebook</a>
						<a href="<?php echo $settingget['settings_youtube'] ?>;" class="fflickr">Youtube</a>
						<a href="<?php echo $settingget['settings_google'] ?>;" class="ffeed">Google</a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div><!--footer Share-->
			</div>
		</div>
	</div><!--footer-->
