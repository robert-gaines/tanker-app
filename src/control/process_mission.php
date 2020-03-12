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

  if(isset($_POST))
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
    if(!(isset($_POST['jettison'])))
    {
      $jettison = array();
    }
    else
    {
      $jettison = $_POST['jettison'];
    }
    //
    $branch        = $_POST['branch'];
    $tail_number   = $_POST['tail_number'];
    $acft_type     = $_POST['acft_type'];
    $unit          = $_POST['unit'];
    $dodaac        = $_POST['dodaac'];
    $command       = $_POST['command'];
    $callsign      = $_POST['callsign'];
    $pounds        = $_POST['lbs'];
    $gallons       = $_POST['gallons'];
    $country       = $_POST['country'];

    if(count($jettison) <= count($branch))
    {
      while(count($jettison) < count($branch))
      {
        $i = 0;
        if($jettison[$i] != '1')
        {
          array_splice($jettison,$i+1,0,'False');
        }
        $i++;
      }
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
        // print_r($entry);
        // echo "<br>";
        $single_transaction = implode($entry,',');
        list($jettison,$branch,$tail_number,$acft_type,$unit,$dodaac,$command,$callsign,$pounds,$gallons,$country)=explode(',',$single_transaction);
        //
        $insert_query = "INSERT INTO transactions (TRANSACTION_ID,MISSION_NUMBER,JETTISON,TAIL_NUMBER,BRANCH,ACFT_TYPE,UNIT,DODAAC,COMMAND,CALLSIGN,POUNDS_DELIVERED,TOTAL_GALLONS,FMS_COUNTRY)";
        $insert_query .= "VALUES ('','{$mission_number}','{$jettison}','{$tail_number}','{$branch}','{$acft_type}','{$unit}','{$dodaac}','{$command}','{$callsign}','{$pounds}','{$gallons}','{$country}');";
        //
        $tx_transaction = mysqli_query($conn,$insert_query);
          if($tx_transaction)
          {
            echo "[*] Records updated";
          }
          else {
            echo "[!] Query failed [!]";
            echo "<script> alert('QUERY FAILED') </script>";
          }


      }
    }

    SubmitTransactionEntries($parsed_transactions,$mission_number,$conn);

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
  }
  else {
    echo "ERROR";
  }

?>
