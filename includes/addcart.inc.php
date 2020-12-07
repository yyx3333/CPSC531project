<?php
  if (isset($_POST['addcart'])) {
    require 'dbh.inc.php';
    session_start();

    $pid = $_GET['pid'];
    
    $uid = $_SESSION['uId'];

    $query = "INSERT INTO cart (u_id, p_id) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
      header("Location: ../home.php?error=sqlfailed");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ii", $uid, $pid);
      mysqli_stmt_execute($stmt);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  }
  else {
    echo "nope";
  }

/*

*/
?>
