<?php
ob_start();
session_start();
include('connect.php');
include('../production/function.php');

if (isset($_POST['login'])) {
    $account_mail = htmlspecialchars($_POST['account_mail']);
    $account_password = md5($_POST['account_password']);


    $askaccount = $db->prepare("SELECT * from account where account_mail=:acmail and account_password=:acpassword and account_authority=:acauthority and account_status=:acstatus");
    $askaccount->execute(array(
        'acmail' => $account_mail,
        'acpassword' => $account_password,
        'acauthority' => 1,
        'acstatus' => 1
    ));


    $count = $askaccount->rowCount();


    if ($count == 1) {
        $_SESSION['useraccountmail'] = $account_mail;
        header("Location:../../?status=login_success");
        exit;
    } else {
        header("Location:../../?status=login_failed");
    }
}


/*
if (isset($_POST['registeraccount'])) {
    $account_nickname = htmlspecialchars($_POST['account_nickname']);
    $account_ign = htmlspecialchars($_POST['account_ign']);
    $account_mail = htmlspecialchars($_POST['account_mail']);
    $password1 = $_POST['account_password1'];
    $password2 = $_POST['account_password2'];


    if ($password1 == $password2) {


        if (strlen($password1) > 6) {

            $askaccount = $db->prepare("SELECT * FROM account where account_mail=:mail");
            $askaccount->execute(array(
                'mail' => $account_mail
            ));

            $count = $askaccount->rowCount();

            if ($count == 0) {
                $password = md5($password1);
                $account_authority = 1;
                $account_status = 1;

                $accountsave = $db->prepare("INSERT INTO account SET
                    account_nickname=:account_nickname,
                    account_ign=:account_ign,
                    account_mail=:account_mail,
                    account_password=:account_password,
                    account_authority=:account_authority,
                    account_status=:account_status
                ");

                $insert = $accountsave->execute(array(
                    'account_nickname' => $account_nickname,
                    'account_ign' => $account_ign,
                    'account_mail' => $account_mail,
                    'account_password' => $password,
                    'account_authority' => $account_authority,
                    'account_status' => $account_status
                ));

                if ($insert) {
                    header("Location:../../index.php"); // TO DO LIST OBJECT 1: i need to start the session the moment the account created. and after ppl clicking on create account they should redirected to indeex.php with logged in
                } else {
                    header("Location:../../register.php?status=unknownfail");
                }
            } else {
                header("Location:../../register.php?status=mailalreadyinuse");
            }
        } else {
            header("Location:../../register.php?status=passwordshorterthan6chars");
        }
    } else {
        header("Location:../../register.php?status=passwordsdoesntmatch");
    }
}


if (isset($_POST['updateaccountdetails1'])) {    
  
    echo ($_POST['accountid']);

    
    $accountsave = $db->prepare("UPDATE account SET
    account_nickname=:account_nickname,
    account_ign=:account_ign
    WHERE account_id=:{$_POST['accountid']};
    ");

    $update = $accountsave->execute(array(
        'account_nickname' => $_POST['account_nickname'],
        'account_ign' => $_POST['account_ign']
    ));

    if ($update) header('Location:../../index.php?status=update_success');

    else header('Location:../../account-details.php?status=unknownfail1');

}

if (isset($_POST['updateaccountdetails2'])) {                 
    $md5password =  md5($_POST['account_password']);       
    
    $accountsave = $db->prepare("UPDATE account SET
    account_password=:account_password
    where account_mail={$_SESSION['useraccountmail']}
    ");

    $update = $accountsave->execute(array(
        'account_nickname' => $_POST['account_nickname'],
        'account_ign' => $_POST['account_ign'],
        'account_password' => $md5password
    ));

    if ($update) header('Location:../../index.php?status=update_success');

    else header('Location:../../account-details.php?status=unknownfail');

}
*/

