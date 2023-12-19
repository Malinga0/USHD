<?php
include("uhsdcon.php");
$un = $_POST['stid'];


$query = mysqli_query($conn,"select * from user where user_id='$un'") or die(mysqli_error());

$row = mysqli_fetch_array($query);
$dep_set=array(
	1 => "",
	2 => "",
	3 => "",
	4 => "",
);
if($row['position'] == 1){
	$dep_set[$row['dep_id']]="selected";
	echo "<div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Student</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body px-5' >
		<div class='mb-3'>
		<div class='mb-2'><label class='text-secondary' style='font-size:14px;'>First Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input id='fne' type='text' value='".$row['firstname']."' class='form-control-sm border border-0 border-bottom rounded-0'></div>
		<div><label class='text-secondary' style='font-size:14px;'>Last Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input id='lne' type='text' value='".$row['lastname']."' class='form-control-sm border border-0 border-bottom rounded-0'></div>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>Department:</label>
		<select id='depe' class='form-select border border-0 border-bottom rounded-0'>
			<option ".$dep_set[1]." value='1'>ICT</option>
			<option ".$dep_set[2]." value='2'>IAT</option>
			<option ".$dep_set[3]." value='3'>ET</option>
			<option ".$dep_set[4]." value='4'>AT</option>
		</select>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size-14px;'>Batch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input id='batche' type='text' value='".$row['batch']."' class='form-control-sm border border-0  border-bottom rounded-0'>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>NIC</label>
		<input id='nice' type='text' value='".$row['nic']."' class='form-control border border-0 border-bottom rounded-0'>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>E-mail</label>
		<input id='emaile' type='text' value='".$row['email']."' class='form-control border border-0 border-bottom rounded-0'>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>Phone Number</label>
		<input id='phonee' type='text' value='".$row['phone']."' class='form-control border border-0 border-bottom rounded-0'>
		</div>
		</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary' onclick='saveChanges(".$row['user_id'].")'>Save</button>
      </div>
		";
}
else{
		echo "<div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Teacher</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body px-5' >
		<div class='mb-3'>
		<div class='mb-2'><label class='text-secondary' style='font-size:14px;'>First Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input id='fne' type='text' value='".$row['firstname']."' class='form-control-sm border border-0 border-bottom rounded-0'></div>
		<div><label class='text-secondary' style='font-size:14px;'>Last Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input id='lne' type='text' value='".$row['lastname']."' class='form-control-sm border border-0 border-bottom rounded-0'></div>
		</div>
		
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>NIC</label>
		<input id='nice' type='text' value='".$row['nic']."' class='form-control border border-0 border-bottom rounded-0'>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>E-mail</label>
		<input id='emaile' type='text' value='".$row['email']."' class='form-control border border-0 border-bottom rounded-0'>
		</div>
		<div class='mb-3'>
		<label class='text-secondary mb-0' style='font-size:14px;'>Phone Number</label>
		<input id='phonee' type='text' value='".$row['phone']."' class='form-control border border-0 border-bottom rounded-0'>
		</div>
		</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary' onclick='saveChanges(".$row['user_id'].")'>Save</button>
      </div>
		";
}

?>