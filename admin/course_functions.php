<?php
	session_start();
	include("uhsdcon.php");
	if($_POST['type']=='1'){
		$qry="";
		if($_POST['dep']!='none'){
			$qry="where department='".$_POST['dep']."'";
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
				$qry="where sm='".$_POST['sem']."'";
			}
			else{
				$qry=$qry." and sm='".$_POST['sem']."'";
			}
		}
		$result = mysqli_query($conn, "SELECT * FROM c_course ".$qry);
		
		
		
		while ($row = mysqli_fetch_array($result)){
		
		echo "<div class='d-flex bg-white align-items-center p-2 mt-1'>
		<div class='fw-bold text-white p-2 py-2 bg-primary rounded-2 text-truncate' ><i class='fs-5 fa-solid fa-layer-group'></i></div>
		<div class='px-2 fw-semibold' style='flex:2'><div class='fw-normal' style='font-size:12px;color:#999;'>".$row['cid']."</div>".$row['course']."</div>
		<div class='px-2 ' style='flex:1'>".$row['department']."</div>
		<div class='px-2 d-none d-md-block' style='flex:1'>".$row['year']."</div>
		<div class='d-none d-lg-block px-2' style='flex:1'>".$row['sm']."</div>
		<div class='dropstart bg-white '>
				<i class='fa-solid fa-ellipsis-vertical p-3' data-bs-toggle='dropdown'></i>
				<div class='dropdown-menu shadow px-3' onclick=''><div onclick=\"delCourse('".$row['cid']."')\"><i class='me-2 fa-solid fa-trash-can'></i>Delete</div><div data-bs-toggle='modal' data-bs-target='#editcourse' onclick=\"editCourse('".$row['cid']."')\" class='mt-2'><i class='me-2 fa-solid fa-pen-to-square'></i>Edit</div><div role='button' onclick=\"window.location='content.php?cid=".$row['cid']."'\" class='mt-2'><i class='me-2 fa-solid fa-file-import'></i>Content</div></div>			 
				</div>
		</div>";
		
		
		/*echo "<div class='sd-course-card'>
		 <div class='sd-course-card-elem'><h4 class='course-id'>".$row['cid']."</h4></div>
		 <div class='sd-course-card-elem-ex'>
		 <div class='sd-course-card-details text-main'>".$row['course']."</div>
		 <div class='sd-course-card-details text-sub'>department: ".$row['department']."</div>
		 <div class='sd-course-card-details text-sub'>year: ".$row['year']."</div>
		 <div class='sd-course-card-details text-sub'>semester: ".$row['sm']."</div>
		 </div>
		 <div class='sd-course-card-elem-action'>
		 <div class='sd-course-card-actions'>
		 <i onclick=\"delCourse('".$row['cid']."')\" style='color:#f50' class='fa fa-trash' aria-hidden='true'></i>
		 <i onclick=\"editCourse('".$row['cid']."')\" style='color:#0a0' class='fa fa-pencil-square-o' aria-hidden='true'></i>
		 
		 </div>
		 <a href='lecture_material.php?cid=".$row['cid']."'><div class='button'>content</div></a>
		 </div>
		 </div>";*/
		}
	}
	else if($_POST['type']=="2"){
		$id=$_POST["id"];
		$name=$_POST['name'];
		$dep=$_POST['dep'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM c_course WHERE cid ='$id'"))>0){
			echo "course id already exist";
		}
		else{
			$res = mysqli_query($conn, "INSERT INTO c_course (cid, course,department,year,sm) VALUE ('$id','$name','$dep','$year','$sem')");
			if ($res) {
				$uid=$_SESSION['id'];
				$act="created a course ".$id;
				mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$uid'), (SELECT afirstname FROM admin WHERE id='$uid'), '$act')");
				echo "course created successfuly";
			}
			else{
				echo "something went wrong";
			}
		}
		
	}
	else if($_POST['type']=="3"){
		$id=$_POST['id'];
		$query = mysqli_query($conn,"SELECT * FROM c_course WHERE cid= '$id'") or die(mysqli_error());

		$row = mysqli_fetch_array($query);
		
		$dep=array(
			1 => "",
			2 => "",
			3 => "",
			4 => "",
			5 => "",
		);
		$year=array(
			1 => "",
			2 => "",
			3 => "",
			4 => "",
		);
		$sem=array(
			1 => "",
			2 => "",
		);
		if(strpos($row['department'], "ALL") !== false){
			$dep[1]="checked";
		}
		if(strpos($row['department'], "ICT")!== false){
			$dep[2]="checked";
		}
		if(strpos($row['department'], "IAT")!== false){
			$dep[3]="checked";
		}
		if(strpos($row['department'], "ET")!== false){
			$dep[4]="checked";
		}
		if(strpos($row['department'], "AT")!== false){
			if(stripos($row['department'], "AT") != strripos($row['department'], "AT")){
				$dep[5]="checked";
			}
			if($dep[3]===""){
				$dep[5]="checked";
			}
		}
		
		if($row['year'] === "1st"){
			$year[1]="selected";
		}
		else if($row['year'] === "2nd"){
			$year[2]="selected";
		}
		else if($row['year'] === "3rd"){
			$year[3]="selected";
		}
		else if($row['year'] === "4th"){
			$year[4]="selected";
		}
		
		if($row['sm'] === "1st"){
			$sem[1]="selected";
		}
		else if($row['sm'] === "2nd"){
			$sem[2]="selected";
		}
		
		
		
		echo "<div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Add Course</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body px-5'>
		<div class='mb-3'>
		<label class='form-label text-secondary mb-0' style='font-size:14;'>Department </label>
		<div class=''>
			<label class='me-2' for='flexCheckDefault'><input class='' type='checkbox'  ".$dep[1]."  name='dpt[ALL]' value='ALL' id='eall'>
			ALL</label>
			<label class='me-2' for='flexCheckDefault'><input class='' type='checkbox'  ".$dep[2]."  name='dpt[ICT]' value='ICT' id='eict'>
			ICT</label>
			<label class='me-2' for='flexCheckDefault'><input class='' type='checkbox'  ".$dep[3]."  name='dpt[IAT]' value='IAT' id='eiat'>
			IAT</label>
			<label class='me-2' for='flexCheckDefault'><input class='' type='checkbox'  ".$dep[4]."  name='dpt[ET]' value='ET' id='eet'>
			ET</label>
			<label class='me-2' for='flexCheckDefault'><input class='' type='checkbox'  ".$dep[5]."  name='dpt[AT]' value='AT' id='eat'>
			AT</label></div>
		</div>
		<div class='mb-3'>
			<label class='form-label text-secondary mb-0' style='font-size:14;'>Year</label>
			<select class='form-control border border-0 rounded-0 border-bottom border-1' name='year' id='eyear'>
			<option ".$year[1]." value='1st'>1st</option>
			<option ".$year[2]." value='2nd'>2nd</option>
			<option ".$year[3]." value='3rd'>3rd</option>
			<option ".$year[4]." value='4th'>4th</option>
			</select>
		</div>
		<div class='mb-3'>
		<label class='form-label text-secondary mb-0' style='font-size:14;'>Semester </label>
                               
		<select class='form-control border border-0 rounded-0 border-bottom border-1' name='sem' id='esem'>
			<option value=''></option>
			<option ".$sem[1]." value='1st'>1st</option>
			<option ".$sem[2]." value='2nd'>2nd</option>
		</select>
		</div>
		<div class='mb-3'>
			<label class='form-label text-secondary mb-0' style='font-size:14;'>course ID</label>
			<input type='text' class='form-control border border-0 rounded-0 border-bottom border-1' placeholder='Enter course id' value='".$row['cid']."' id='eid'>
		</div>
		<div class='mb-3'>
		  <label class='form-label text-secondary mb-0' style='font-size:14;'>course </label>
	<input type='text' class='form-control border border-0 rounded-0 border-bottom border-1' placeholder='Enter course name' id='ename' value='".$row['course']."'>
		</div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary' onclick=\"courseSaveChanges('".$row['cid']."')\" id='addres'>Add</button>
      </div>";
		
		
		
		
		/*echo" <button class='close-form sfont' onclick='courseEditTog()'><i class='fa fa-times'></i></button>
 
	<label class='form-title sfont'>Edit course</label>
	
	<label class='form-label'>Department </label>
		<div class='form-input-align'>
			<label class='sd-filter-label' for='flexCheckDefault'><input ".$dep[1]."  type='checkbox'  value='ALL' id='eall'>
			ALL</label>
			<label class='sd-filter-label' for='flexCheckDefault'><input ".$dep[2]." type='checkbox' value='ICT'id='eict'>
			ICT</label>
			<label class='sd-filter-label' for='flexCheckDefault'><input ".$dep[3]." type='checkbox' value='IAT' id='eiat'>
			IAT</label>
			<label class='sd-filter-label' for='flexCheckDefault'><input ".$dep[4]." type='checkbox' value='ET' id='eet'>
			ET</label>
			<label class='sd-filter-label' for='flexCheckDefault'><input ".$dep[5]." type='checkbox' value='AT' id='eat'>
			AT</label></div>
	 <label class='form-label'>Year</label>
	<select class='form-input' name='year' id='eyear'>
		<option value=''></option>
		<option ".$year[1]." value='1st'>1st</option>
		<option ".$year[2]." value='2nd'>2nd</option>
		<option ".$year[3]." value='3rd'>3rd</option>
		<option ".$year[4]." value='4th'>4th</option>
	</select>
	
	<label class='form-label'>Semester </label>
                               
	<select class='form-input' name='sem' id='esem'>
		<option value=''></option>
		<option ".$sem[1]." value='st'>1st</option>
		<option ".$sem[2]." value='2nd'>2nd</option>
	</select>
	  
	<label class='form-label'>course ID</label>
	<input type='text' class='form-input' id='eid' value='".$row['cid']."'>

	<label class='form-label'>course name</label>
	<input type='text' class='form-input'  id='ename' value='".$row['course']."'>
	<button class='form-add' onclick=\"courseSaveChanges('".$row['cid']."')\">save changes</button>";*/
	}
	else if($_POST['type']=="4"){
		$sql = "UPDATE c_course SET cid='".$_POST['id']."',course ='".$_POST['name']."', department='".$_POST['dep']."',year='".$_POST['year']."',sm='".$_POST['sem']."' WHERE cid='".$_POST['oldid']."'";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			$id=$_SESSION['id'];
			$act="updated course ".$_POST['id'];
			mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
			echo "successfully updated";
		} else {
			echo "something went wrong";
			}
	}
	else if($_POST['type']=="5"){

    $sql = "DELETE  FROM c_course WHERE cid='".$_POST['id']."'";

    $res = mysqli_query($conn , $sql);

    if($res){
		$act="deleted course ".$_POST['id'];
		mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='".$_SESSION['id']."'), (SELECT afirstname FROM admin WHERE id='".$_SESSION['id']."'), '$act')");
		echo "successfully deleted";
        
    } else {
		echo "something went wrong";
    }
	}
?>