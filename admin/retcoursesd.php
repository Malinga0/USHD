<?php
$dep=$_POST['dep'];
include("uhsdcon.php");
$query = mysqli_query($conn,"select * from course where d_id='$dep'") or die(mysqli_error());
while ($row = mysqli_fetch_array($query)) {
	echo "<option value='".$row['course_id']."'>".$row['course_name']."</option>";
}
?>