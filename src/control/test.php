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

  function ConvertDate($date)
  {
    $segments = explode('-',$date);
    $newDate  = gregoriantojd($segments[1],$segments[2],$segments[0]);
    return $newDate;
  }

  function RetrieveUnit($var,$conn)
  {
    $query = "SELECT UNIT FROM acft_data WHERE TAILNUMBER='{$var}';";
    $tx_query = mysqli_query($conn,$query);
    if($tx_query)
    {
      while($row = mysqli_fetch_assoc($tx_query))
      {
        return $row['UNIT'];
      }
    }
  }

  function RetrieveCommand($var,$conn)
  {
    $query = "SELECT CMD FROM acft_data WHERE TAILNUMBER='{$var}';";
    $tx_query = mysqli_query($conn,$query);
    if($tx_query)
    {
      while($row = mysqli_fetch_assoc($tx_query))
      {
        return $row['CMD'];
      }
    }
  }

  function RetrieveStation($var,$conn)
  {
    $query = "SELECT LOCATION FROM acft_data WHERE TAILNUMBER='{$var}';";
    $tx_query = mysqli_query($conn,$query);
    if($tx_query)
    {
      while($row = mysqli_fetch_assoc($tx_query))
      {
        return $row['LOCATION'];
      }
    }
  }

$x = RetrieveUnit('78000582',$conn);
$y = RetrieveCommand('78000582',$conn);
$z = RetrieveStation('78000582',$conn);

echo $x.$y.$z;

function findStation(val)
{
  setCookie('host_station',val,1);
  var julian_date = <?php echo json_encode(ConvertDate($_COOKIE['date'])); ?>;
  document.getElementById("julian_date").value = julian_date;
}

function findCommand(val)
{
  setCookie('host_command',val,1);
  var julian_date = <?php echo json_encode(ConvertDate($_COOKIE['date'])); ?>;
  document.getElementById("julian_date").value = julian_date;
}

function findUnit(val)
{
  setCookie('host_unit',val,1);
  var host_unit = <?php echo json_encode(RetrieveUnit($_COOKIE['host_unit'])); ?>;
  document.getElementById("host_unit").value = host_unit;
}


function RetrieveUnit($var,$conn)
{
  $query = "SELECT UNIT FROM acft_data WHERE TAILNUMBER='{$var}';";
  $tx_query = mysqli_query($conn,$query);
  if($tx_query)
  {
    while($row = mysqli_fetch_assoc($tx_query))
    {
      return $row['UNIT'];
    }
  }
}

function RetrieveCommand($var,$conn)
{
  $query = "SELECT CMD FROM acft_data WHERE TAILNUMBER='{$var}';";
  $tx_query = mysqli_query($conn,$query);
  if($tx_query)
  {
    while($row = mysqli_fetch_assoc($tx_query))
    {
      return $row['CMD'];
    }
  }
}

function RetrieveStation($var,$conn)
{
  $query = "SELECT LOCATION FROM acft_data WHERE TAILNUMBER='{$var}';";
  $tx_query = mysqli_query($conn,$query);
  if($tx_query)
  {
    while($row = mysqli_fetch_assoc($tx_query))
    {
      return $row['LOCATION'];
    }
  }
}
 ?>
