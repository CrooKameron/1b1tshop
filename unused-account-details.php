<?php include 'header.php';?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bigtitle">Account details</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="nedmin/netting/process.php" method="POST" class="form-horizontal checkout" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Edit your 1b1tshop account details</div>
                </div>


               
                <?php if ($_GET['status'] == "unknownfail1") { ?>

                    <div class="alert alert-danger">
                        <strong>Error!</strong> Unsucsesfull attempt, try communicating with the staff.
                    </div>

                <?php } ?>

                <input value="<?php echo $accountget['account_id']?>" type="hidden" class="form-control col-md-7 col-xs-12 col-xs-129" name="accountid">

                

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Nickname<span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php echo $accountget['account_nickname'] ?>" type="text"  required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_nickname">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Minecraft Nick<span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php echo $accountget['account_ign'] ?>" type="text"  required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_ign">
                    </div>
                </div>


                
                
                <input type="hidden" name="account_mail" value="<?php echo $accountget['account_mail'] ?>">


                <button type="submit" name="updateaccountdetails1" class="btn btn-default btn-info" style="float: right;">Update!</button>
            </div>

    </form>
    <form action="nedmin/netting/process.php" method="POST" class="form-horizontal checkout" role="form">


        <div class="col-md-6">
            <div class="title-bg">
                <div class="title">Change your password</div>
            </div>

            <?php

            if ($_GET['status'] == "passwordsdoesntmatch2") { ?>

                <div class="alert alert-danger">
                    <strong>Error!</strong> Passwords doesnt match!
                </div>

            <?php } elseif ($_GET['status'] == "passwordshorterthan6chars2") { ?>

                <div class="alert alert-danger">
                    <strong>Error!</strong> Password must be at least 6 characters.
                </div>

            <?php } elseif ($_GET['status'] == "mailalreadyinuse2") { ?>

                <div class="alert alert-danger">
                    <strong>Error!</strong> This email is already in use.
                </div>

            <?php } elseif ($_GET['status'] == "unknownfail2") { ?>

                <div class="alert alert-danger">
                    <strong>Error!</strong> Unsucsesfull attempt, try communicating with the staff.
                </div>

            <?php } ?>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Mail adress<span class="required">:</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input value="<?php echo $accountget['account_mail'] ?>" type="text" disabled  required="required" class="form-control col-md-7 col-xs-12 col-xs-129">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Current Password<span class="required">:</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input placeholder="current password" type="password"  required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_password">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">New Password<span class="required">:</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input placeholder="enter your new password" type="password"  required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_password1">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Repeat Password<span class="required">:</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input placeholder="repeat password" type="password"  required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_password2">
                </div>
            </div>

            <button type="submit" style="float: right;" name="updateaccountdetails2" class="btn btn-default btn-info">reset password</button>


          

        </div>
</div>
</div>
</form>
<div class="spacer"></div>
</div>
<br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>