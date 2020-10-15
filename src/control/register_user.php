<?php

  include("../../db/dbconnect.php");

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
  else if((StrengthChecker($_POST['user_pass'])) && $_POST['user_pass'] === $_POST['user_pass_confirm'])
  {
      $user_first       = $_POST['user_first'];
      $user_last        = $_POST['user_last'];
      $user_rank        = $_POST['user_rank'];
      $user_pass        = $_POST['user_pass'];
      $user_name        = $_POST['username'];
      $user_pass        = password_hash($user_pass, PASSWORD_BCRYPT);
      $user_description = 'web registered user';
      $admin            = 'non-administrator';
      $is_boom          = $_POST['is_boom_opr'];
      $status           = 'inactive';

      $add_query  = "INSERT INTO USERS (USER_ID,USER_FIRST,USER_LAST,USER_RANK,USER_NAME,DESCRIPTION,ISADMIN,IS_BOOM,USER_PASS,IS_INACTIVE)";
      $add_query .= "VALUES(DEFAULT,'{$user_first}','{$user_last}','{$user_rank}','{$user_name}','{$user_description}','{$admin}','{$is_boom}','{$user_pass}','{$status}');";
      $tx_add_query = mysqli_query($conn,$add_query);

      if($tx_add_query)
      {
        echo "<script> alert('Registration successsful - account will require activation by an administrator')</script>";
        echo "<script> window.location.replace('../landing.html'); </script>";
      }
      else
      {
        echo "<script> alert('ALERT: User was not added!')</script>";
        echo "<script> window.location.replace('../landing.html'); </script>";
      }
  }
  else
  {
    echo "<script> window.location.replace('../landing.html'); </script>";
  }

 ?>
