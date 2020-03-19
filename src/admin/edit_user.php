<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit User</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <?php session_start()                       ?>
  <?php include('session_checker_admin.php'); ?>
  <?php include('../view/admin-navbar.php');  ?>
  <?php include('../../db/dbconnect.php');    ?>
  <?php error_reporting(0); ?>
  <?php

    $user_id  = $_SESSION['user_id'];
    $query    = "SELECT * FROM users WHERE USER_ID={$user_id}";
    $tx_query = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($tx_query))
    {
      $first_name  = $row['USER_FIRST'];
      $last_name   = $row['USER_LAST'];
      $user_rank   = $row['USER_RANK'];
      $user_name   = $row['USER_NAME'];
      $description = $row['DESCRIPTION'];
      $admin       = $row['ISADMIN'];
      $boom        = $row['IS_BOOM'];
      if($boom == '')
      {
        $boom = 'Other User';
      }
      $status      = $row['IS_INACTIVE'];
      $password    = $row['USER_PASS'];
    }

   ?>
  <style media="screen">

    h5
    {
      margin-top: 10px;
      margin-bottom: 20px;
      text-decoration: underline;
      background-color: darkgray;
      border-radius: 5px;
      width: 50%;
    }

    form
    {
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
      <h5 class="mx-auto text-center">User Account Editing</h5>
      <hr>
     <div class="form-group text-center">
       <input class="form-control-lg text-center col-sm-4" type="text" name="user_first" value="<?php echo $first_name ?>" required>
     </div>
     <div class="form-group text-center">
       <input class="form-control-lg text-center col-sm-4" type="text" name="user_last" value="<?php echo $last_name ?>" required>
     </div>
     <div class="form-group text-center">
       <select class="form-group form-control-lg col-sm-4 text-center" name="user_rank" required>
         <?php echo "<option value='$user_rank' selected>$user_rank</option>" ?>
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
     <div class="form-group text-center">
       <select class="form-group form-control-lg text-center col-sm-4" name="is_boom_opr" required>
         <?php echo "<option value='$boom' selected>$boom</option>" ?>
         <option value="boom">Boom Operator</option>
         <option value="non-boom">Other User</option>
       </select>
     </div>
     <div class="from-group text-center" style="margin-bottom: 5px;">
       <select class="form-group form-control-lg col-sm-4 text-center" name="isAdmin" required>
        <?php echo "<option value='$admin' selected>$admin</option>" ?>
        <option value="administrator">Administrator</option>
        <option value="non-administrator">Non-Administrator</option>
       </select>
     </div>
     <div class="form-group text-center" style="margin-top: -5px;">
       <input class="form-control-lg text-center col-sm-4" type="text" name="description" value="<?php echo $description ?>" required>
     </div>
     <div class="form-group text-center" style="margin-top: -5px;">
       <input class="form-group form-control-lg col-sm-4 text-center" type="text" name="user_name" value="<?php echo $user_name ?>" required>
     </div>
     <div class="form-group text-center" style="margin-top: -15px;">
       <input class="form-control-lg text-center col-sm-4" type="password" name="user_pass" value="<?php echo $password ?>" placeholder="Enter a Password" required>
     </div>
     <div class="form-group text-center" style="margin-top: 5px;">
       <input class="form-control-lg text-center col-sm-4" type="password" name="user_pass_two" value="<?php echo $password ?>" placeholder="Re-enter Password" required>
     </div>
     <div class="from-group text-center">
       <select class="form-group form-control-lg col-sm-4 text-center" name="status" required>
        <?php echo "<option value='$status' selected>$status</option>" ?>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
       </select>
     </div>
     <div class="form-group text-center" style="margin-top: 10px;">
       <button type="reset" class="btn btn-danger col-sm-3"> Reset </button>
       <button type="submit" class="btn btn-primary col-sm-3" name="update">Submit</button>
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

    if(isset($_POST['update']))
    {
      if(StrengthChecker($_POST['user_pass']) && PasswordCheck($_POST['user_pass'],$_POST['user_pass_two']))
      {
        $update_user_first       = $_POST['user_first'];
        $update_user_last        = $_POST['user_last'];
        $update_user_rank        = $_POST['user_rank'];
        $update_user_name        = $_POST['user_name'];
        //
        if($password !== $update_user_pass)
        {
            $update_user_pass = password_hash($password, PASSWORD_BCRYPT);
        }
        else
        {
           $update_user_pass = $password;
        }
        $update_user_description = $_POST['description'];
        $update_admin            = $_POST['isAdmin'];
        $update_is_boom          = $_POST['is_boom_opr'];
        $update_status           = $_POST['status'];

        $update_query =  "UPDATE users";
        $update_query .= " SET USER_FIRST='{$update_user_first}',USER_LAST='{$update_user_last}',USER_RANK='{$update_user_rank}',USER_NAME='{$update_user_name}',DESCRIPTION='{$update_user_description}',ISADMIN='{$update_admin}',IS_BOOM='{$update_is_boom}',USER_PASS='{$update_user_pass}',IS_INACTIVE='{$update_status}'";
        $update_query .= " WHERE USER_NAME='{$user_name}';";
        $tx_update_query = mysqli_query($conn,$update_query);

        if($tx_update_query)
        {
          echo "<script> alert('User Account Updated')</script>";
        }
        else
        {
          echo "<script> alert('ALERT: User account was not updated!')</script>";
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
   ?>

 </body>
</html>
