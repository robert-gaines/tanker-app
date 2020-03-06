
<?php

    /*
       This script imports domestic
       and international aircraft data
       into a MySQL Database
    */

    function CheckFMS($arr)
    {
      $value = in_array('Country',$arr);
      return $value;
    }

    function CheckCMD($arr)
    {
      $value = array_search('cmd',array_map('strtolower',$arr));
      return $value;
    }

    function StandardizeFields($arr)
    {
      $fms = CheckFMS($arr);
      $cmd = CheckCMD($arr);
      if(!$fms)
      {
        array_splice($arr,0,0,'Country');
        return $arr;
      }
      elseif(!$cmd)
      {
        array_splice($arr,4,0,'Command');
        return $arr;
      }
      else
      {
        return $arr;
      }
    }

    function InsertCountry($arr)
    {
      array_splice($arr,0,0,'USA');
      return $arr;
    }

    function InsertCommand($arr)
    {
      array_splice($arr,4,0,'Foreign Command');
      return $arr;
    }

    function CheckString($input)
    {
      $allChars = true;
      for($i = 0; $i < strlen($input); $i++)
      {
          $test = ctype_digit($input[$i]);
          if($test)
          {
            $allChars = false;
          }
      }
      return $allChars;
    }

    function StandardizeLength($arr1,$arr2)
    {
      $len1 = count($arr1);
      $len2 = count($arr2);
      if($len2 < $len1)
      {
        while($len1 <= $len2+1)
        {
          array_push($arr2,"NULL");
          $len1++;
        }
      }
      return $arr2;
    }

    include('..\xlsx\simplexlsx\src\SimpleXLSX.php');
    include('dbconnect.php');
    /* Attempt to import and parse the workbook */

    $xlsx = SimpleXLSX::parse('../raw/acft.xlsx');

    $sheetCount = count($xlsx->sheetNames());

    for($i = 0; $i < $sheetCount; $i++)
    {
      $sheet   = $xlsx->rows($i);
      $fields  = array();
      for($j = 0; $j < count($sheet[$j]); $j++)
      {
        array_push($fields,$sheet[0][$j]);
      }
      $uniform_fields = StandardizeFields($fields);
      $condensed_fields = implode(",",$uniform_fields);
      $extended_fields = explode(",",$condensed_fields);
      /* Define the Fields for the Aircraft Database */
      $COUNTRY =  $extended_fields[0];
      $TYPE    =  $extended_fields[1];
      $TAIL    =  $extended_fields[2];
      $UNIT    =  $extended_fields[3];
      $COMMAND =  $extended_fields[4];
      $DODAAC  =  $extended_fields[5];
      $LOCATION = $extended_fields[6];
      /* Parse out the record data */
      for($x = 1; $x < count($sheet); $x++)
      {
        for($y = 0;$y < count($sheet[$x])-(count($sheet[$x])-1); $y++)
        {
            if(!($test = CheckString($sheet[$x][0])))
            {
                $uniform_records = InsertCountry($sheet[$x]);
            }
            else if(!($test = CheckString($sheet[$x][4])))
            {
              $uniform_records = InsertCommand($sheet[$x]);
            }
            else
            {
              $uniform_records = $sheet[$x];
            }
            /* Disposition of Records:
               0-> Country
               1-> Aircraft
               2-> TailNumber
               3-> Unit
               4-> Command
               5-> DODAAC
               6-> Base
            */
            for($k = 0; $k < count($uniform_records);$k++)
            {
              if($uniform_records[$k] == null)
              {
                $uniform_records[$k] = "NULL";
              }
              if(count($uniform_records) < count($extended_fields))
              {
                $uniform_records = StandardizeLength($extended_fields,$uniform_records);
              }
            }
            /* Individual Record Values */
            $ac_country  = $uniform_records[0];
            $ac_type     = $uniform_records[1];
            $ac_tail     = $uniform_records[2];
            $ac_unit     = $uniform_records[3];
            $ac_command  = $uniform_records[4];
            $ac_dodaac   = $uniform_records[5];
            $ac_location = $uniform_records[6];
            /* Insert Statement */
            $insert_query = "INSERT INTO ACFT_DATA ( ACFT_ID,
                                                     ACFT_COUNTRY,
                                                     ACFT_TYPE,
                                                     TAILNUMBER,
                                                     UNIT,
                                                     CMD,
                                                     DODAAC,
                                                     LOCATION)
                                            VALUES ('',
                                              '{$ac_country}',
                                              '{$ac_type}',
                                              '{$ac_tail}',
                                              '{$ac_unit}',
                                              '{$ac_command}',
                                              '{$ac_dodaac}',
                                              '{$ac_location}');";
            /* Send the Query */
            $tx_query = mysqli_query($conn,$insert_query);
            /* Check the response */

            if($tx_query)
            {
              echo "[*] Query Transmitted Successfully "."<br>";
            }
            else
            {
              echo "[!] Failed to send transmission "."<br>";
              echo "[!] Error: ".mysqli_error($conn);
            }
      }
     }
    }
 ?>
