<?php
session_start();
include("uhsdcon.php");
$un=$_POST['userName'];
$psswd=$_POST['userPassword'];
$query = mysqli_query($conn,"SELECT * FROM admin WHERE username='$un' AND password='$psswd'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);

		echo $count."".$row['id'];
		if($count > 0){
			$_SESSION['id']=$row['id'];
			header("location: notices.php");
		}
		else{
			header("location: index.php");
		}
?>