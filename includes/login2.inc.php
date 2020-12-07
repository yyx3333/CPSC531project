<?php

          session_start();
        $_SESSION['uName'] = "yyx3333";
        $_SESSION['uNickname'] = "oreo";
        $_SESSION['uId'] = 2;
        $_SESSION['uAvatar'] = "8f4.jpg";
        header("Location: ../home.php?login=success");
?>
