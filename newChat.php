<?php
session_start();
$usrid=$_SESSION['id'];
include("uhsdcon.php");
		
		
		
		echo "<button style='font-size:14px;' class='close sfont' onclick='setMsgBox()'><i class='fa fa-times'></i></button>
	<button style='font-size:14px;' class='back sfont' onclick='retCurrentChats()'><i class='fa fa-arrow-left'></i></button>
		<div class='title-bar' style='text-align:center;'>new chat with</div>
		<div class='card-cont' style='height:calc(100% - 60px);'>";
		
		
		$query = mysqli_query($conn,"SELECT * FROM user WHERE user_id != '$usrid'")or die(mysqli_error());
		while ($row = mysqli_fetch_array($query)) {
			if($row['position'] == 1){
				$pos="student";
			}
			else{
				$pos="teacher";
			}
			echo "<div class='msg-cards' onclick='retChat(".$row['user_id'].")'>
			<div class='msg-card-elem'>
			<div><img class='msg-profile' src='".$row['profile']."'></div>
			</div>
			<div class='msg-card-elem expand' style='width:calc(100% - 100px );'>
			<div class='msg-card-title'>".$row['firstname']." ".$row['lastname']."</div>
			<div class='msg-card-sub'>".$pos."</div>
			</div>
		</div>";
		}
		
		
		echo "</div>";
?>