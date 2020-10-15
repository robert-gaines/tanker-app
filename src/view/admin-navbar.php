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
    <i class="fa fa-plane"></i>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto">
   <li class="nav-item">
    <a class="nav-link" href="../admin/admin-landing.php">Home</a>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Submit</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../control/mission_entry.php">Mission Data - DD 791</a>
    </div>
  </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">View</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../model/view_missions.php">Mission Data</a>
      <a class="dropdown-item" href="../model/view_boom_oprs.php">Boom Operators</a>
      <a class="dropdown-item" href="../model/view_aircraft.php">Aircraft</a>
      <a class="dropdown-item" href="../model/view_wrdco.php">WRDCO</a>
      <a class="dropdown-item" href="../model/view_users.php">Users</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Export</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../control/export_select_pdf.php">Mission Data - DD791 - PDF</a>
      <a class="dropdown-item" href="../control/export_select_email.php">Mission Data - DD791 - Email</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Identity</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../admin/add_user.php">Add User</a>
      <a class="dropdown-item" href="../admin/manage_users.php">Manage Users</a>
    </div>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="../admin/logout.php">Logout</a>
   </li>
    </ul>
  </div>
</nav>
</div>
</body>
</html>
