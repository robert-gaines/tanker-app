<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mission Entry</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">
  <link rel="stylesheet" href="../../style/custom/dynamic_form.css">
</head>

<body>
  <form method="post" action="#">
    <input class='form-control-sm text-center' type='text' onfocus="(this.type='date')" name='julian_date' value='' placeholder='Julian Date' required>
     <button type="submit" name="button">Submit</button>
  </form>
</body>

</html>

<?php

  include('../../db/dbconnect.php');
  date_default_timezone_set("America/Los_Angeles");
  function grabIP()
  {
     $client = @$_SERVER['HTTP_CLIENT_IP'];
     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
     $remote = $_SERVER['REMOTE_ADDR'];

     if(filter_var($client, FILTER_VALIDATE_IP))
     {
         $ip = $client;
     }
     else if(filter_var($forward, FILTER_VALIDATE_IP))
     {
         $ip = $forward;
     }
     else
     {
         $ip = $remote;
     }

     return $ip;
  }

  $visitor_ip = grabIP();
  //
  $user_name = "TEST";
  $day = date("Y-m-d");
  $time = date("h:i:sa");
  //
  //
  $log_query = "INSERT INTO ACCESS_DATA(SESSION_ID,USER_NAME,USER_IP,SESSION_DATE,SESSION_TIME)";
  $log_query .= "VALUES('','{$user_name}','{$visitor_ip}','{$day}','{$time}')";
  //
  $tx_log_query = mysqli_query($conn,$log_query);
?>
