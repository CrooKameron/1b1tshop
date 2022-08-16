<?php 

ob_start();
session_start();

include 'connect.php';

if (!empty($_FILES)) {



	$uploads_dir = '../../dimg/product';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$uniquenumber1=rand(20000,32000);
	$uniquenumber2=rand(20000,32000);
	$uniquenumber3=rand(20000,32000);
	$uniquenumber4=rand(20000,32000);

	$uniquename=$uniquenumber1.$uniquenumber2.$uniquenumber3.$uniquenumber4;
	$refimgpath=substr($uploads_dir, 6)."/".$uniquename.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");

	$product_id=$_POST['product_id'];

	$kaydet=$db->prepare("INSERT INTO productphoto SET
		productphoto_imagepath=:productphoto_imagepath,
		productphoto_product_id=:productphoto_product_id");
	$insert=$kaydet->execute(array(
		'productphoto_imagepath' => $refimgpath,
		'productphoto_product_id' => $product_id
	));




}





?>