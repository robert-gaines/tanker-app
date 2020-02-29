<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/bootstrap/dist/css/bootstrap.css">
  <script src="../style/bootstrap/dist/js/bootstrap.js"></script>
  <style media="screen">
    body
    {
      background-color: #333;
    }
  </style>

  </script>

</head>

<body>
  <div class="container">
    <form class="form-inline" action="" method="post">
      <form class="" action="mission-entry.php" method="post">
        <button type="submit">+</button><input type="text" class="form-control" name="add-row"><br>
        <?php
          if(isset($_POST['add-row']))
          {
            for($i = 0; $i < 10; $i++)
            {
                  echo "<br>";
                  echo "<input type='text' class='form-control' name='add-row'><br>";
            }
          }
         ?>
      </form>
    </div>
  </div>
</body>

</html>