if (isset($_POST['adminlogin'])) {

    $account_mail = $_POST['account_mail'];
    $account_password = md5($_POST['account_password']);  // imputlara girilen değerleri soldaki değişkenlere atamak
    //                   ^
    //                   şifreleme yapar

    $askaccount = $db->prepare("SELECT * FROM account where account_mail=:accmail and account_password=:accpassword and account_authority=:accauth");
    $askaccount->execute(array(
        'accmail' => $account_mail,
        'accpassword' => $account_password,
        'accauth' => 5
    ));

    $count = $askaccount->rowCount();

    if ($count == 1) {
        $_SESSION['account_mail'] = $account_mail;
        header("Location:../production/index.php");
    } else {
        header("Location:../production/login.php?durum=incorrect");
    }
}

if (isset($_POST['editaccountinformation'])) {

    $accountsave = $db->prepare("UPDATE account SET 
        
        account_mail=:account_mail,
        account_ign=:account_ign,
        account_password=:account_password,
        account_nickname=:account_nickname,
        account_authority=:account_authority,
        account_status=:account_status
        WHERE account_id = {$_POST['account_id']} ");

    $update = $accountsave->execute(array(
        'account_mail' => $_POST['account_mail'],
        'account_ign' => $_POST['account_ign'],
        'account_password' => $_POST['account_password'],
        'account_nickname' => $_POST['account_nickname'],
        'account_authority' => $_POST['account_authority'],
        'account_status' => $_POST['account_status']
    ));

    if ($update) {
        header('Location:../production/accounts.php?status=update_success');
    } else {
        header('Location:../production/accounts.php?status=update_fail');
    }
}


if ($_GET['deleteuser'] == "true") {
    $destroy = $db->prepare("DELETE from account where account_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['account_id']
    ));

    if ($control) header("Location: ../production/accounts.php?status=sucsess");

    else header("Location: ../production/accounts.php?status=fail");
}

