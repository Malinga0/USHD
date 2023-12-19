<?php
include("uhsdcon.php");
		$query = mysqli_query($conn,"select * FROM notice left JOIN admin ON admin.id = notice.adid left JOIN user ON user.user_id = notice.lecid ORDER BY nid DESC")or die(mysqli_error());
		while($row = mysqli_fetch_array($query)){
			if($row['adid']===NULL){
				$name=$row['firstname'];
			}
			else{
				$name=$row['afirstname'];
			}
			
			/*echo "<div class='element'>
				<div class='element-data' >".$row['topic']."</div>
				<div class='element-data'>".$row['date']."</div>
				<div class='element-data'>".$name."</div>
				<div class='element-data' style='overflow:hidden;' id='elem-data'> 
					<div class='elem-button sfont'>
					<div class='left-button'  > <i onclick='viewNote(".$row['nid'].")' style='color:#0a0;font-size:20px;' class='fa fa-pencil-square-o' aria-hidden='true'></i></div>
					<div class='right-button' ><i onclick=delnotice(".$row['nid'].") style='color:#f50;font-size:20px;' class='fa fa-trash' aria-hidden='true'></i></div>
					
		
					</div>
				</div>
			</div>";*/
            echo "<div class='d-flex bg-white justify-items-center flex-column mt-1 mb-2'>
            <div class='px-3 py-2 bg-light d-flex'><div class='flex-fill'>".$row['topic']."</div>
                 <div class='dropstart mt-1'>
                        <i class='fa-solid fa-ellipsis-vertical  px-3' data-bs-toggle='dropdown'></i>
                        <div  onclick=\"delnotice(".$row['nid'].",'".$row['topic']."')\"  class='dropdown-menu shadow px-3' onclick=''><i class='fa-solid fa-trash-can me-2'></i>Delete</div>
                 </div>
            </div>
            <div class='p-3'>".$row['discription']."</div>
            <div class='px-3 py-2 text-secondary' style='font-size:14;'><div><div style='font-size:12;'>Date-Time Created</div><div>".$row['date']."</div></div><div><div class='mt-2' style='font-size:12;'>Added By</div> <div>".$name."</div></div></div>
        </div>";
	}
?>