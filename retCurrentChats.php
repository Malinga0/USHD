<?php
include("uhsdcon.php");
$sid=$_POST['sid'];
$msgarr=array();
$notifyc=0;

		echo "<button style='font-size:14px;' class='close sfont' onclick='setMsgBox()'><i class='fa fa-times'></i></button>
		<div class='title-bar' style='text-align:center;'>your chats</div>
		<div class='card-cont'>";
		$query = mysqli_query($conn,"SELECT * FROM message WHERE sender_id='$sid' OR reciever_id='$sid' ORDER BY msg_id DESC")or die(mysqli_error());
		while ($row = mysqli_fetch_array($query)) {
		if(!(in_array($row['sender_id'], $msgarr) OR in_array($row['reciever_id'], $msgarr))){
				
				if($row['sender_id'] == $sid){
					$othuser=$row['reciever_id'];
				}
				else{
					$othuser=$row['sender_id'];
				}
				$query1 = mysqli_query($conn,"select * FROM user WHERE user_id='$othuser'")or die(mysqli_error());
				//$rowCount=mysqli_num_rows($query);
				$rowothuser=mysqli_fetch_row($query1);
				$name=$rowothuser[1]." ".$rowothuser[2];  
				$prof=$rowothuser[10];
				$query2 = mysqli_query($conn,"select * FROM message WHERE sender_id='$othuser' AND reciever_id='$sid' AND read_msg=0")or die(mysqli_error());
				$rowCount=mysqli_num_rows($query2);
				$notifyc+=$rowCount;
				$color="";
				if($rowCount >= 10 ){
					$count="9+";
				}
				else if($rowCount == 0){
					$color="style='background-color:rgba(255, 255, 255, 0);color:rgba(255, 255, 255, 0);'";
					$count=$rowCount;
				}
				else{
					$count=$rowCount;
				}
				
				echo "<div class='msg-cards' onclick='retChat(".$othuser.")'>
					<div class='msg-card-elem'>
					<div><img class='msg-profile' src='".$prof."'></div>
					</div>
					<div class='msg-card-elem expand'>
					<div class='msg-card-title'>".$name."</div>
					<div class='msg-card-sub'>".$row['msg']."</div>
					</div>
					<div class='msg-card-notify-cont'>
					<div ".$color." class='msg-card-notify'>".$count."</div>
					</div>
				</div>";
				array_push($msgarr, $othuser);
			}
		
		}
		
		echo "</div>
		<div class='msg-bottom'>
		<div class='msg-bottom-button' onclick='startNew()'>new chat</div>
		</div>";
		
		if($notifyc > 9){
			echo "<!--+-->";
		}
		else{
			echo "<!--".$notifyc."-->";
		}
		
?>