<?php
session_start();
include("uhsdcon.php");
if(isset($_POST['topic'])){
$notice=$_POST['notice'];
$topic=$_POST['topic'];
$dt=date("y/m/d");
$id=$_SESSION['id'];

mysqli_query($conn,"insert into notice(topic, discription, date, adid) values('$topic', '$notice', CURRENT_TIMESTAMP, '$id')") or die(mysqli_error());
echo "new notice added succesfully";

$id=$_SESSION['id'];
$act="added notice ".$topic;
mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
}
else{
    echo "can not add";
}
?>