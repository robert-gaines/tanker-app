<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Users</title>
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
    max-width: 75%;
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
  $user_query = "SELECT * FROM USERS";
  $tx_user_query = mysqli_query($conn,$user_query);
 ?>

<form class="mx-auto overflow-auto" action="../admin/process_user_action.php" method="post" style="width: auto; margin: 0 auto;">
    <table class="table table-bordered table-hover table-sm text-center mx-auto overflow-auto">
      <thead>
        <th>ID#</th>
        <th>Rank</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Status</th>
      </thead>
      <tbody>
       <?php
        while($row = mysqli_fetch_assoc($tx_user_query))
        {
          $user_id    = $row['USER_ID'];
          $user_first = $row['USER_FIRST'];
          $user_last  = $row['USER_LAST'];
          $user_rank  = $row['USER_RANK'];
          $user_name  = $row['USER_NAME'];
          $status     = $row['IS_INACTIVE'];
          echo "<tr>";
          echo "<td><input name='user_id' type='hidden'/>$user_id</td>";
          echo "<td><input name='user_rank' type='hidden' value='{$user_rank}'/>$user_rank</td>";
          echo "<td><input name='user_first' type='hidden' value='{$user_first}'/>$user_first</td>";
          echo "<td><input name='user_last' type='hidden' value='{$user_last}'/>$user_last</td>";
          echo "<td><input name='user_name' type='hidden' value='{$user_name}'/>$user_name</td>";
          echo "<td><input name='status' type='hidden' value='{$status}'/>$status</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
</form>

</body>
</html>