if (isset($_POST['generalsettingssend'])) {

    $settingsave = $db->prepare("UPDATE settings SET 
    
    settings_title=:settings_title,
    settings_description=:settings_description,
    settings_keywords=:settings_keywords,
    settings_author=:settings_author
    WHERE settings_id = 0");

    $update = $settingsave->execute(array(
        'settings_title' => $_POST['settings_title'],
        'settings_description' => $_POST['settings_description'],
        'settings_keywords' => $_POST['settings_keywords'],
        'settings_author' => $_POST['settings_author']

    ));

    if ($update) {
        header('Location:../production/generalsettings.php?status=update_success');
    } else {
        header('Location:../production/generalsettings.php?status=update_fail');
    }
}

if (isset($_POST['uploadlogo'])) {

    $uploads_dir = '../../dimg';

    @$tmp_name = $_FILES['settings_logo']["tmp_name"];
    @$name = $_FILES['settings_logo']["name"];

    $uniquenumber4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $uniquenumber4 . $name;


    @move_uploaded_file($tmp_name, "$uploads_dir/$uniquenumber4$name");


    $edit = $db->prepare("UPDATE settings SET
    settings_logo=:logo
    WHERE settings_id=0");
    $update = $edit->execute(array(
        'logo' => $refimgyol
    ));
    if ($update) {

        $deleteimageunlink = $_POST['old_path'];
        unlink("../../$deleteimageunlink");

        Header("Location:../production/generalsettings_form.php?status=update_success");
    } else {

        Header("Location:../production/generalsettings_form.php?status=update_success");
    }
}


if (isset($_POST['communicationsettingssend'])) {

    $settingsave = $db->prepare(
        "UPDATE settings SET 
    
    settings_phone1=:settings_phone1,
    settings_gsm1=:settings_gsm1,
    settings_fax1=:settings_fax1,
    settings_mail1=:settings_mail1,
    settings_phone2=:settings_phone2,
    settings_gsm2=:settings_gsm2,
    settings_fax2=:settings_fax2,
    settings_mail2=:settings_mail2,
    settings_city=:settings_city,
    settings_district=:settings_district,
    settings_adress=:settings_adress,
    settings_shift=:settings_shift
    WHERE settings_id = 0"
    );

    $update = $settingsave->execute(array(
        'settings_phone1' => $_POST['settings_phone1'],
        'settings_gsm1' => $_POST['settings_gsm1'],
        'settings_fax1' => $_POST['settings_fax1'],
        'settings_mail1' => $_POST['settings_mail1'],
        'settings_phone2' => $_POST['settings_phone2'],
        'settings_gsm2' => $_POST['settings_gsm2'],
        'settings_fax2' => $_POST['settings_fax2'],
        'settings_mail2' => $_POST['settings_mail2'],
        'settings_city' => $_POST['settings_city'],
        'settings_district' => $_POST['settings_district'],
        'settings_adress' => $_POST['settings_adress'],
        'settings_shift' => $_POST['settings_shift']
    ));

    if ($update) {
        header('Location:../production/communicationsettings.php?status=update_success');
    } else {
        header('Location:../production/communicationsettings.php?status=update_fail');
    }
}

if (isset($_POST['apisettingssend'])) {

    $settingsave = $db->prepare("UPDATE settings SET 
    
    settings_maps=:settings_maps,
    settings_analystic=:settings_analystic,
    settings_zopim=:settings_zopim
    WHERE settings_id = 0");

    $update = $settingsave->execute(array(

        'settings_maps' => $_POST['settings_maps'],
        'settings_analystic' => $_POST['settings_analystic'],
        'settings_zopim' => $_POST['settings_zopim']
    ));

    if ($update) {
        header('Location:../production/apisettings.php?status=update_success');
    } else {
        header('Location:../production/apisettings.php?status=update_fail');
    }
}
if (isset($_POST['socialsettingssend'])) {

    $settingsave = $db->prepare(
        "UPDATE settings SET 
    
    settings_facebook=:settings_facebook,
    settings_twitter=:settings_twitter,
    settings_youtube=:settings_youtube,
    settings_google=:settings_google
    WHERE settings_id = 0"
    );

    $update = $settingsave->execute(array(
        'settings_facebook' => $_POST['settings_facebook'],
        'settings_twitter' => $_POST['settings_twitter'],
        'settings_youtube' => $_POST['settings_youtube'],
        'settings_google' => $_POST['settings_google']
    ));

    if ($update) {
        header('Location:../production/socialsettings.php?status=update_success');
    } else {
        header('Location:../production/socialsettings.php?status=update_fail');
    }
}

if (isset($_POST['mailsettingssend'])) {

    $settingsave = $db->prepare(
        "UPDATE settings SET 
    
    settings_smtpuser=:settings_smtpuser,
    settings_smtppassword=:settings_smtppassword,
    settings_smtphost=:settings_smtphost,
    settings_smtpport=:settings_smtpport
    WHERE settings_id = 0"
    );

    $update = $settingsave->execute(array(
        'settings_smtpuser' => $_POST['settings_smtpuser'],
        'settings_smtppassword' => $_POST['settings_smtppassword'],
        'settings_smtphost' => $_POST['settings_smtphost'],
        'settings_smtpport' => $_POST['settings_smtpport']
    ));

    if ($update) {
        header('Location:../production/mailsettings.php?status=update_success');
    } else {
        header('Location:../production/mailsettings.php?status=update_fail');
    }
}

if (isset($_POST['aboutuspagesettingssend'])) {

    $settingsave = $db->prepare("UPDATE about SET 
    
    about_title=:about_title,
    about_content=:about_content,
    about_video=:about_video,
    about_vision=:about_vision,
    about_mission=:about_mission
    WHERE about_id = 0");

    $update = $settingsave->execute(array(
        'about_title' => $_POST['about_title'],
        'about_content' => $_POST['about_content'],
        'about_video' => $_POST['about_video'],
        'about_vision' => $_POST['about_vision'],
        'about_mission' => $_POST['about_mission']

    ));

    if ($update) {
        header('Location:../production/about.php?status=update_success');
    } else {
        header('Location:../production/about.php?status=update_fail');
    }
}

if (isset($_POST['editmenuproperties'])) {

    $menu_id = $_POST['menu_id'];

    $menu_seourl = seo($_POST['menu_name']);

    $settingsave = $db->prepare("UPDATE menu SET
    menu_name=:menu_name,
    menu_detail=:menu_detail,
    menu_url=:menu_url,
    menu_order=:menu_order,
    menu_seourl=:menu_seourl,
    menu_status=:menu_status
    where menu_id = $menu_id
    ");

    $update = $settingsave->execute(array(
        'menu_name' => $_POST['menu_name'],
        'menu_detail' => $_POST['menu_detail'],
        'menu_url' => $_POST['menu_url'],
        'menu_order' => $_POST['menu_order'],
        'menu_seourl' => $menu_seourl,
        'menu_status' => $_POST['menu_status']
    ));

    if ($update) header('Location:../production/menu.php?status=update_success');

    else header('Location:../production/menu.php?status=update_fail');
}


if ($_GET['deletemenu'] == "true") {
    $destroy = $db->prepare("DELETE from menu where menu_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['menu_id']
    ));

    if ($control) header("Location: ../production/menu.php?status=success");

    else header("Location: ../production/menu.php?status=fail");
}


if (isset($_POST['menuadd'])) {
    $menu_seourl = seo($_POST['menu_name']);
    $addsetting = $db->prepare("INSERT INTO menu SET 
    menu_name=:menu_name,
    menu_detail=:menu_detail,
    menu_url=:menu_url,
    menu_order=:menu_order,
    menu_seourl=:menu_seourl,
    menu_status=:menu_status
    ");

    $update = $addsetting->execute(array(
        'menu_name' => $_POST['menu_name'],
        'menu_detail' => $_POST['menu_detail'],
        'menu_url' => $_POST['menu_url'],
        'menu_order' => $_POST['menu_order'],
        'menu_seourl' => $menu_seourl,
        'menu_status' => $_POST['menu_status']
    ));

    if ($update) header('Location:../production/menu.php?status=update_success');

    else header('Location:../production/menu.php?status=update_fail');
}


if (isset($_POST['editslider'])) {

    $slideredit = $db->prepare("UPDATE slider SET 
        slider_name=:slider_name,
        slider_link=:slider_link,
        slider_order=:slider_order,
        slider_title=:slider_title,
        slider_desc=:slider_desc,
        slider_status=:slider_status,
        slider_oldprice=:slider_oldprice,
        slider_price=:slider_price,
        slider_bestdeal=:slider_bestdeal
        WHERE slider_id = {$_POST['slider_id']}
        ");

    $update = $slideredit->execute(array(
        'slider_name' => $_POST['slider_name'],
        'slider_link' => $_POST['slider_link'],
        'slider_order' => $_POST['slider_order'],
        'slider_title' => $_POST['slider_title'],
        'slider_desc' => $_POST['slider_desc'],
        'slider_status' => $_POST['slider_status'],
        'slider_oldprice' => $_POST['slider_oldprice'],
        'slider_price' => $_POST['slider_price'],
        'slider_bestdeal' => $_POST['slider_bestdeal']
    ));


    if ($update) header('Location:../production/slider.php?status=success');

    else header('Location:../production/slider.php?status=fail');
}

/*
if (isset($_POST['editsliderimage'])) {
    
        $editslider = $_GET['slider_id'];

        $uploads_dir = '../../dimg/slider';
    
        @$tmp_name = $_FILES['slider_imagepath']["tmp_name"];
        @$name = $_FILES['slider_imagepath']["name"];
        
        $uniquenumber1=rand(20000,32000);
        $uniquenumber2=rand(20000,32000);
        $uniquenumber3=rand(20000,32000);
        $uniquenumber4=rand(20000,32000); 
        $uniquename = $uniquenumber1.$uniquenumber2.$uniquenumber3.$uniquenumber4;
        $refimgyol=substr($uploads_dir, 6)."/".$uniquename.$name;
    
        
        @move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");    
    

        $edit=$db->prepare("UPDATE slider SET 
        slider_imagepath=:slider_imagepath
        WHERE slider_id = $editslider
        ");

        $update=$edit->execute(array('slider_imagepath'=>$refimgyol));



        if ($update) {
    
            $deleteimageunlink=$_POST['old_path'];
            unlink("../../$deleteimageunlink");
    
            Header("Location:../production/slider.php?status=success");
        } 
        else {
            Header("Location:../production/slider.php?status=success");
        }
    
    
}
*/


if (isset($_POST['slideradd'])) {


    $editslider = $_GET['slider_id'];

    $uploads_dir = '../../dimg/slider';

    @$tmp_name = $_FILES['slider_imagepath']["tmp_name"];
    @$name = $_FILES['slider_imagepath']["name"];

    $uniquenumber1 = rand(20000, 32000);
    $uniquenumber2 = rand(20000, 32000);
    $uniquenumber3 = rand(20000, 32000);
    $uniquenumber4 = rand(20000, 32000);
    $uniquename = $uniquenumber1 . $uniquenumber2 . $uniquenumber3 . $uniquenumber4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $uniquename . $name;


    @move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");


    $addslider = $db->prepare("INSERT INTO slider SET 
        slider_name=:slider_name,
        slider_link=:slider_link,
        slider_order=:slider_order,
        slider_title=:slider_title,
        slider_desc=:slider_desc,
        slider_status=:slider_status,
        slider_imagepath=:slider_imagepath,
        slider_oldprice=:slider_oldprice,
        slider_price=:slider_price
        ");

    $update = $addslider->execute(array(
        'slider_name' => $_POST['slider_name'],
        'slider_link' => $_POST['slider_link'],
        'slider_order' => $_POST['slider_order'],
        'slider_title' => $_POST['slider_title'],
        'slider_desc' => $_POST['slider_desc'],
        'slider_status' => $_POST['slider_status'],
        'slider_imagepath' => $refimgyol,
        'slider_oldprice' => $_POST['slider_oldprice'],
        'slider_price' => $_POST['slider_price']
    ));






    if ($update) header('Location:../production/slider.php?status=success');

    else header('Location:../production/slider.php?status=fail');
}

if ($_GET['deleteslider'] == "true") {
    $destroy = $db->prepare("DELETE from slider where slider_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['slider_id']
    ));

    if ($control) header("Location: ../production/slider.php?status=success");

    else header("Location: ../production/slider.php?status=fail");
}

if (isset($_POST['addcategory'])) {

    $category_seourl=seo($_POST['category_name']);

    $save=$db->prepare("INSERT INTO category SET 
        category_name=:catname,
        category_seourl=:catseourl,
        category_order=:catorder,
        category_status=:category_status
    ");

    $insert=$save->execute(array(
        'catname'=>$_POST['category_name'],
        'catseourl'=>$category_seourl,
        'catorder'=>$_POST['category_order'],
        'category_status'=>$_POST['category_status']
    ));

    if ($insert) header("Location: ../production/category.php?status=successfullyadded");

    else header("Location: ../production/category.php?status=fail");
}

if (isset($_POST['editcategoryproperties'])) {

    $category_id=$_POST['category_id'];
    $category_seourl=seo($_POST['category_name']);

    $save=$db->prepare("UPDATE category SET 
        category_name=:catname,
        category_seourl=:catseourl,
        category_order=:catorder,
        category_status=:category_status
        WHERE category_id=$category_id");

    $update=$save->execute(array(
        'catname'=>$_POST['category_name'],
        'catseourl'=>$category_seourl,
        'catorder'=>$_POST['category_order'],
        'category_status'=>$_POST['category_status']
    ));

    if ($update) header("Location: ../production/category.php?status=success");

    else header("Location: ../production/category.php?status=fail");
}


if ($_GET['deletecategory'] == "true") {
    $destroy = $db->prepare("DELETE from category where category_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['category_id']
    ));

    if ($control) header("Location: ../production/category.php?status=success");
    else header("Location: ../production/category.php?status=fail");
}


if ($_GET['deleteproduct'] == "true") {
    $destroy = $db->prepare("DELETE from product where product_id=:id");
    $control = $destroy->execute(array(
        'id' => $_GET['product_id']
    ));

    if ($control) header("Location: ../production/product.php?status=success");
    else header("Location: ../production/product.php?status=fail");
}

if ($_GET['featuredproduct'] == "true") {

    $save=$db->prepare("UPDATE product SET product_featured=:product_featured WHERE product_id={$_GET['product_id']}");
    $update = $save->execute(array('product_featured' => 0 ));

    if ($update) header("Location: ../production/product.php?status=success");
    else header("Location: ../production/product.php?status=fail");
}


if ($_GET['undofeaturedproduct'] == "true") {

    $save=$db->prepare("UPDATE product SET product_featured=:product_featured WHERE product_id={$_GET['product_id']}");
    $update = $save->execute(array('product_featured' => 1));

    if ($update) header("Location: ../production/product.php?status=success");
    else header("Location: ../production/product.php?status=fail");
}



if (isset($_POST['editproduct'])) { 

    $product_seourl = seo($_POST['product_name']);
    $product_id=$_POST['product_id'];



        $save=$db->prepare("UPDATE product SET 
        product_category_id=:product_category_id,
        product_name=:product_name,
        product_price=:product_price,
        product_detail=:product_detail,
        product_keyword=:product_keyword,
        product_seourl=:product_seourl,
        product_stock=:product_stock,
        product_featured=:product_featured,
        product_status=:product_status
        WHERE product_id=$product_id");


    $insert=$save->execute(array(
        'product_category_id'=>$_POST['product_category_id'],
        'product_name'=>$_POST['product_name'],
        'product_price'=>$_POST['product_price'],
        'product_detail'=>$_POST['product_detail'],
        'product_keyword'=>$_POST['product_keyword'],
        'product_seourl'=>$product_seourl,
        'product_stock'=>$_POST['product_stock'],
        'product_featured'=>$_POST['product_featured'],
        'product_status'=>$_POST['product_status']
    ));

    if ($insert) header("Location: ../production/product.php?status=success");

    else header("Location: ../production/product.php?status=fail");
}


if (isset($_POST['addproduct'])) { 

    $product_seourl = seo($_POST['product_name']);
    $product_id=$_POST['product_id'];



    $save=$db->prepare("INSERT INTO product SET 
        product_category_id=:product_category_id,
        product_name=:product_name,
        product_price=:product_price,
        product_moneyunit=:product_moneyunit,
        product_detail=:product_detail,
        product_keyword=:product_keyword,
        product_seourl=:product_seourl,
        product_stock=:product_stock,
        product_status=:product_status
    ");


    $insert=$save->execute(array(
        'product_category_id'=>$_POST['product_category_id'],
        'product_name'=>$_POST['product_name'],
        'product_price'=>$_POST['product_price'],
        'product_moneyunit'=>"$",
        'product_detail'=>$_POST['product_detail'],
        'product_keyword'=>$_POST['product_keyword'],
        'product_seourl'=>$product_seourl,
        'product_stock'=>$_POST['product_stock'],
        'product_status'=>$_POST['product_status']
    ));

    if ($insert) header("Location: ../production/product.php?status=sucsess");

    else header("Location: ../production/product.php?status=fail");
}