<?php
include("uhsdcon.php");
$qid = $_POST['qid'];

$query ="delete from formq where q_id='$qid'";

if($conn->query($query) === TRUE){
	echo "deleted successfuly";
}
else{
	echo "can't delete";
}

?>