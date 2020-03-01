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
    <span><img src="../Style/Images/logo4.PNG" alt="QD"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto">
   <li class="nav-item">
    <a class="nav-link" href="#">Home</a>
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
      <a class="dropdown-item" href="#">Boom Operators</a>
      <a class="dropdown-item" href="#">WRDCO Data</a>
      <a class="dropdown-item" href="#">Mission Data</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Identity</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Add User</a>
      <a class="dropdown-item" href="#">Query User</a>
      <a class="dropdown-item" href="#">Edit/Remove User</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="logout.php">Logout</a>
   </li>
    </ul>
  </div>
</nav>
</body>
</html>
