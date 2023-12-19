<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
	 <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css" />
	 <link rel="stylesheet"href="fontawesome-free-6.2.1-web/js/all.js"/>
	 <link rel="stylesheet"href="main1.css"/>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
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
		max-width:480px;
	}
	</style>
</head>
<body>
<div id="notification" class="notification bg-dark text-white rounded-3" role="alert"></div>




<div class="p-1 mt-5">
<div class='form-res bg-white rounded-2 mx-auto my-2'>
<div class="p-4 text-center fw-bold fs-2 mt-4">Verify your E-mail</div>
<div class="">
<input type="text"  class="form-control p-2 rounded-3" id="email" style="background-color:rgba(57,57,57,0.2)" placeholder="Enter your E-mail">
<button class="btn btn-secondary mt-3 fw-semibold fs-5 rounded-3" id="send" onclick="sendCode()">Send Code</button>
</div>
</div>


<div class='form-res bg-white mx-auto py-2'>
<input class="form-control p-2 rounded-3 " type="text" id="code" style="background-color:rgba(57,57,57,0.2)" placeholder='Enter O-T-P(Check your E-mail)'>
<button class="btn btn-secondary mt-3 fw-semibold fs-5 rounded-3" id="verify" onclick="verifyCode()">Verify</button>
</div>
</div>




<script>
function sendCode(){
	$("#send").html("<span class='spinner-border spinner-border-sm me-2' role='status'></span><span class='sr-only'>Sending...</span>");
	var data=new FormData();
	data.append("type", "1");
	data.append("email", $("#email").val());
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		msg(this.responseText);
		$("#send").html("Send Code");
		$("#email").val("");
	}
	xhttp.open("POST", "change_pwd_functions.php");
	xhttp.send(data);
}
function verifyCode(){
	$("#verify").html("<span class='spinner-border spinner-border-sm me-2' role='status'></span><span class='sr-only'>Loading...</span>");
	var data=new FormData();
	data.append("type", "2");
	data.append("code", $("#code").val());
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		if(this.responseText=="1"){
			window.location.href="changepass.php";
		}
		else{
			msg(this.responseText);
		}
		$("#verify").html("verify");
	}
	xhttp.open("POST", "change_pwd_functions.php");
	xhttp.send(data);
}
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	

 <script src="admin/main-ind.js"></script>
</body>
<?php include("include/footer.php");?>
</html>