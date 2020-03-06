
<?php

  include('../../db/dbconnect.php');

  $table_query = "SELECT DISTINCT * FROM acft_data";

  $tx_table_query = mysqli_query($conn,$table_query);

  $acft_array = array();

  if($tx_table_query)
  {
    while($row = mysqli_fetch_assoc($tx_table_query))
    {
      foreach($row as $k=>$v)
      {
        $id = $row['ACFT_ID'];
        $country = $row['ACFT_COUNTRY'];
        $type = $row['ACFT_TYPE'];
        $tail = $row['TAILNUMBER'];
        $unit = $row['UNIT'];
        $cmd = $row['CMD'];
        $dodaac = $row['DODAAC'];
        $location = $row['LOCATION'];
        $acft_array[$id] = array('TAIL'=>$tail,'UNIT'=>$unit,'DODAAC'=>$dodaac,'LOCATION'=>$location,'COUNTRY'=>$country,'TYPE'=>$type);
      }
    }
  }

  //print_r($acft_array);

  function QueryByTail($arr,$value)
  {
    $search = FALSE;
    $index = '';
    $subject = '';
    for($i = 1; $i < count($arr);$i++)
    {
      for($j = 0; $j < count($arr[$i]);$j++)
      {
        if(array_search($value,$arr[$i],$strict=TRUE))
        {
          $index = $arr[$i]['TAIL'];
          $subject = $arr[$i];
        }
      }
      $j = 0;
    }
    echo $index."<br>";
    print_r($subject);
  }

  QueryByTail($acft_array,'065');
 ?>
