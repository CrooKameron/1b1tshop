<?php include 'header.php';

error_reporting(~E_NOTICE); ?>

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

                <?php

                if ($_GET['status'] == "passwordsdoesntmatch") { ?>

                    <div class="alert alert-danger">
                        <strong>Error!</strong> Passwords doesnt match!
                    </div>

                <?php } elseif ($_GET['status'] == "passwordtooshort") { ?>

                    <div class="alert alert-danger">
                        <div style="text-align: center;"><strong>Error:</strong>&nbsp;&nbsp;&nbsp; Password must be at least 7 characters.</div>
                    </div>

                <?php } elseif ($_GET['status'] == "unknownfail") { ?>

                    <div class="alert alert-danger">
                        <div style="text-align: center;"><strong>Error:</strong>&nbsp;&nbsp;&nbsp; Unsucsesfull attempt, try communicating with the staff.</div>
                    </div>

                <?php } elseif ($_GET['status'] == "passwordcantbesame") { ?>

                    <div class="alert alert-danger">
                        <div style="text-align: center;"><strong>Error:</strong>&nbsp;&nbsp;&nbsp; Your new password cant be same with your old password.</div>
                    </div>

                <?php } elseif ($_GET['status'] == "incorrectpassword") { ?>

                    <div class="alert alert-danger">
                        <div style="text-align: center;"><strong>Error:</strong>&nbsp;&nbsp;&nbsp; Your current password is incorrect. Please try again.</div>
                    </div>

                <?php } ?>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Mail adress<span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php echo $accountget['account_mail'] ?>" type="text" disabled class="form-control col-md-7 col-xs-12 col-xs-129">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Current Password<span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input placeholder="current password" type="password" required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">New Password<span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input placeholder="enter your new password" type="password" required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_password1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl-16" for="first-name">Repeat Password<span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input placeholder="repeat password" type="password" required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="account_password2">
                    </div>
                </div>

                <button type="submit" style="float: right;" name="updateaccountdetails2" class="btn btn-default btn-info">reset password</button>


                <input type="hidden" value="<?php echo $accountget['account_id'] ?>" required="required" class="form-control col-md-7 col-xs-12 col-xs-129" name="hiddeninput_account_id">


            </div>

    </form>


    <div class="col-md-3">
        <div class="title"></div>
    </div>

</div>
</div>

<div class="spacer"></div>
</div>
<br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>