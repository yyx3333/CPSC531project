<?php session_start(); 
 if (isset($_SESSION['uId'])) {
    $uid = $_SESSION['uId'];
  } ?>
<!DOCTYPE html>
<html>
<!-- Require this file in any page that uses a persistant UI. I.e. navbar -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="widht=device-width, initial-scale=1">
  <title>My Forums</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</head>

<body style="background-color: #d0d6db">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="home.php">
      <img src="images/icon.jpg" class="rounded mx-auto" alt="logo" width=50 height=50>
      CPCS531 Shopping web
    </a>
    <div>
      <?php
        if (isset($_SESSION['uName'])) {
          
          echo "<a href='account.php' class='text-dark'>".$_SESSION['uName']."</a>";
      ?>
      <img src="images/<?php if (!isset($_SESSION['uAvatar']) || strlen($_SESSION['uAvatar']) < 3) {
                                echo "myBishop.png";
                              }
                              else {
                                echo $_SESSION['uAvatar'];
                              }
                        ?>" class="img-thumbnail" alt="logo" width=50 height=50>


      <?php
        echo "\t";
        echo '<a class="btn btn-primary text-light btn-sm" href="sublist.php">Favorite</a>';
        echo "\t";
        echo '<a class="btn btn-primary text-light btn-sm" href="cart.php">Cart</a>';
        echo "\t";
        echo '<a class="btn btn-outline-primary text-primary btn-sm" href="includes/logout.inc.php">LOG OUT</a>';
      } else {
        echo '<a class="btn btn-outline-primary text-primary" href="login.php">LOG IN</a>';
        echo "\t";
        echo '<a class="btn btn-primary text-light btn-sm" href="cart.php">Cart</a>';
        echo "\t";
        echo '<a class="btn btn-primary text-light" href="signup.php">SIGN UP</a>';
      }
      ?>
    </div>
  </nav>
</body>

</html>
