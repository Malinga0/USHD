<?php
	include("uhsdcon.php");
	$query = mysqli_query($conn,"SELECT * FROM formq INNER JOIN student ON formq.sid=student.student_id") or die(mysqli_error());
	while ($row = mysqli_fetch_array($query)) {
	echo "<div class='card'>
	<div class='celement'>
	<div class='detail name sfont'>".$row['question']."</div>
	<div class='detail email sfont'>".$row['q_date']."</div>
	<div class='detail email sfont'>".$row['firstname']." ".$row['lastname']."</div>
	</div>
	<div class='celement'>
        <div class='button sfont'>
            <div class='left-button' onclick='setEditOpen(".$row['q_id'].")'>edit</div>
            <div class='right-button' onclick='delForm(".$row['q_id'].")'>delete</div>
        </div>
    </div>
	</div>";
 }
 ?>