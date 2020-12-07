<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "cs531";
//creat connection
$conn = mysqli_connect($servername, $username, $password, $database);
//check connection
if (!$conn) {
die("connection failed" . mysqli_connect_error());
}
?>
