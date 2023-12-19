<?php
	session_start();
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'admin/include/PHPMailer-master/src/Exception.php';
	require 'admin/include/PHPMailer-master/src/PHPMailer.php';
	require 'admin/include/PHPMailer-master/src/SMTP.php';


	
	include("uhsdcon.php");
	if($_POST['type']=='1'){
		$result = mysqli_query($conn, "SELECT * FROM user where email='".$_POST['email']."'");
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$code=rand(10000,99999);
			mysqli_query($conn, "INSERT INTO recover(uid, vcode) values(".$row['user_id'].", $code)");
			$_SESSION['email']=$_POST['email'];
			$mail = new PHPMailer(true); 
			try { 

				$mail->isSMTP();                                             
				$mail->Host       = 'smtp.gmail.com';                     
				$mail->SMTPAuth   = true;                              
				$mail->Username   = 'forwpurpose@gmail.com';                  
				$mail->Password   = 'ahibkgorksrqszwk';                         
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                               
				$mail->Port       = 587;   

			  

				$mail->setFrom('forwpupose@gmail.com', 'USHD Admin');            
				$mail->addAddress($row['email']); 		   

				$mail->isHTML(true);                                   
				$mail->Subject = 'Subject'; 
				$mail->Body    = "Your verification code for <b>ushd</b> reset your password is<div><b>$code</b></div>"; 
				$mail->AltBody = ''; 
				$mail->send(); 

				echo "verification code has been sent successfully!"; 

			} catch (Exception $e) { 

				echo "Message could not be sent"; 
			} 

		}
		else{
			echo "No existing account with the E-mail provided";
		}
	}
	if($_POST['type']=='2'){
		$result = mysqli_query($conn, "SELECT * FROM recover where vcode='".$_POST['code']."' AND uid=(select user_id from user where email='".$_SESSION['email']."')");
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$result = mysqli_query($conn, "SELECT CURRENT_TIMESTAMP() as time");
			$time=mysqli_fetch_array($result);
			$now=strtotime($time['time']);
			$sendtime=strtotime($row['time']);
			if(round(abs($sendtime - $now)/60, 2) < 15.0){
				$_SESSION['id']=$row['uid'];
				echo "1";
			}
			else{
				echo "Time out, Get a new verification code";
			}
		}
		else{
			echo "Incorrect code";
		}
		
	}

?>