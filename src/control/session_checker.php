<?php

  function CheckSession($status,$admin_status)
  {
    if($status != 1 && $admin_status != 1)
    {
      header("Location: ../landing.html");
    }
  }

  CheckSession($_SESSION['valid_user'],$_SESSION['valid_admin']);

 ?>
