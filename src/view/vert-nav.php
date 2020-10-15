<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="../style/bootstrap/dist/css/bootstrap.css">
    <script src="../style/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../style/custom/custom.css">

    <style>

    body
        {
            background-color: black;
        }


    .icon-bar {
        width: 120px; /* Set a specific width */
        background-color: #555; /* Dark-grey background */
        border-bottom-right-radius: 5px;
     }
    .icon-bar a {
            display: block;
            text-align: center;
            padding: 16px;
            transition: all 0.3s ease;
            color: white;
            font-size: 18px;
        }
    .icon-bar a:hover {
        background-color: #000;
        }
    .active {
        background-color: lightgray;
       }
    </style>

</head>
<body>
 <div class="icon-bar">
  <div class="icon-bar">
  <a href="admin-main.php"><i class="fa fa-home"></i></a>
  <a href="../Control/admin-users.php"><i class="fa fa-user-circle-o"></i></a>
  <a href="../Control/scheduled-sessions.php"><i class="fa fa-calendar"></i></a>
  <a href="../Control/ip-data.php"><i class="fa fa-server"></i></a>
  <a href="../Control/process-logout.php"><i class="fa fa-power-off"></i></a>
  </div>
 </div>
</body>
</html>
