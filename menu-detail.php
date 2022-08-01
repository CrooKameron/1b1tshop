<?php
include 'header.php';

  
include ('nedmin/netting/connect.php');
$asksetting=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
$asksetting-> execute(array(
  'sef' => $_GET['sef']
));
$menuget=$asksetting->fetch(PDO::FETCH_ASSOC)

?>

	
	<div class="container">

		<div class="row">
			<div class="col-md-9"><!--Main content-->
				
			
			
				<div class="title-bg">
                <div class="title"> <?php echo $menuget['menu_name'] ?> </div>
				</div>
				<div class="page-content">
                <?php echo $menuget['menu_detail'] ?>
				</div>

				<div class="title-bg">
                <div class="title"> Video </div>
				</div>
				<div class="page-content">

                </div>


			</div>
			<?php include'sidebar.php' ?>
		</div>



		<div class="spacer"></div>
	</div>
	
<?php include 'footer.php' ?> 