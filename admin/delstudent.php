<?php
session_start();
include("uhsdcon.php");
$qid = $_POST['stid'];

	$id=$_SESSION['id'];
	$name=mysqli_fetch_assoc(mysqli_query($conn, "select * from user where user_id='$qid'"));
	$act="deleted  user ".$name['firstname']." ".$name['lastname'];
$qry="INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')";

$query ="delete from user where user_id='$qid'";

if($conn->query($query) === TRUE){
	echo "deleted successfuly";

	mysqli_query($conn, $qry);
}
else{
	echo "can't delete";
}

?>