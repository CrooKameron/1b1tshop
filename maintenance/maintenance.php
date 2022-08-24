<!DOCTYPE html>
<html lang="en">
<?php
include "../nedmin/netting/connect.php";
$asksetting = $db->prepare("SELECT * FROM settings where settings_id=:id");
$asksetting->execute(array(
    'id' => 0
));
$settingget = $asksetting->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $settingget['settings_title']?></title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="maintenance-assets/css/bd-maintenance.css">
    <link rel="icon" type="image/x-icon" href="../images/shulker-box.ico">
</head>

<body class="min-vh-100 d-flex flex-column">
    <header>
        <div class="headercont"></div>
        <div class="container">
            <img class="header-img" src="../<?php echo $settingget['settings_logo']; ?>" width="180" height="50" alt="logo">
            <nav class="navbar navbar-dark bg-transparenet">
                <span class="navbar-text ml-auto d-none d-sm-inline-block"> <a href="https://www.ppf.one/simmbo" class="sc-link">Social</a> </span>
                <span class="navbar-text d-none d-sm-inline-block"> CrooKameron@gmail.com</span>
            </nav>
        </div>
    </header>

    </div>
    <main class="my-auto">
        <div class="container">
            <h1 class="page-title textshadow1">Will be back!</h1>
            <p class="page-description textshadow2">Website is under maintenance.</p>
            <p class="textshadow2"> </p>

        </div>
    </main>
</body>

</html>