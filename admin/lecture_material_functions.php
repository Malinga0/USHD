<?php
session_start();
	include("uhsdcon.php");
	if($_POST['type']=='1'){
		$result = mysqli_query($conn, "SELECT * FROM material WHERE cid='".$_POST['id']."'");
		while ($row = mysqli_fetch_array($result)) {
			$mat="";
			if($row['mname'] != ''){
			$mat="<div class='px-3 py-2'>
			<a href='upload/".$row['mname']."' target='_blank'><div><i class='fa-solid fa-file-lines fs-1'></i></div>
			<div style='font-size:13px'>".$row['mname']."</div></a>
			</div>";
			}
			/*echo "<div class='sd-course-card'>
				 <div class='sd-course-card-actions'>
					 <div class='sd-course-card-actions-corner'>
						 <i onclick=\"delMaterial('".$row['id']."')\" style='color:#f50' class='fa fa-trash' aria-hidden='true'></i>
						 <i onclick=\"editMaterial('".$row['id']."')\" style='color:#0c0' class='fa fa-pencil-square-o' aria-hidden='true'></i>
					 </div>
				 
				 </div>
				 
				 <div class='sd-course-card-elem'>
					".$mat."
					<div class='sd-course-card-link'>
						<div class='text-main'>".$row['title']."</div><br>
						<div class='text-sub-topic'>".$row['linktitle']."</div>
						<a target='_blank' style='color: cornflowerblue;' href='".$row['link']."'><div class='text-sub'>".$row['link']."</div></a>
					</div>
				 </div>
				 </div>
				 ";*/
				 
				 
				 
				 echo "<div class='d-flex flex-column bg-white mt-1'>
					   <div class='px-3 py-2 bg-light d-flex'><div class='flex-fill fw-semibold'>".$row['title']."</div>
					   <div class='dropstart mt-1'>
							<i class='fa-solid fa-ellipsis-vertical  px-3' data-bs-toggle='dropdown'></i>
								<div class='dropdown-menu shadow px-3' onclick=''><div onclick=\"delMaterial('".$row['id']."')\"><i class='me-2 fa-solid fa-trash-can'></i>Delete</div><div data-bs-toggle='modal' data-bs-target='#editmat'  onclick=\"editMaterial('".$row['id']."')\"  class='mt-2'><i class='me-2 fa-solid fa-pen-to-square'></i>Edit</div></div>	
					 </div>
					 </div>
				".$mat."
				<div class='px-3 pt-2 fw-semibold' style='font-size:14px;'>".$row['linktitle']."</div>
				<div class='px-3 py-2'>".$row['link']."</div>
				</div>";
		}
	}
	else if($_POST['type']=='2'){
		if (empty($_FILES['upfile']['name'])){
            $sql = "INSERT into material (title,mname,linktitle,link,cid) VALUES ('".$_POST['topic']."','','".$_POST['linktitle']."','".$_POST['link']."','".$_POST['id']."')";
            $res = mysqli_query($conn, $sql);

            if ($res) {
				$id=$_SESSION['id'];
				$act="added lecture material ".$_POST['topic']." ".$_POST['id']." ";
				mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='".$_SESSION['id']."'), (SELECT afirstname FROM admin WHERE id='".$_SESSION['id']."'), '$act')");
				echo "successfully added";
            } else {
				echo "something went wrong";
            }
		}
		else{
			$pname = rand(1000, 10000) . "-" . $_FILES['upfile']['name'];
			$tname = $_FILES['upfile']['tmp_name'];

			move_uploaded_file($tname, "upload/".$pname);
			$sql = "INSERT into material (title,mname,linktitle,link,cid) VALUES ('".$_POST['topic']."','$pname','".$_POST['linktitle']."','".$_POST['link']."','".$_POST['id']."')";
			$res = mysqli_query($conn, $sql);

			if ($res) {
			$id=$_SESSION['id'];
			$act="added lecture material ".$_POST['topic']." ".$_POST['id']." ";
			mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
			echo "successfully added";
			} else {
			echo "something went wrong";
			}
		}
	}
	else if($_POST['type']=='3'){
		$sql = "DELETE  FROM material WHERE id='".$_POST['id']."'";

		$res = mysqli_query($conn , $sql);

		if($res){
			$act="deleted lecture material ".$_POST['id']." ".$_POST['cid'];
			mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='".$_SESSION['id']."'), (SELECT afirstname FROM admin WHERE id='".$_SESSION['id']."'), '$act')");
			echo "successfully deleted";
			
		} else {
			echo "something went wrong";
		}
	}
	else if($_POST['type']=='4'){
		$id=$_POST['id'];
		$query = mysqli_query($conn,"SELECT * FROM material WHERE id= '$id'") or die(mysqli_error());

		$row = mysqli_fetch_array($query);
		
		echo "  <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Material</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body px-5'>
		<div class='mb-3'>
			<label class=\"form-label\">Topic</label>
			<input type=\"text\" class=\"form-control\" placeholder=\"\" id=\"etopic\" value='".$row['title']."'>
		</div>
		<div class=\"mb-3\">
			<label class=\"form-label\">Link Topic</label>
			<input type=\"text\" class=\"form-control\" placeholder=\"\" id=\"elinktitle\" value='".$row['linktitle']."'>
		</div>
		<div class=\"mb-3\">
			<label class=\"form-label\">Link</label>
            <input type=\"text\" class=\"form-control\" placeholder=\"\" id=\"elink\" value='".$row['link']."'>
		</div>
		<div class=\"mb-3\">
			<label class=\"form-label\">File</label>
			<div><a href='upload/".$row['mname']."'><i class=\"me-2 fa-solid fa-file-lines fs-1\"></i>".$row['mname']."</a></div>
		</div>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
        <button type=\"button\" class=\"btn btn-primary\" onclick=\"saveMaterial(".$row['id'].")\" id=\"addButton\">Add</button>
      </div>";
	}
	else if($_POST['type']=='5'){
		
		mysqli_query($conn, "update material set title='".$_POST['title']."', linktitle='".$_POST['linktitle']."', link='".$_POST['link']."' where id=".$_POST['id']."");
		echo "Succesfuly updated";
	}

?>