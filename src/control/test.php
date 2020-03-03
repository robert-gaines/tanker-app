
<?php
  include('../../db/dbconnect.php');
  $tail_number_query = "SELECT * FROM acft_data";
  $tx_tn_query = mysqli_query($conn,$tail_number_query);
  while($row = mysqli_fetch_assoc($tx_tn_query))
  {
    foreach($row as $entry => $value)
    {
      echo $row['UNIT']."<br>";
    }
  }
 ?>
