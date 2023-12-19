<?php
session_start();
include("uhsdcon.php");
$uid=$_POST['stid'];
$nic = $_POST['nic'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$paswd=$_POST['nic'].$_POST['fn'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$pos=$_POST['pos'];

if($pos == 1){
	$batch=$_POST['batch'];
	$dep=$_POST['dep'];
}

if($pos == 1){
	$query ="UPDATE user SET firstname='$fn', lastname='$ln', nic='$nic', phone='$phone', email='$email', dep_id='$dep', batch='$batch' WHERE user_id='$uid'";
}
else{
	$query ="UPDATE user SET firstname='$fn', lastname='$ln', nic='$nic', phone='$phone', email='$email' WHERE user_id='$uid'";
}

if($conn->query($query) === TRUE){
	            $id=$_SESSION['id'];
$act="updated user ".$fn." ".$ln;
mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
	echo "updated successfuly";

}
else{
	echo "can't update";
}

?>