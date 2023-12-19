<?php
if(!isset($_SESSION)){
    session_start();
}
$id=$_SESSION['id'];
$output = "";
include("connection.php");
if (isset($_GET['delete'])) {
    $cid = $_GET['delete'];


    $sql = "DELETE  FROM c_course WHERE cid='$cid'";

    $res = mysqli_query($conn , $sql);

    if($res){
		   
				$act="deleted course ".$cid;
				mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
        header("location:course_manage_page.php");
        
    } else {
        
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>course delete Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
if (isset($_GET['delete1'])) {
    $idd = $_GET['delete1'];

    $sql = "DELETE  FROM material WHERE id='$idd'";

    $res = mysqli_query($conn , $sql);

    if($res){
        				$act="deleted lecture material ".$idd;
				mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
       header("location:lcnote_manage_page.php");
        
    } else {
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Delete Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
 ?>