<?php

  function CheckSession($status)
  {
    if($status != 1)
    {
      header("Location: ../landing.html");
    }
  }
  CheckSession($_SESSION['valid_admin']);

 ?>
