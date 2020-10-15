<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Boom Operators</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">
  <link rel="stylesheet" href="../../style/custom/dynamic_form.css">
  <?php session_start() ?>
  <?php include('../control/session_checker.php'); ?>
  <?php include('../../db/dbconnect.php') ?>
  <?php error_reporting(0);                   ?>
  <?php
    if(isset($_SESSION['valid_admin']))
    {
      include_once('../view/admin-navbar.php');
    }
    else if(!($_SESSION['valid_admin']))
    {
      include_once('../view/navbar.php');
    }
    else {
      include_once('../view/navbar.php');
    }
   ?>
  <style media="screen">

  body,form
  {
    background-color: gray;
  }

  .table
  {
    background-color: lightgray;
  }

  th
  {
  position: sticky;
  top: 0px;
  background: white;
  }

  </style>
</head>
<body>

<?php
  $user_query = "SELECT * FROM USERS WHERE IS_BOOM='boom';";
  $tx_boom_query = mysqli_query($conn,$user_query);
 ?>

<form class="overflow-auto col-sm-8 mx-auto" action="#" method="post">
  <div class="form-group">
    <table class="table table-bordered table-hover table-sm text-center mx-auto">
      <thead>
        <th>Rank</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
      </thead>
      <tbody>
       <?php
        while($row = mysqli_fetch_assoc($tx_boom_query))
        {
          $user_id    = $row['USER_ID'];
          $user_first = $row['USER_FIRST'];
          $user_last  = $row['USER_LAST'];
          $user_rank  = $row['USER_RANK'];
          $user_name  = $row['USER_NAME'];
          echo "<tr>";
          echo "<td><input name='unit' type='hidden' value='{$user_rank}'/>$user_rank</td>";
          echo "<td><input name='tail_number' type='hidden' value='{$user_first}'/>$user_first</td>";
          echo "<td><input name='tail_number' type='hidden' value='{$user_last}'/>$user_last</td>";
          echo "<td><input name='unit' type='hidden' value='{$user_name}'/>$user_name</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</form>

</body>
</html>
