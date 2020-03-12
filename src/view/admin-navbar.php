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
                background-color: lightgray;
            }


        .icon-bar {
            width: 100px; /* Set a specific width */
            height: 500px;
            margin-right: 200px;
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
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span><img src="#" alt="#"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto">
   <li class="nav-item">
    <a class="nav-link" href="../admin/admin-landing.php">Home</a>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Submit</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../control/mission_entry.php">Mission Data</a>
    </div>
  </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Query</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Mission Data</a>
      <a class="dropdown-item" href="#">Boom Operators</a>
      <a class="dropdown-item" href="#">WRDCO</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Export</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../control/export_select.php">Mission Data</a>
      <a class="dropdown-item" href="#">Boom Operators</a>
      <a class="dropdown-item" href="#">WRDCO Data</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Identity</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../admin/add_user.php">Add User</a>
      <a class="dropdown-item" href="#">Query User</a>
      <a class="dropdown-item" href="#">Edit/Remove User</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="../admin/logout.php">Logout</a>
   </li>
    </ul>
  </div>
</nav>
<div class="icon-bar bg-dark">
 <div class="icon-bar">
 <a href="admin-main.php"><i class="fa fa-home"></i></a>
 <a href="../Control/admin-users.php"><i class="fa fa-user-circle-o"></i></a>
 <a href="../Control/scheduled-sessions.php"><i class="fa fa-plane"></i></a>
 <a href="../Control/ip-data.php"><i class="fa fa-folder"></i></a>
 <a href="../Control/ip-data.php"><i class="fa fa-server"></i></a>
 <a href="../Control/ip-data.php"><i class="fa fa-crosshairs"></i></a>
 <a href="../admin/logout.php"><i class="fa fa-power-off"></i></a>
 </div>
</div>
</body>
</html>
