<?php session_start() ?>
<?php  ?>
<?php

  include('../../db/dbconnect.php');

  function parseEntries($jn,$bh,$tr,$ae,$ut,$dc,$cd,$cn,$ps,$gs,$cy,$arr)
  {
    $temp = array();
    $tempTwo = array();
    $entries = array($jn,$bh,$tr,$ae,$ut,$dc,$cd,$cn,$ps,$gs,$cy);
    $keys = array_keys($entries[0]);
    for($i=0;$i<count($keys);$i++)
    {
      foreach($entries as $e)
      {
        array_push($temp,$e[$i]);
      }
      array_push($tempTwo,$temp);
      $temp = array();
    }
    return $tempTwo;
  }

  function detectJettison()
  {
    foreach($_POST as $entry)
    {
      for($i = 0; $i < count($_POST['branch']);$i++)
      {
        if($_POST['jettison'][$i] !== 'no')
        {
           $a = array(0 => 'JETTISON');
           $b = array(0 => '');
           array_splice($_POST['branch'],$i,1,$b);
           array_splice($_POST['tail_number'],$i,1,$b);
           array_splice($_POST['acft_type'],$i,1,$b);
           array_splice($_POST['unit'],$i,1,$b);
           array_splice($_POST['dodaac'],$i,1,$a);
           array_splice($_POST['command'],$i,1,$b);
           array_splice($_POST['callsign'],$i,1,$b);
           array_splice($_POST['country'],$i,1,$b);
        }
      }
    }
  }

  detectJettison($_POST);

  print_r($_POST);

  if(isset($_POST['branch']))
  {
    $mission          = array();
    $transaction      = array();
    $mission_number   = $_POST['mission_number'];
    $host_tail        = $_POST['host_tail_number'];
    $host_unit        = $_POST['host_unit'];
    $host_station     = $_POST['home_station'];
    $host_command     = $_POST['host_command'];
    $boom_operator    = $_POST['boom_operator'];
    $transaction_date = $_POST['transaction_date'];
    $julian_date      = $_POST['julian_date'];
    $fuel_type        = $_POST['fuel_type'];
    //
    $jettison      = $_POST['jettison'];
    $branch        = $_POST['branch'];
    $tail_number   = $_POST['tail_number'];
    $acft_type     = $_POST['acft_type'];
    $unit          = $_POST['unit'];
    $dodaac        = $_POST['dodaac'];
    $command       = $_POST['command'];
    $callsign      = $_POST['callsign'];
    $country       = $_POST['country'];
    $pounds        = $_POST['lbs'];
    $gallons       = $_POST['gallons'];
  }
  else if(!isset($_POST['branch']))
  {
    echo "<script> alert('Incomplete Form!') </script>";
    header('Location: mission_entry.php');
  }
  else {
    echo "<script> alert('ERROR') </script>";
    header('Location: mission_entry.php');
  }
  /* Submit Mission Data */

  $mission_data_query = "INSERT INTO mission_data (MISSION_NUMBER, TAIL_NUMBER, UNIT, HOME_STATION, COMMAND, BOOM_OPERATOR, TRANSACTION_DATE, JULIAN_DATE, FUEL_TYPE)";
  $mission_data_query .= "VALUES ('{$mission_number}','{$host_tail}','{$host_unit}','{$host_station}','{$host_command}','{$boom_operator}','{$transaction_date}','{$julian_date}','{$fuel_type}');";
  $tx_mission_date = mysqli_query($conn,$mission_data_query);

  /* Submit Transaction Data */

  $transactions = array();

  $parsed_transactions = parseEntries($jettison,$branch,$tail_number,$acft_type,$unit,$dodaac,$command,$callsign,$pounds,$gallons,$country,$transactions);

  function SubmitTransactionEntries($arr,$mission_number,$conn)
  {
    foreach($arr as $entry)
    {
      $single_transaction = implode($entry,',');
      list($jettison,$branch,$tail_number,$acft_type,$unit,$dodaac,$command,$callsign,$pounds,$gallons,$country)=explode(',',$single_transaction);
      //
      $insert_query = "INSERT INTO transactions (TRANSACTION_ID,MISSION_NUMBER,JETTISON,TAIL_NUMBER,BRANCH,ACFT_TYPE,UNIT,DODAAC,COMMAND,CALLSIGN,POUNDS_DELIVERED,TOTAL_GALLONS,FMS_COUNTRY)";
      $insert_query .= "VALUES ('','{$mission_number}','{$jettison}','{$tail_number}','{$branch}','{$acft_type}','{$unit}','{$dodaac}','{$command}','{$callsign}','{$pounds}','{$gallons}','{$country}');";
      //
      $tx_transaction = mysqli_query($conn,$insert_query);
    }
  }

  SubmitTransactionEntries($parsed_transactions,$mission_number,$conn);

  header('Location: mission_entry.php');
    /*
    Transaction Data Table Fields
    -----------------------------
    TRANSACTION_ID (AUTO)
    MISSION_NUMBER
    JETTISON
    BRANCH
    ACFT_TYPE
    UNIT
    DODAAC
    COMMAND
    CALLSIGN
    POUNDS_DELIVERED
    TOTAL_GALLONS
    FMS_COUNTRY
    PRIMARY KEY
    */

    /*
    Mission Data Table Fields
    -------------------------
    MISSION_NUMBER
    TAIL_NUMBER
    UNIT
    HOME_STATION
    COMMAND
    BOOM_OPERATOR
    TRANSACTION_DATE
    JULIAN_DATE
    FUEL_TYPE
    */

?>
