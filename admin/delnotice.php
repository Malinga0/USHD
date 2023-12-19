<?php
session_start();
include("uhsdcon.php");
$nid = $_POST['nid'];


$query ="delete from notice where nid='$nid'";

if($conn->query($query) === TRUE){
    $id=$_SESSION['id'];
	$act="deleted notice ".$nid." ".$_POST['desc'];
	mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
	echo "deleted successfuly";
}
else{
	echo "can't delete";
}

?>