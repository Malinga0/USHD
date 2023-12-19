<?php
session_start();
$output = "";
include("connection.php");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

	$resd=mysqli_fetch_assoc(mysqli_query($conn, "select * from result where id='$id'"));
    $sql = "DELETE  FROM result WHERE id='$id'";

    $res = mysqli_query($conn , $sql);

    if($res){
		$id=$_SESSION['id'];
		$act="deleted result ".$resd['dep']." ".$resd['bg_year'];
		mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
        header("location:manage_result.php");
        
    } else {
        
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>result delete Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
?>