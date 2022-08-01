<?php include "header.php";

$askaccount = $db->prepare("SELECT * FROM account where account_id=:id");
$askaccount->execute(array(
  'id' => $_GET['account_id']
));
$accountget = $askaccount->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Account<?php
                            if ($_GET['status'] == "update_success") {
                            ?> <small style="color:green;"> preferences saved! </small> <?php
                                                                                  }
                                                                                    ?>
            <?php
            if ($_GET['status'] == "update_fail") {
            ?> <small style="color:red;"> something vent wrong! </small> <?php
                                                                                  }
                                                                                    ?> </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $accountget['account_mail'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="account_mail">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $accountget['account_password'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="account_password">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name and Surname<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $accountget['account_ign'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="account_ign">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nickname<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $accountget['account_nickname'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="account_nickname">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Authority<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $accountget['account_authority'] ?>" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="account_authority">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account status<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="account_status" id="heard" class="form-control" required>
                    <option value="0" <?php if ($accountget['account_status'] == 0) {
                                        echo 'selected';
                                      } ?>> Passive
                    </option>
                    <option value="1" <?php if ($accountget['account_status'] == 1) {
                                        echo 'selected';
                                      }  ?>>
                      Active </option>
                  </select>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="editaccountinformation">Update</button> <!--  ////////////////////  -->
                </div>
              </div>

              <input type="hidden" name="account_id" value="<?php echo $accountget['account_id'] ?>">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<!-- /page content -->
<?php include "footer.php"; ?>