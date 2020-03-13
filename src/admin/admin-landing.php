<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Admin Landing</title>

  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">

  <style media="screen">

    .container
    {
      width: 100%;
    }

    .card
    {
      margin: 10px 10px 10px 10px;
    }

    .btn
    {
      margin-top: 5px;
    }

    i
    {
      padding: 1px 1px 1px 1px;
      margin: 5px 5px 5px 5px;
    }

  </style>

</head>
 <body>
  <?php session_start() ?>
  <?php include('session_checker_admin.php'); ?>
  <?php include('../../db/dbconnect.php'); ?>
  <?php include('../view/admin-navbar.php'); ?>
  <div class="container mx-auto">
    <div class="row mx-auto">
      <div class="card col-sm-3 mx-auto">
        <br>
         <i class="fa fa-plane fa-5x mx-auto" style="margin-top:5px;"></i>
        <div class="card-body mx-auto">
        <h5 class="card-title mx-auto text-center"> <u>Aircraft</u> </h5>
        <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
        <h6 class='mx-auto'><?php ?></h6>
      </div>
    </div>
    <div class="card col-sm-3 mx-auto">
      <br>
       <i class="fa fa-flag fa-5x mx-auto" style="margin-top:5px;"></i>
      <div class="card-body mx-auto">
      <h5 class="card-title mx-auto text-center"> <u>Missions</u> </h5>
      <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
      <h6 class='mx-auto'><?php ?></h6>
    </div>
  </div>
  <div class="card col-sm-3 mx-auto">
    <br>
     <i class="fa fa-exchange fa-5x mx-auto" style="margin-top:5px;"></i>
    <div class="card-body mx-auto">
    <h5 class="card-title mx-auto text-center"> <u>Transactions</u> </h5>
    <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
    <h6 class='mx-auto'><?php ?></h6>
  </div>

    </div>
  </div>
    <div class="row mx-auto">
      <div class="card col-sm-3 mx-auto">
        <br>
         <i class="fa fa-user-circle fa-5x mx-auto" style="margin-top:5px;"></i>
        <div class="card-body mx-auto">
        <h5 class="card-title mx-auto text-center"> <u>Users</u> </h5>
        <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
        <h6 class='mx-auto'><?php ?></h6>
      </div>
    </div>
    <div class="card col-sm-3 mx-auto">
      <br>
       <i class="fa fa-user-circle fa-5x mx-auto" style="margin-top:5px;"></i>
      <div class="card-body mx-auto">
      <h5 class="card-title mx-auto text-center"> <u>Boom Operators</u> </h5>
      <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
      <h6 class='mx-auto'><?php ?></h6>
    </div>
  </div>
  <div class="card col-sm-3 mx-auto">
    <br>
     <i class="fa fa-user-circle fa-5x mx-auto" style="margin-top:5px;"></i>
    <div class="card-body mx-auto">
    <h5 class="card-title mx-auto text-center"> <u>WRDCO's</u> </h5>
    <h6 class="card-title mx-auto text-center"> Current Database Records </h6>
    <h6 class='mx-auto'><?php ?></h6>
  </div>

    </div>
</div>
<div class="container mx-auto">
  <div class="row mx-auto">
    <div class="card col-sm-3 mx-auto">
      <br>
       <button class="btn btn-primary mx-auto" type="button" name="button"><i class="fa fa-database fa-5x mx-auto"></i></button>
      <div class="card-body mx-auto">
      <h5 class="card-title mx-auto text-center">Backup Database</h5>
      <h6 class='mx-auto'><?php ?></h6>
    </div>
  </div>
  <div class="card col-sm-3 mx-auto">
    <br>
     <button class="btn btn-danger mx-auto" type="button" name="button"><i class="fa fa-times-circle-o fa-5x mx-auto"></i></button>
    <div class="card-body mx-auto">
    <h5 class="card-title mx-auto text-center"> Purge Database </h5>
    <h6 class='mx-auto'><?php ?></h6>
  </div>
</div>
<div class="card col-sm-3 mx-auto">
  <br>
   <button class="btn btn-success mx-auto" type="button" name="button"><i class="fa fa-folder-open-o fa-5x mx-auto"></i></button>
  <div class="card-body mx-auto">
  <h5 class="card-title mx-auto text-center">Populate Database</h5>
  <h6 class='mx-auto'><?php ?></h6>
</div>
  </div>
 </div>
</div>

<div class="container mx-auto">
  <div class="row mx-auto">
    <div class="card col-sm-3 mx-auto">
      <br>
      <button class="btn btn-secondary mx-auto" type="button" name="button" data-toggle="modal" data-target="#logs"><i class="fa fa-crosshairs fa-5x mx-auto"></i></button>
      <div class="card-body mx-auto">
      <h5 class="card-title mx-auto text-center"> View Access Logs </h5>
      <h6 class='mx-auto'><?php ?></h6>
    </div>
  </div>
  <div class="card col-sm-3 mx-auto">
    <br>
    <button class="btn btn-dark mx-auto" type="button" name="button"><i class="fa fa-download fa-5x mx-auto"></i></button>
    <div class="card-body mx-auto">
    <h5 class="card-title mx-auto text-center">Export Access Logs</h5>
    <h6 class='mx-auto'><?php ?></h6>
  </div>
</div>
<div class="card col-sm-3 mx-auto">
  <br>
   <button class="btn btn-warning mx-auto" type="button" name="button"><i class="fa fa-times-circle-o fa-5x mx-auto"></i></button>
  <div class="card-body mx-auto">
  <h5 class="card-title mx-auto text-center">Purge Access Logs</h5>
  <h6 class='mx-auto'><?php ?></h6>
</div>

  </div>
 </div>
</div>

<div class="modal fade" id="logs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">All Access Logs</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">
      <table class="table table-dark table-hover table-responsive" style="max-height: 300px; width: 1000px;">
        <thead>
          <th>Session ID</th>
          <th>Username</th>
          <th>User IP</th>
          <th>Date</th>
          <th>Time</th>
        </thead>
        <tbody>
          <?php
            $log_query    = "SELECT * FROM ACCESS_DATA";
            $tx_log_query = mysqli_query($conn,$log_query);
            while($row = mysqli_fetch_assoc($tx_log_query))
            {
              $session_id = $row['SESSION_ID'];
              $user_name  = $row['USER_NAME'];
              $user_ip    = $row['USER_IP'];
              $date       = $row['SESSION_DATE'];
              $time       = $row['SESSION_TIME'];
              echo "<tr>";
              echo "<td>";
              echo "{$session_id}";
              echo "</td>";
              echo "<td>";
              echo "{$user_name}";
              echo "</td>";
              echo "<td>";
              echo "{$user_ip}";
              echo "</td>";
              echo "<td>";
              echo "{$date}";
              echo "</td>";
              echo "<td>";
              echo "{$time}";
              echo "</td>";
              echo "</tr>";
            }
           ?>
        </tbody>
      </table>
    <div class="modal-footer justify-content-center">
    <!-- In case you need buttons? -->
    </div>
   </div>
  </div>
</div>

 </body>
</html>
