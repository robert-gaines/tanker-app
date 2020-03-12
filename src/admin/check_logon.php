<?php

  include("../../db/dbconnect.php");

  session_start();

  function CheckCredentials($pass,$db_pass)
  {
    if(password_verify($pass,$db_pass))
    {
      return True;
    }
    else
    {
      return False;
    }
  }

  function CheckStatus($db_status)
  {
    if($db_status === 'active')
    {
      return True;
    }
    else
    {
      return False;
    }
  }

  function CheckAdmin($admin_status)
  {
    if($admin_status === 'administrator')
    {
      return True;
    }
    else
    {
      return False;
    }
  }

  if(isset($_POST))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    /* Query the user database */
    $access_query    = "SELECT * FROM users WHERE USER_NAME='{$username}';";
    $tx_access_query = mysqli_query($conn,$access_query);
    /* Retrieve the user's data and parse it out */
    if($tx_access_query)
    {
      while($row = mysqli_fetch_assoc($tx_access_query))
      {
        $user_id          = $row['USER_ID'];
        $user_first       = $row['USER_FIRST'];
        $user_last        = $row['USER_LAST'];
        $user_rank        = $row['USER_RANK'];
        $user_description = $row['DESCRIPTION'];
        $admin_status     = $row['ISADMIN'];
        $user_pass        = $row['USER_PASS'];
        $status           = $row['IS_INACTIVE'];
      }
      if(CheckCredentials($password,$user_pass) && CheckStatus($status))
      {
        $_SESSION['user_first']  = $user_first;
        $_SESSION['user_last']   = $user_last;
        $_SESSION['user_rank']   = $user_rank;

        if(CheckAdmin($admin_status))
        {
          $_SESSION['valid_admin'] = True;
          $_SESSION['valid_user']  = True;
          header("Location: admin-landing.php");
        }
        else
        {
          $_SESSION['valid_user'] = True;
          header("Location: ../model/user-landing.php");
        }
      }
      else
      {
        header("Location: ../landing.html");
      }
    }
    else
    {
      header("Location: ../landing.html");
    }
  }
  else {
    header("Location: ../landing.html");
  }

 ?>
