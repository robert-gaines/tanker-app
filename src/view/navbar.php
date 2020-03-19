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

        img
        {
            border-radius: 2px;
        }

        .dropdown-menu
        {
          background-color: lightgray;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <img class="fa fa-plane" alt="#">
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto">
   <li class="nav-item">
    <a class="nav-link" href="../model/user-landing.php">Home</a>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Submit</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../control/mission_entry.php">Mission Data</a>
    </div>
  </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">View</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Mission Data</a>
      <a class="dropdown-item" href="../model/view_aircraft.php">Aircraft</a>
      <a class="dropdown-item" href="#">WRDCO</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Export</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../control/export_select.php">Mission Data</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="../admin/logout.php">Logout</a>
   </li>
    </ul>
  </div>
</nav>
</body>
</html>
