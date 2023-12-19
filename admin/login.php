<?php
session_start();
include("uhsdcon.php");
$un=$_POST['userName'];
$psswd=md5($_POST['userPassword']);
$query = mysqli_query($conn,"SELECT * FROM admin WHERE username='$un' AND password='$psswd'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);
		if($count > 0){
			$_SESSION['id']=$row['id'];
			$idulg=$row['id'];
			mysqli_query($conn, "insert into userlog(user_name, name) value((select username from admin where id='$idulg'), CONCAT((select afirstname from admin where id='$idulg'), ' ', (select alastname from admin where id='$idulg')))");
			
			$rw=mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(log_id) FROM userlog"));
			$_SESSION['lgid']=$rw[0];
			header("location: dashboard.php");
		}
		else{
			header("location: index.php?error=username and password");
		}
?>