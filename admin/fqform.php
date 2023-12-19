<?php
include("uhsdcon.php");
$qid = $_POST['qid'];


$query = mysqli_query($conn,"select * from formq inner join student on student.student_id=formq.sid where q_id='$qid'") or die(mysqli_error());

$row = mysqli_fetch_array($query);

echo "<button class='close sfont' onclick='stEditClose()'>X</button>
	<div class='form-elem ques'>
		<div class='name form-cont'>".$row['question']."</div>
		<div class='email'>".$row['firstname']." ".$row['lastname']."</div>
		<div class='email'>".$row['q_date']."</div>
	</div>";
	
$query = mysqli_query($conn,"select * from forma inner join student on student.student_id=forma.stid where fq_id='$qid'") or die(mysqli_error());

while($row = mysqli_fetch_array($query)){
	echo "<div class='form-elem ans'>
		<div class='reply'>reply</div>
		<div class='form-cont ans-text'>".$row['answer']."</div>
		<div class='email'>".$row['firstname']." ".$row['lastname']."</div>
		<div class='email'>".$row['fq_date']."</div>
		<div class='ans-del'>delete</div>
	</div>";
}

?>