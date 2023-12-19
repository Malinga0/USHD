<?php
	session_start();
	include("uhsdcon.php");
	if($_POST['type']=='1'){
		$qry="";
		if($_POST['dep']!='none'){
			$qry="where dep='".$_POST['dep']."'";
		}
		if($_POST['year']!='none'){
			if($qry==""){
				$qry="where year='".$_POST['year']."'";
			}
			else{
				$qry=$qry." and year='".$_POST['year']."'";
			}
		}
		if($_POST['sem']!='none'){
			if($qry==""){
				$qry="where sem='".$_POST['sem']."'";
			}
			else{
				$qry=$qry." and sem='".$_POST['sem']."'";
			}
		}
		if($_POST['batch']!='none'){
			if($qry==""){
				$qry="where bg_year='".$_POST['batch']."'";
			}
			else{
				$qry=$qry." and bg_year='".$_POST['batch']."'";
			}
		}
		$result = mysqli_query($conn, "SELECT * FROM result ".$qry);
		while ($row = mysqli_fetch_array($result)){
			echo "<div class='d-flex bg-white mt-1 p-1 align-items-center rescard'>
			<a class='p-1 overflow-hidden d-flex align-items-center' style='flex:1;' href='upload/".$row['fname']."'>
			<i class='fa-solid fa-file fs-1'></i><span class=' p-1 text-break overflow-hidden' style='font-size:12px;'>Open File</span>
			</a>
			<div class='p-1 overflow-hidden' style='flex:1;'>".$row['dep']."</div>
			<div class='p-1 overflow-hidden' style='flex:1;'>".$row['year']."</div>
			<div class='p-1 overflow-hidden' style='flex:1;'>".$row['sem']."</div>
			<div class='p-1 overflow-hidden' style='flex:1;'>".$row['bg_year']."</div>
			
			<div class='dropstart bg-white '>
				<i class='fa-solid fa-ellipsis-vertical p-3' data-bs-toggle='dropdown'></i>
				<div class='dropdown-menu shadow px-3' onclick=\"delRes('".$row['id']."', '".$row['dep']."', '".$row['bg_year']."')\"><i class='fa-solid fa-trash-can me-2'></i>Delete</div>
			 

			</div>
			</div>";
			
			
			

			
			
			
			
			
		}
	
	}
	else if($_POST['type']=='2'){
		$pname = rand(1000, 10000) . "-" . $_FILES['resfile']['name'];
		$tname = $_FILES['resfile']['tmp_name'];

		move_uploaded_file($tname, "upload/".$pname);
		$sql = "INSERT into result (year,sem,dep,bg_year,fname) VALUES ('".$_POST['year']."','".$_POST['sem']."','".$_POST['dep']."','".$_POST['batch']."','".$pname."')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
		$id=$_SESSION['id'];
		$act="added result ".$_POST['batch']." ".$_POST['year']." ".$_POST['sem'];
		mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
		echo "successfully added";
		} else {
		echo "something went wrong";
		}
	}
	else if($_POST['type']=="3"){

		$sql = "DELETE  FROM result WHERE id='".$_POST['id']."'";

		$res = mysqli_query($conn , $sql);

		if($res){
			$act="deleted result ".$_POST['dep']." ".$_POST['batch'];
			mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='".$_SESSION['id']."'), (SELECT afirstname FROM admin WHERE id='".$_SESSION['id']."'), '$act')");
			echo "successfully deleted";
			
		} else {
			echo "something went wrong";
		}
	}
?>