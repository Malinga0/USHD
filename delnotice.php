<?php
	session_start();

include("uhsdcon.php");
$nid = $_POST['nid'];

$query ="delete from notice where nid='$nid'";

if($conn->query($query) === TRUE){
	echo "deleted successfuly";
}
else{
	echo "can't delete";
}

?>