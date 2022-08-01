<!DOCTYPE html>
<html lang="en">
<head>
  <? date_default_timezone_set('Europe/Istanbul'); ?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


      <?php 
    include ('../netting/connect.php');
    $asksetting=$db->prepare("SELECT * FROM settings where settings_id=:id");
    $asksetting-> execute(array(
      'id' => 0
    ));
    $settingget=$asksetting->fetch(PDO::FETCH_ASSOC)
    ?>
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
         

          <form action="../netting/process.php" method="POST">


            <h1> Admin Pannel </h1>
            
            <div>
              <input type="text" name="account_mail" class="form-control" placeholder="Username " required="">
            </div>
            <div>
              <input type="password" name="account_password" class="form-control" placeholder="Password " required="">
            </div>
            <div>
            <button style="width: 100%; background-color: #73879C; color:white; font-weight:bolder;" type="submit" name="adminlogin" class="btn btn-default">Log in</button>
              
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">

             <?php 

             if ($_GET['durum']=="incorrect") {
             
             echo "Email adress or Password is incorrect!";

             }elseif ($_GET['durum']=="exit") {
             
             echo "Logged out Sucsessfully";

             }elseif ($_GET['durum']=="unauthorized") {
             
              echo "Unauthorized Attempt!";
 
              } 

             ?>
               
              </p>

              <div class="clearfix"></div>
              <br />

              <div style="background-color:#7a7a7a; height:90px; padding:10px 0 0 0; border-radius:15px;">
                <a href="https://www.1b1tshop.com"><img src="../../<?php echo $settingget['settings_logo'] ?>" style="width:180px; height:50px; alt=""></a>
                <p style="color:white; text-shadow:none; margin:3px 0 0 0;">©<?php $date = date('d/m/y'); echo $date;?> all rights reserved. </p>
              </div>
            </div>
          </form>



        </section>
      </div>

    </div>
  </div>
</body>
</html>
