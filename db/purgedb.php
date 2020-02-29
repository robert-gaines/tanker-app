
<?php

  include('dbconnect.php');

  /* TABLE INVENTORY */

  /*
    -> ACFT_DATA
    -> USERS
    -> WRDCO
    -> TRANSACTIONS
    -> MISSION_DATA
  */

  /*
     Script is designed to remove
     all of the database tables for
     tanker application
  */

  $table_array = array(
                        "ACFT_DATA",
                        "USERS",
                        "WRDCO",
                        "TRANSACTIONS",
                        "MISSION_DATA"
                      );

  for($i = 0; $i < count($table_array);$i++)
  {
    $table = $table_array[$i];
    $drop_table_query = "DROP TABLE {$table}";
    $drop_query = mysqli_query($conn,$drop_table_query);
    if($drop_query)
    {
      echo "[*] Dropped Table: $table "."<br>";
    }
    else
    {
      echo "[!] Failed to drop table: $table "."<br>";
    }
  }

 ?>
