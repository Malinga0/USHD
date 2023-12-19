<?php
	include("uhsdcon.php");
	$pos=$_POST['pos'];
	if(isset($_POST['kword'])){
		$kword=$_POST['kword'];
		$query = mysqli_query($conn,"select * from user where position='$pos' and (firstname like '%$kword%' or lastname like '%$kword%') ORDER BY user_id DESC") or die(mysqli_error());
	}
	else{
		$query = mysqli_query($conn,"select * from user where position='$pos' ORDER BY user_id DESC") or die(mysqli_error());
	}
	
	while ($row = mysqli_fetch_array($query)) {
		if($row['dep_id']==1 ){
			$dep="ICT";
		}
		else if($row['dep_id']==2 ){
			$dep="IAT";
		}
		else if($row['dep_id']==3 ){
			$dep="ET";
		}
		else if($row['dep_id']==4 ){
			$dep="AT";
		}
		else{
			$dep="All";
		}
		/*echo "<div class='card'>
			<div class='celement'>
			<label class='detail name sfont'>".$row['firstname']." ".$row['lastname']."</label>
			<label class='detail email sfont'>".$row['email']."</label>
			</div>
			<div class='celement'>
				<div class='button sfont'>
					<div class='mid-button' onclick='editData(".$row['user_id'].")'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></div>
					<div class='right-button' onclick='delstudent(".$row['user_id'].")'><i class='fa fa-trash' aria-hidden='true'></i></div>
				</div>
			</div>
		</div>";*/
		echo "<div class='d-flex p-2 bg-white align-items-center mt-1'>
		<div style='width:70px;'><img class='rounded-circle' style='width:50px;height:50px;object-fit:cover;' src='../".$row['profile']."'></div>
		<div class='overflow-hidden px-2' style='flex:1;'><div class='fw-bold'>".$row['firstname']." ".$row['lastname']."</div><div class='text-secondary' style='font-size:13px;'>".$row['email']."</div></div>
		<div class='overflow-hidden d-none d-sm-block px-2 fw-normal' style='flex:1;'>".$row['phone']."</div>
		<div class='overflow-hidden d-none d-md-block px-2' style='flex:1;'>".$dep."</div>
		<div class='overflow-hidden d-none d-lg-block px-2' style='flex:1;'>".$row['nic']."</div>
		<div class='dropstart bg-white'>
		<i class='fa-solid fa-ellipsis-vertical  p-3' data-bs-toggle='dropdown'></i>
		<div class='dropdown-menu shadow px-3' onclick=''><div onclick='delstudent(".$row['user_id'].")'><i class='me-2 fa-solid fa-trash-can'></i>Delete</div><div data-bs-toggle='modal' data-bs-target='#editstu' onclick='editData(".$row['user_id'].")' class='mt-2'><i class='me-2 fa-solid fa-pen-to-square'></i>Edit</div></div>			 
		</div>
		</div>";
	}
?>  