<?php
include("uhsdcon.php");
$sid=$_POST['sid'];
$rid=$_POST['rid'];
$msg=$_POST['msg'];

mysqli_query($conn, "insert into message(msg, sender_id, reciever_id) values('$msg', '$sid', '$rid')");


?>