<?php
session_start();
	include("uhsdcon.php");
	
	if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
		header("location: index.php");
		exit();
	}
	
	$result=mysqli_query($conn, "select * from admin where id='".$_SESSION['id']."'");
	$row = mysqli_fetch_array($result);
	if(mysqli_num_rows($result)<1){
		header("location: index.php");
		exit();
	}
if(isset($_POST['cpass'])){
	mysqli_query($conn, "update admin set password='".md5($_POST["cpass"])."' where id='".$_SESSION["id"]."'");
	$content="<div>Password has been succesfuly changed <a href='index.php'>login</a> to your account<div>";
}
else{
	$content="<form  action='changepass.php' method='post' id='frm' class='pt-5'>
<input type='text' class='form-control p-2 rounded-3' style='background-color:rgba(57,57,57,0.2)' id='pass' placeholder='New Password' name='pass'>

<input class='form-control p-2 rounded-3 mt-3' style='background-color:rgba(57,57,57,0.2)' type='text' id='cpass' name='cpass' placeholder='Confirm Password'>

<input type='button' class='btn btn-secondary mt-3 fw-semibold fs-5 rounded-3' value='Save Password' onclick='changePass()'>
</form>";

}


?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
	 <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css" />
	 <link rel="stylesheet"href="fontawesome-free-6.2.1-web/js/all.js"/>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	 
	   <style>
	.notification{
		background-color:rgba(150, 50, 20, 1);
		padding:10px;
		color:white;
		position:fixed;
		width:250px;
		top:10px;
		left:calc((100% - 250px) / 2);
		display:none;
		z-index:1056;
	}
	@keyframes fadeout{
		0%{
			opacity:1;
		}
		100%{
			opacity:0;
		}
	}
	.form-res{
		width: 100%;
		max-width:500px;
	}
	</style>
</head>
<body>
<div id="notification" class="notification bg-dark text-white rounded-3" role="alert"></div>



 <!--div class="parent clearfix d-flex justify-content-center">


        <div class="login">
            <div class="container">
                <h1>
                    <center>
                        Change
                    </center>
                    <center>
                        Password
                    </center>
                </h1>

                <div class="login-form">
                   <?php echo $content; ?> 
                </div>

            </div>
        </div>
    </div-->








<div class="p-1 mt-5">
<div class='form-res bg-white mx-auto my-2 mt-5'>
<div class=' fs-2 text-center fw-bold'>Change Password</div>
<?php echo $content; ?>
</div>
</div>


<script>
function changePass(){
	if($("#pass").val()!=$("#cpass").val()){
		console.log($("#cpass").val());
		msg("Incorrect confirm password");
	}
	else if($("#pass").val().length < 5){
		msg("Password not long enough");
	}
	else{
		$("#frm").submit();
	}
}
function verifyCode(){
	$("#verify").html("<span class='spinner-border spinner-border-sm me-2' role='status'></span><span class='sr-only'>Loading...</span>");
	var data=new FormData();
	data.append("type", "2");
	data.append("code", $("#code").val());
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		msg(this.responseText);
		$("#verify").html("verify");
	}
	xhttp.open("POST", "change_pwd_functions.php");
	xhttp.send(data);
}
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	

 <script src="main-ind.js"></script>
</body>
</html>