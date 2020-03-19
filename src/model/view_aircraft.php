<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Aircraft</title>
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

  body
  {
    background-color: gray;
  }

  .table
  {
    background-color: lightgray;
    height: 500px;
    max-width: 51%;
    max-width: 50%;
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
  $acft_query = "SELECT * FROM acft_data";
  $tx_acft_query = mysqli_query($conn,$acft_query);
 ?>

  <table class="table table-responsive table-hover overflow-auto mx-auto">
    <thead>
      <th>Tail #</th>
      <th>Type</th>
      <th>Unit</th>
      <th>Home Station</th>
      <th>Command</th>
      <th>DODAAC</th>
    </thead>
    <tbody>
     <?php
      while($row = mysqli_fetch_assoc($tx_acft_query))
      {
        $acft_type      = $row['ACFT_TYPE'];
        $tail_number    = $row['TAILNUMBER'];
        $unit           = $row['UNIT'];
        $home_station   = $row['LOCATION'];
        $command        = $row['CMD'];
        $dodaac         = $row['DODAAC'];
        echo "<tr>";
        echo "<td><input name='tail_number' type='hidden' value='{$tail_number}'/>$tail_number</td>";
        echo "<td><input name='tail_number' type='hidden' value='{$tail_number}'/>$acft_type</td>";
        echo "<td><input name='unit' type='hidden' value='{$unit}'/>$unit</td>";
        echo "<td><input name='home_station' type='hidden' value='{$home_station}'/>$home_station</td>";
        echo "<td><input name='command' type='hidden' value='{$command}'/>$command</td>";
        echo "<td><input name='command' type='hidden' value='{$dodaac}'/>$dodaac</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

</body>
</html>
