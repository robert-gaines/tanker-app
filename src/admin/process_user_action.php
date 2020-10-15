<?php session_start() ?>
<?php include('session_checker_admin.php'); ?>
<?php include('../../db/dbconnect.php'); ?>

<?php

  function EnableUser($conn,$user_id)
  {
    $query    = "UPDATE USERS SET IS_INACTIVE='active' WHERE USER_ID='{$user_id}';";
    $tx_query = mysqli_query($conn,$query);
    echo $query;
  }

  function DisableUser($conn,$user_id)
  {
    $query    = "UPDATE USERS SET IS_INACTIVE='inactive' WHERE USER_ID='{$user_id}';";
    $tx_query = mysqli_query($conn,$query);
  }

  function DeleteUser($conn,$user_id)
  {
    $query    = "DELETE FROM USERS WHERE USER_ID='{$user_id}';";
    $tx_query = mysqli_query($conn,$query);
  }

  print_r($_POST);

  $keys = array_keys($_POST);

  $option = $keys[count($keys)-1];

  switch ($option) {
    case "user_id_enable":
        $user_id = $_POST['user_id_enable'];
        EnableUser($conn,$user_id);
        header("Location: manage_users.php");
        break;
    case "user_id_disable":
        $user_id = $_POST['user_id_disable'];
        DisableUser($conn,$user_id);
        header("Location: manage_users.php");
        break;
    case "user_id_edit":
        $_SESSION['user_id'] = $_POST['user_id_edit'];
        header("Location: edit_user.php");
        break;
    case "user_id_delete":
        $user_id = $_POST['user_id_delete'];
        DeleteUser($conn,$user_id);
        header("Location: manage_users.php");
        break;
    default:
        echo "Default";
    }

 ?>
