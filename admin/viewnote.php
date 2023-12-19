<?php
include("uhsdcon.php");;
$un = $_POST['nid'];


$query = mysqli_query($conn,"select * from notice where nid='$un'") or die(mysqli_error());

$row = mysqli_fetch_array($query);

echo $row['discription'];

?>