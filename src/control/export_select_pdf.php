<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Export Missions - PDF</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <?php session_start() ?>
  <?php include('session_checker.php'); ?>
  <?php include('../../db/dbconnect.php') ?>
  <?php error_reporting(0);                   ?>
  <style media="screen">

  body,html
  {
    background-color: gray;
  }

  .table,thead,tbody
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
<?php
  $mission_query = "SELECT * FROM MISSION_DATA";
  $tx_mission_query = mysqli_query($conn,$mission_query);
 ?>

 <form class="col-sm-12 mx-auto overflow-auto" action="mission_export_pdf.php" method="post" style="background-color: gray; margin-top: 0;">
     <table class="table table-bordered table-hover table-sm text-center mx-auto overflow-auto">
      <thead>
        <th>Mission Number</th>
        <th>Tail Number</th>
        <th>Unit</th>
        <th>Home Station</th>
        <th>Command</th>
        <th>Boom Operator</th>
        <th>Transaction Date</th>
        <th>Export</th>
      </thead>
      <tbody>
       <?php
        while($row = mysqli_fetch_assoc($tx_mission_query))
        {
          $mission_number = $row['MISSION_NUMBER'];
          $tail_number    = $row['TAIL_NUMBER'];
          $unit           = $row['UNIT'];
          $home_station   = $row['HOME_STATION'];
          $command        = $row['COMMAND'];
          $boom_operator  = $row['BOOM_OPERATOR'];
          $date           = $row['TRANSACTION_DATE'];
          $fuel_type      = $row['FUEL_TYPE'];
          echo "<tr>";
          echo "<td>$mission_number</td>";
          echo "<td><input name='tail_number' type='hidden' value='{$tail_number}'/>$tail_number</td>";
          echo "<td><input name='unit' type='hidden' value='{$unit}'/>$unit</td>";
          echo "<td><input name='home_station' type='hidden' value='{$home_station}'/>$home_station</td>";
          echo "<td><input name='command' type='hidden' value='{$command}'/>$command</td>";
          echo "<td><input name='boom_operator' type='hidden' value='{$boom_operator}'/>$boom_operator</td>";
          echo "<td><input name='mission_date' type='hidden' value='{$date}'/>$date</td>";
          echo "<input name='fuel_type' type='hidden' value='{$fuel_type}'/>";
          echo "<td><button type='submit' class='btn btn-warning' value='{$mission_number}' name='mission_number'>Export</button></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
</form>

</body>
</html>
