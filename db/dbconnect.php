<?php

  /* Establish a connection with the database */

  $host = "127.0.0.1";
  $user = "phpmyadmin";
  $pass = "P@ssw0rd!P@ssw0rd!";
  $db   = "tanker_app";

  $conn = mysqli_connect($host,$user,$pass,$db);

  if($conn)
  {
    /* echo "[*] Good connection"; */
  }
  else {
    /* echo "[!] Failed to Connect"; */
  }

 ?>
