<?php
session_start();
include("uhsdcon.php");
$notice=$_POST['notice'];
$topic=$_POST['topic'];
$dt=date("y/m/d");
$id=$_SESSION['id'];


$query ="insert into notice(topic, discription, date, lecid) values('$topic', '$notice', CURRENT_TIMESTAMP, '$id')";

if($conn->query($query) === TRUE){
	echo "added successfuly";
}
else{
	echo $conn->error;
}
?>