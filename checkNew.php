<?php
session_start();
include("uhsdcon.php");
if($conn->connect_error){
	exit();
}
$queryco = mysqli_query($conn,"select * FROM message WHERE sender_id=".$_SESSION['id']." OR reciever_id=".$_SESSION['id']." ")or die(mysqli_error());
$chCount=mysqli_num_rows($queryco);
echo $chCount;
unset($conn);
unset($queryco);
unset($chCount);
?>