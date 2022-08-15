	<?php
	include 'header.php';


	include('nedmin/netting/connect.php');
	$asksetting = $db->prepare("SELECT * FROM menu where menu_seourl=:sef");
	$asksetting->execute(array(
		'sef' => $_GET['sef']
	));
	$menuget = $asksetting->fetch(PDO::FETCH_ASSOC);
	?>







	<div class="container">

		<div class="row">
			<div class="col-md-9">
				<!--Main content-->



				<div class="title-bg">

					<div class="title"> <?php echo $menuget['menu_name'] ?> </div>
				</div>
				<div class="page-content">
					<p><?php echo $menuget['menu_detail'] ?></p>
				</div>


				<?php
				if ($menuget['menu_video'] != "") { ?>
					<div class="title-bg">
						<div class="title"> Video </div>
					</div>
					<div class="page-content">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $menuget['menu_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

				<?php } ?>




			</div>
			<?php include 'sidebar.php' ?>
		</div>



		<div class="spacer"></div>
	</div>

	<?php include 'footer.php' ?>