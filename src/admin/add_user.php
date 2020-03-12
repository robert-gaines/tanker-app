<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add User</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <?php session_start()                       ?>
  <?php include('session_checker_admin.php'); ?>
  <?php include('../view/admin-navbar.php');  ?>
  <?php include('../../db/dbconnect.php');    ?>
  <style media="screen">

    h5
    {
      margin-top: -310px;
      margin-bottom: 20px;
      text-decoration: underline;
      background-color: darkgray;
      border-radius: 5px;
      width: 50%;
    }

    form
    {
      margin-top: -499px;
      margin-left: 100px;
      background-color: darkgray;
      width: 75%;
    }
    input
    {
      margin: 0 auto;
    }
  </style>
</head>
 <body>

   <div>
    <form class="mx-auto col-sm-8" action="#" method="post">
      <h5 class="mx-auto text-center">User Registration</h5>
      <hr>
     <div class="form-group text-center">
       <input class="form-control-lg text-center col-sm-4" type="text" name="user_first" value="" placeholder="First Name" required>
     </div>
     <div class="form-group text-center">
       <input class="form-control-lg text-center col-sm-4" type="text" name="user_last" value="" placeholder="Last Name" required>
     </div>
     <div class="form-group text-center">
       <select class="form-group form-control-lg col-sm-4 text-center" name="user_rank" required>
         <option value=""disabled selected>Rank</option>
         <option value="AB">AB</option>
         <option value="A1C">A1C</option>
         <option value="SrA">SrA</option>
         <option value="SSgt">SSgt</option>
         <option value="TSgt">TSgt</option>
         <option value="MSgt">MSgt</option>
         <option value="SMSgt">SMSgt</option>
         <option value="CMSgt">CMSgt</option>
         <option value="2LT">2LT</option>
         <option value="1LT">1LT</option>
         <option value="CPT">CPT</option>
         <option value="MAJ">MAJ</option>
         <option value="LTCOL">LTCOL</option>
         <option value="COL">COL</option>
         <option value="BG">BG</option>
         <option value="MG">MG</option>
         <option value="LG">LG</option>
         <option value="GEN">GEN</option>
         <option value="CIV">CIV</option>
         <option value="OTHER">OTHER</option>
       </select>
     </div>
     <div class="form-group text-center" style="margin-top: -15px;">
       <input class="form-control-lg text-center col-sm-4" type="text" name="description" value="" placeholder="Description" required>
     </div>
     <div class="from-group text-center" style="margin-bottom: 5px;">
       <select class="form-group form-control-lg col-sm-4 text-center" name="isAdmin" required>
        <option value="" hidden disabled selected>Administrator?</option>
        <option value="administrator">Administrator</option>
        <option value="non-administrator">Non-Administrator</option>
       </select>
     </div>
     <div class="form-group text-center" style="margin-top: -5px;">
       <input class="form-group form-control-lg col-sm-4 text-center" type="text" name="user_name" value="" placeholder="User Name" required>
     </div>
     <div class="form-group text-center" style="margin-top: -15px;">
       <input class="form-control-lg text-center col-sm-4" type="password" name="user_pass" value="" placeholder="Enter a Password" required>
     </div>
     <div class="form-group text-center" style="margin-top: 5px;">
       <input class="form-control-lg text-center col-sm-4" type="password" name="user_pass_two" value="" placeholder="Re-enter Password" required>
     </div>
     <div class="from-group text-center">
       <select class="form-group form-control-lg col-sm-4 text-center" name="status" required>
        <option value="" hidden disabled selected>Status</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
       </select>
     </div>
     <div class="form-group text-center" style="margin-top: 10px;">
       <button type="reset" class="btn btn-danger col-sm-3"> Reset </button>
       <button type="submit" class="btn btn-primary col-sm-3" name="login">Submit</button>
       <br><br><br>
     </div>
   </div>
  </form>

  <?php

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

    function PasswordCheck($str1,$str2)
    {
      if($str1 === $str2)
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
      if(StrengthChecker($_POST['user_pass']) && PasswordCheck($_POST['user_pass'],$_POST['user_pass_two']))
      {
        $user_first       = $_POST['user_first'];
        $user_last        = $_POST['user_last'];
        $user_rank        = $_POST['user_rank'];
        $user_pass        = $_POST['user_pass'];
        $user_name        = $_POST['user_name'];
        $user_pass        = password_hash($user_pass, PASSWORD_BCRYPT);
        $user_description = $_POST['description'];
        $admin            = $_POST['isAdmin'];
        $status           = $_POST['status'];

        $add_query  = "INSERT INTO users (USER_ID,USER_FIRST,USER_LAST,USER_RANK,USER_NAME,DESCRIPTION,ISADMIN,USER_PASS,IS_INACTIVE)";
        $add_query .= "VALUES('','{$user_first}','{$user_last}','{$user_rank}','{$user_name}','{$user_description}','{$admin}','{$user_pass}','{$status}');";
        $tx_add_query = mysqli_query($conn,$add_query);

        if($tx_add_query)
        {
          echo "<script> alert('User Added')</script>";
        }
        else
        {
          echo "<script> alert('ALERT: User was not added!')</script>";
        }
      }
      else
      {
        $var  = "WARNING: The passwords entered either do not match ";
        $var .= "or they have failed to meet the complexity requirements! ";
        $var .= "Passwords must be 12 characters or longer and contain ";
        $var .= "two upper case, two lower case, and at least two special ";
        $var .= "characters.";
        echo "<script> alert('$var')</script>";
      }
    }
    else
    {
      echo "<script> alert('Error!') </script>";
    }

   ?>
 </body>
</html>
