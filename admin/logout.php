<?php
session_start();
include('uhsdcon.php');
$_SESSION['id']='';
$lgid=$_SESSION['lgid'];
mysqli_query($conn, "UPDATE userlog SET logout_date=CURRENT_TIMESTAMP WHERE log_id='$lgid'");

header("location: index.php");
?>