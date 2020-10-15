
<?php

  include('../../db/dbconnect.php');

  $tail_query = "SELECT DISTINCT TAILNUMBER FROM acft_data";
  $tx_tail_query = mysqli_query($conn,$tail_query);
  $unit_query = "SELECT DISTINCT UNIT FROM acft_data";
  $tx_unit_query = mysqli_query($conn,$unit_query);

  // $table_query = "SELECT DISTINCT * FROM acft_data";
  // $tx_table_query = mysqli_query($conn,$table_query);
  // if($tx_table_query)
  // {
  //   while($row = mysqli_fetch_assoc($tx_table_query))
  //   {
  //     foreach($row as $k=>$v)
  //     {
  //       $id = $row['ACFT_ID'];
  //       $country = $row['ACFT_COUNTRY'];
  //       $type = $row['ACFT_TYPE'];
  //       $tail = $row['TAILNUMBER'];
  //       $unit = $row['UNIT'];
  //       $cmd = $row['CMD'];
  //       $dodaac = $row['DODAAC'];
  //       $location = $row['LOCATION'];
  //       $acft_array[$id] = array('TAIL'=>$tail,'UNIT'=>$unit,'DODAAC'=>$dodaac,'LOCATION'=>$location,'COUNTRY'=>$country,'TYPE'=>$type);
  //     }
  //   }
  // }

  function DisplayTailNumbers($tx_tail_query)
  {
    while($row = mysqli_fetch_assoc($tx_tail_query))
    {
      foreach($row as $k=>$v)
      {
        echo  "<option value='{$v}'> '{$v}' </option>";
      }
    }
  }

  function DisplayList($arr)
  {
   echo '<select class="form-control-sm mb-2" name="branch" style="margin-left: -105px; margin-right: 50px;">';
   echo '<option value="" disabled selected hidden>Branch</option>';
   foreach($arr as $a)
   {
     echo "<option value=''>$a</option>";
   }
   echo '</select>';
  }

  function DisplayUnits($tx_unit_query)
  {
    $arr=array();
    while($row = mysqli_fetch_assoc($tx_unit_query))
    {
      foreach($row as $k=>$v)
      {
        array_push($arr,$v);
      }
    }
    return $arr;
  }
  //$unit_array = DisplayUnits($tx_unit_query);
  //DisplayList($unit_array);
  //print_r($unit_array);
  // $unit_array = DisplayUnits($tx_unit_query);
  //
  //foreach($unit_array as $u){echo "<option value='$u'>$u</option>";}
  $alt_unit_query = "SELECT DISTINCT UNIT FROM acft_data";
  $tx_alt_unit_query = mysqli_query($conn,$alt_unit_query);

  $row = mysqli_fetch_assoc($tx_alt_unit_query);

  while($row = mysqli_fetch_assoc($tx_alt_unit_query))
  {
    foreach($row as $r)
    {
      echo strlen($row['UNIT']);
      echo "<br>";
      $str = substr($r,0,strlen($r));
      echo $str."<br>";
    }
  }
  // echo '<select class="form-control-sm mb-2" name="branch" style="margin-left: -105px; margin-right: 50px;">';
  // echo '<option value="" disabled selected hidden>Unit</option>';
  // while($row = mysqli_fetch_assoc($tx_alt_unit_query))
  // {
  //   foreach($row as $r)
  //   {
  //     echo "<option value=''>$r</option>";
  //   }
  // }
  // echo '</select>';
 ?>
