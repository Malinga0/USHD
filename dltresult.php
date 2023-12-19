<?php
	session_start();

$output = "";
include("connection.php");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];


    $sql = "DELETE  FROM result WHERE id='$id'";

    $res = mysqli_query($conn , $sql);

    if($res){
        header("location:manage_result.php");
        
    } else {
        
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>course delete Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
?>