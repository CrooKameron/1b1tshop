<?php 
include'header.php';

$askaccount=$db->prepare("SELECT * FROM account");
$askaccount-> execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Accounts List</h2><?php 
                      if ($_GET['status'] == "success") {
                        ?> <small style="color:green; "> preferences saved! </small>  <?php
                      }
                    ?> 
                    <?php 
                    if ($_GET['status'] == "fail") {
                      ?> <small style="color:red;"> something vent wrong! </small>  <?php
                    }
                  ?>
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


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
            <thead>
                <tr>
                  <th style="text-align:center;">Mail adress</th>
                  <th style="text-align:center;">Password</th>
                  <th style="text-align:center;">In game nick</th>                  
                  <th style="text-align:center;">nickname</th>
                  <th style="text-align:center;">Authority</th>
                  <th style="text-align:center;">Account status</th>
                  <th style="text-align:center;">Registration Date</th>
                  <th style="text-align:center;">edit</th>
                  <th style="text-align:center;">delete</th>
                
                </tr>
              </thead>

              <tbody>

                <?php while($accountget=$askaccount->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $accountget['account_mail']?></td>
                  <td><?php echo $accountget['account_password']?></td>
                  <td><?php echo $accountget['account_ign']?></td>
                  <td><?php echo $accountget['account_nickname']?></td>
                  <td><?php echo $accountget['account_authority']?></td>
                  <td><?php echo $accountget['account_status']?></td>
                  <td><?php echo $accountget['account_time']?></td>
                  <td> <center> <a href="../netting/process.php?account_id=<?php echo $accountget['account_id'] ?>&deleteuser=true"><button style="width:60px; height:30px;" class="btn btn-danger btn-xs">Delete</button></a></center></td>
                  <td> <center> <a href="account-edit.php?account_id=<?php echo $accountget['account_id'] ?>"> <button style="width:60px; height:30px;" class="btn btn-primary btn-xs">Edit</button></a></center></td>
                </tr>

                <?php } ?> 



         

              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->
        <!-- /page content -->
        <?php include'footer.php' ?>