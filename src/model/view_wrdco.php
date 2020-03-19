<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View WRDCO's</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">
  <link rel="stylesheet" href="../../style/custom/dynamic_form.css">
  <?php session_start() ?>
  <?php include('../control/session_checker.php'); ?>
  <?php include('../../db/dbconnect.php') ?>
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
    max-width: 90%;
    max-height: 500px;
    overflow-x: scroll;
    overflow-y: scroll;
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
  $wrdco_query = "SELECT * FROM wrdco";
  $tx_wrdco_query = mysqli_query($conn,$wrdco_query);
 ?>

<form class="" action="#" method="post">
  <div class="form-group">
    <table class="table table-bordered table-responsive table-hover table-sm text-center mx-auto overflow-auto;">
      <thead>
        <th>DODAAC</th>
        <th>EBS DODAAC</th>
        <th>MDS</th>
        <th>Unit</th>
        <th>Location</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Rank</th>
        <th>DSN</th>
        <th>Commercial</th>
        <th>E-Mail</th>
      </thead>
      <tbody>
       <?php
        while($row = mysqli_fetch_assoc($tx_wrdco_query))
        {
          $cdodaac       = $row['CUST_DODAAC'];
          $edodaac       = $row['EBS_DODAAC'];
          $mds           = $row['MDS'];
          $unit          = $row['UNIT'];
          $cmd           = $row['CMD'];
          $location      = $row['LOCATION'];
          $last_name     = $row['LASTNAME'];
          $first_name    = $row['FIRSTNAME'];
          $dsn           = $row['DSN'];
          $commercial    = $row['COMMERCIAL'];
          $email         = $row['EMAIL'];
          echo "<tr>";
          echo "<td>$cdodaac</td>";
          echo "<td>$edodaac</td>";
          echo "<td>$mds</td>";
          echo "<td>$unit</td>";
          echo "<td>$cmd </td>";
          echo "<td>$location</td>";
          echo "<td>$last_name</td>";
          echo "<td>$first_name</td>";
          echo "<td>$dsn</td>";
          echo "<td>$commercial</td>";
          echo "<td>$email</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</form>

</body>
</html>
