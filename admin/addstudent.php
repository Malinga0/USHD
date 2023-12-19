<?php
session_start();
include("uhsdcon.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'include/PHPMailer-master/src/Exception.php';
	require 'include/PHPMailer-master/src/PHPMailer.php';
	require 'include/PHPMailer-master/src/SMTP.php';





$pos=$_POST['pos'];
if($pos == 1){
	$dep=$_POST['dep'];
	$batch=$_POST['batch'];
}
else{
	$dep='10';
	$batch= '0';
}

$nic = $_POST['nic'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$paswd=$_POST['nic'].$_POST['fn'];
$paswde=md5($_POST['nic'].$_POST['fn']);

$email=$_POST['email'];
$phone=$_POST['phone'];



$query ="insert into user (nic, email, password, phone, dep_id, firstname, lastname, batch, position) values ('$nic', '$email', '$paswde', '$phone', '$dep', '$fn', '$ln', '$batch', '$pos')";

if($conn->query($query) === TRUE){
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
				$mail->addAddress($email); 		   

				$mail->isHTML(true);                                   
				$mail->Subject = 'USHD'; 
				$mail->Body    = "You have successfuly registered in <b>ushd</b><br>your username is:<b>$nic</b><br>your password is:  <b>$paswd</b><br>"; 
				$mail->AltBody = ''; 
				$mail->send(); 

				echo "E-mail sent successfuly!"; 

			} catch (Exception $e) { 

				echo "Message could not be sent"; 
			} 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	echo "added successfuly";
	$id=$_SESSION['id'];
$act="added user ".$fn." ".$ln;
mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
}
else{
	echo $conn->error;
}

?>