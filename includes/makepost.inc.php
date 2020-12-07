<?php
  if (isset($_POST['makepost_submit'])) {
    require 'dbh.inc.php';

    $p_title = $_POST['makepostTitle'];
    $p_subject = $_POST['makepostSubject'];
    $p_price = $_POST['makepostPrice'];
    $p_body = $_POST['makepostBody'];
    $filename = basename($_FILES["makepostImage"]["name"]);
    session_start();
    $fid = $_SESSION['fId'];
    $uid = $_SESSION['uId'];
    
    #Form handling & checks if image is ok to upload
    $dir = "../images/";
    $file = $dir . basename($_FILES["makepostImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    #check if uploadfile is jepg/png
    $info = getimagesize($_FILES['makepostImage']['tmp_name']);

    if ($info === FALSE) {
      $uploadOk = 0;
      $errormsg= "File type not support";
    }
    else if (($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
      $uploadOk = 0;
      $errormsg= "File type not support";
    }

    #checks if the upload is ok
    if ($uploadOk != 0) {
      
   
      if (move_uploaded_file($_FILES["makepostImage"]["tmp_name"], $file)) {
        echo "upload success</br>";
      } else {
        $uploadOk = 0;
        $errormsg= "File failed to upload";
      }
    }
    if ($uploadOk == 1)
    {
    $query = "INSERT INTO posts (p_title, p_subject, p_price, p_body, p_image, f_id, u_id, p_time) VALUES (?, ?, ?, ?, ?, ?, ?, now())";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
      header("Location: ../home.php?error=sqlfailed");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ssissii", $p_title, $p_subject, $p_price, $p_body,  $filename, $fid, $uid);
      mysqli_stmt_execute($stmt);
      $message=mysqli_error($conn);
      //echo $fid.$uid.$p_title;
      header("Location: ../home.php?post=$message");
      exit();
    }
  }
  else{
    header("Location: ../makepost.php?fid=$fid&errormsg=$errormsg");
    exit();
  }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
