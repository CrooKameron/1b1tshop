<?php
include 'header.php';
  
include ('nedmin/netting/connect.php');
$asksetting=$db->prepare("SELECT * FROM about where about_id=:id");
$asksetting-> execute(array(
  'id' => 0
));
$aboutget=$asksetting->fetch(PDO::FETCH_ASSOC)

?>

	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<!-- <div class="col-md-4"> -->
							<div class="bigtitle">About us</div>
						<!-- </div>  -->
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				
			
			
				<div class="title-bg">
					<div class="title"><?php echo $aboutget['about_title'] ?></div>
				</div>
				<div class="page-content">
				<?php echo $aboutget['about_content'] ?>
				</div>

				<div class="title-bg">
					<div class="title"> Video </div>
				</div>
				<div class="page-content">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $aboutget['about_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>

				<div class="title-bg">
					<div class="title"> Vision </div>
				</div>
				<div class="page-content">
					<blockquote><?php echo $aboutget['about_vision'] ?></blockquote>
				</div>

				<div class="title-bg">
					<div class="title"> Mission </div>
				</div>
				<div class="page-content">
				<?php echo $aboutget['about_mission'] ?>
				</div>


			</div>
			<?php include'sidebar.php' ?>
		</div>



		<div class="spacer"></div>
	</div>
	
<?php include 'footer.php' ?> 