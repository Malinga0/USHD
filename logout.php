<?php 
session_start();
include("connection.php");
$uname=$_SESSION['uname'];
$lgid=$_SESSION['lgid'];
mysqli_query($conn, "UPDATE userlog SET logout_date=CURRENT_TIMESTAMP WHERE log_id='$lgid'");


session_unset();
session_destroy();

header("Location:index.php");

?>