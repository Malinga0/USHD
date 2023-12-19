<?php
session_start();
include("uhsdcon.php");
if(!isset($_POST['cid']) || $_POST['cid']==''){
	echo "please select a course";
	exit();
}
$loc=$_POST['filename'];
$topic=$_POST['topic'];
$dt=date("y/m/d");
$id=$_SESSION['id'];
$cid=$_POST['cid'];

mysqli_query($conn,"insert into material(mat_topic, location, date, ad_id, c_id) values('$topic', '$loc', '$dt', '$id', '$cid')") or die(mysqli_error());
echo "file added succesfully";
?>