<?php

  include("../../db/dbconnect.php");

  function CheckUsername($conn,$username)
  {
    $query    = "SELECT * FROM USERS WHERE USER_NAME='{$username}';";
    $tx_query = mysqli_query($conn,$query);
    if(mysqli_num_rows($tx_query) == 1)
    {
      return True;
    }
    else
    {
      return False;
    }
  }

  function StrengthChecker($pass)
  {

      $lowerCase    = 0;
      $upperCase    = 0;
      $digits       = 0;
      $specialChars = 0;
      for($i = 0; $i < strlen($pass);$i++)
      {
        if(ctype_upper($pass[$i]))
        {
          $upperCase++;
        }
        if(ctype_lower($pass[$i]))
        {
          $lowerCase++;
        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass[$i]))
        {
          $specialChars++;
        }

      }
      if(strlen($pass) >= 12 && $lowerCase >= 2 && $upperCase >= 2 && $specialChars >= 2)
      {
        return True;
      }
      else
      {
        return False;
      }
  }
  if(!(StrengthChecker($_POST['user_pass'])) || $_POST['user_pass'] !== $_POST['user_pass_confirm'])
  {
      $var  = "WARNING: The passwords entered either do not match ";
      $var .= "or they have failed to meet the complexity requirements! ";
      $var .= "Passwords must be 12 characters or longer and contain ";
      $var .= "two upper case, two lower case, and at least two special ";
      $var .= "characters.";
      echo "<script> alert('$var')</script>";
      echo "<script> window.location.replace('../landing.html'); </script>";
  }
  else if(!(CheckUsername($conn,$_POST['username'])))
  {
    echo "<script> alert('WARNING: Failed to locate user!')</script>";
    echo "<script> window.location.replace('../landing.html'); </script>";
  }
  else if((StrengthChecker($_POST['user_pass'])) && $_POST['user_pass'] === $_POST['user_pass_confirm'])
  {

      $user_pass        = $_POST['user_pass'];
      $user_name        = $_POST['username'];
      $user_pass        = password_hash($user_pass, PASSWORD_BCRYPT);

      $change_pw_query    = "UPDATE USERS SET USER_PASS='{$user_pass}' WHERE USER_NAME='{$user_name}';";
      $tx_change_pw_query = mysqli_query($conn,$change_pw_query);

      if($tx_change_pw_query)
      {
        echo "<script> alert('Password Successfully Changed')</script>";
        echo "<script> window.location.replace('../landing.html'); </script>";
      }
      else
      {
        echo "<script> alert('ALERT: Password was not changed!')</script>";
        echo "<script> window.location.replace('../landing.html'); </script>";
      }
  }
  else
  {
    echo "<script> window.location.replace('../landing.html'); </script>";
  }


 ?>
