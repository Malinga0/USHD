<?php
include("uhsdcon.php");
$sid=$_POST['sid'];
$rid=$_POST['rid'];
$query1 = mysqli_query($conn,"select * FROM user WHERE user_id='$rid'")or die(mysqli_error());
		
$rowothuser=mysqli_fetch_row($query1);


echo"<button style='font-size:14px;' class='close sfont' onclick='setMsgBox()'><i class='fa fa-times'></i></button>
	<button style='font-size:14px;' class='back sfont' onclick='retCurrentChats()'><i class='fa fa-arrow-left'></i></button>

	<div class='title-bar'><img class='profile' src='".$rowothuser[10]."'>".$rowothuser[1]." ".$rowothuser[2]."</div>
			<div class='card-cont'  id='cardCont'>";
			
		$query = mysqli_query($conn,"SELECT * FROM message WHERE (sender_id='$sid' AND reciever_id='$rid') OR (sender_id='$rid' AND reciever_id='$sid') ORDER BY msg_id ASC")or die(mysqli_error());
		while ($row = mysqli_fetch_array($query)) {
			if($row['sender_id'] == $sid){
				echo "<div class='sendrecv-cont'><div class='msg-send'>".$row['msg']."<div class='triang-right'></div></div></div>";
			}
			else{
				echo "<div class='sendrecv-cont'><div class='msg-recv'> <div class='triang-left'></div>".$row['msg']."</div></div>";
				mysqli_query($conn, "update message set read_msg=1 where msg_id=".$row['msg_id']." ");
			}
		
		
		
		}
		
		echo "</div>
		<div class='msg-bottom'>
		<input type='text' class='d-none' value='".$rid."' id='revid'>
		<div   class='msg-bottom-button' style='height:30px;padding-top:4px;border-radius:0px 5px 5px 0px;'><i onclick='sendMsg(".$rid.")' class='fa fa-paper-plane'></i></div>
		<input  id='sendm' type='text' style='display:block;' class='msg-bottom-text'>
		</div>";

?>