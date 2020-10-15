<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>User Landing</title>

  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">

  <style media="screen">

    .container
    {
      width: 100%;
    }

  </style>

</head>
 <body>
  <?php session_start(); ?>
  <?php include('../control/session_checker.php') ?>
  <?php include('../view/navbar.php'); ?>
  <?php include('../../db/dbconnect.php'); ?>
  <?php
      $ac_query             = "SELECT * FROM ACFT_DATA";
      $tx_ac_query          = mysqli_query($conn,$ac_query);
      $mission_query        = "SELECT * FROM MISSION_DATA";
      $tx_mission_query     = mysqli_query($conn,$mission_query);
      $transaction_query    = "SELECT * FROM TRANSACTIONS";
      $tx_transaction_query = mysqli_query($conn,$transaction_query);
      $user_query           = "SELECT * FROM USERS";
      $tx_user_query        = mysqli_query($conn,$user_query);
      $boom_query           = "SELECT * FROM USERS WHERE IS_BOOM='boom' ";
      $tx_boom_query        = mysqli_query($conn,$boom_query);
      $wrdco_query          = "SELECT * FROM WRDCO";
      $tx_wrdco_query       = mysqli_query($conn,$wrdco_query);
   ?>
  <div class="container mx-auto">
    <div class="row mx-auto">
      <div class="card col-sm-3 mx-auto">
        <br>
         <i class="fa fa-plane fa-5x mx-auto" style="margin-top:5px;"></i>
        <div class="card-body mx-auto">
        <h5 class="card-title mx-auto text-center"> <u>Aircraft</u> </h5>
        <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
        <h6 class='mx-auto text-center' style="font-weight:bold;"><?php echo mysqli_num_rows($tx_ac_query); ?></h6>
      </div>
    </div>
    <div class="card col-sm-3 mx-auto">
      <br>
       <i class="fa fa-flag fa-5x mx-auto" style="margin-top:5px;"></i>
      <div class="card-body mx-auto">
      <h5 class="card-title mx-auto text-center"> <u>Missions</u> </h5>
      <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
      <h6 class='mx-auto text-center' style="font-weight:bold;"><?php echo mysqli_num_rows($tx_mission_query); ?></h6>
    </div>
  </div>
  <div class="card col-sm-3 mx-auto">
    <br>
     <i class="fa fa-exchange fa-5x mx-auto" style="margin-top:5px;"></i>
    <div class="card-body mx-auto">
    <h5 class="card-title mx-auto text-center"> <u>Transactions</u> </h5>
    <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
    <h6 class='mx-auto text-center' style="font-weight:bold;"><?php echo mysqli_num_rows($tx_transaction_query); ?></h6>
  </div>

    </div>
  </div>
    <div class="row mx-auto" style="margin-bottom: 15px; margin-top: 15px;">
      <div class="card col-sm-3 mx-auto">
        <br>
         <i class="fa fa-user-circle fa-5x mx-auto" style="margin-top:5px;"></i>
        <div class="card-body mx-auto">
        <h5 class="card-title mx-auto text-center"> <u>Users</u> </h5>
        <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
        <h6 class='mx-auto text-center' style="font-weight:bold;"><?php echo mysqli_num_rows($tx_user_query); ?></h6>
      </div>
    </div>
    <div class="card col-sm-3 mx-auto">
      <br>
       <i class="fa fa-user-circle fa-5x mx-auto" style="margin-top:5px;"></i>
      <div class="card-body mx-auto">
      <h5 class="card-title mx-auto text-center"> <u>Boom Operators</u> </h5>
      <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
      <h6 class='mx-auto text-center' style="font-weight:bold;"><?php echo mysqli_num_rows($tx_boom_query); ?></h6>
    </div>
  </div>
  <div class="card col-sm-3 mx-auto">
    <br>
     <i class="fa fa-user-circle fa-5x mx-auto" style="margin-top:5px;"></i>
    <div class="card-body mx-auto">
    <h5 class="card-title mx-auto text-center"> <u>WRDCO's</u> </h5>
    <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
    <h6 class='mx-auto text-center' style="font-weight:bold;"><?php echo mysqli_num_rows($tx_wrdco_query); ?></h6>
  </div>

    </div>
</div>




 </body>
</html>
