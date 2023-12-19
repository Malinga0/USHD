<?php
include("uhsdcon.php");
if(isset($_POST['nid'])){
	$nid=$_POST['nid'];
}
else{
	$nid=0;
}
$next=((int)$nid)+1;
$pre=((int)$nid)-1;
$currentNote=((int)$nid)+1;
		$query = mysqli_query($conn,"select * FROM notice ORDER BY nid DESC")or die(mysqli_error());
		$rowCount=mysqli_num_rows($query);
		mysqli_data_seek($query, (int)$nid);
		$row=mysqli_fetch_row($query);
		
		if($nid <= 0){
			$preCont="";
		}
		else{
			$preCont="<div class='desc-control-cont' onclick='retNotice(".$pre.")'><i class='fa fa-angle-double-left'></i></div>";
		}
		
		if($nid >= $rowCount-1){
			$nextCont="";
		}
		else{
			$nextCont="<div class='desc-control-cont' onclick='retNotice(".$next.")'><i class='fa fa-angle-double-right'></i></div>";
		}
		
		echo "	<button style='font-size:14px;' class='close sfont' onclick='stEditClose()'><i class='fa fa-times'></i></button>
		<div class='desc-control'>
		".$preCont."
		<div class='desc-control-cont'>".$currentNote."</div>
		".$nextCont."
		</div>
	<div class='desc-title'>".$row[1]."</div>
	<div class='desc-cont' id='descCont'>".$row[2]."</div>
	<div class='desc-date'>date:</div>
	<div class='desc-date'>".$row[3]."</div>
		";
?>