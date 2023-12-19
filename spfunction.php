<?php

$output = "";
include("connection.php");
if (isset($_GET['delete'])) {
    $cid = $_GET['delete'];


    $sql = "DELETE  FROM c_course WHERE cid='$cid'";

    $res = mysqli_query($conn , $sql);

    if($res){
        header("location:course_manage_page.php");
        
    } else {
        
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>course delete Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
if (isset($_GET['delete1'])) {
    $id = $_GET['delete1'];

    $sql = "DELETE  FROM material WHERE id='$id'";

    $res = mysqli_query($conn , $sql);

    if($res){
       header("location:lcnote_manage_page.php");
        
    } else {
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Delete Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
 ?>