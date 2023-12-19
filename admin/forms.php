<?php
	session_start();
	if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
		header("location: index.php");
		exit();
	}
?>
<?php
include("uhsdcon.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="main-ind.css">
<style>

	.close{
		background-color:#fff;
		border:none;
		border-radius:6px;
		text-align:center;
		position:absolute;
		width:30px;
		height:30px;
		color:#aaa;
		top:0px;
		right:0px;
	}
	.desc{
		position:fixed;
		width:calc(80% - 310px);
		height:75%;
		padding:30px;
		left:calc(10% + 250px);
		top:80px;
		border-radius:6px;
		box-shadow:0px 0px 8px #07f;
		background-color:#fff;
		overflow:auto;
		visibility:hidden;
		z-index:5;
	}
	.desc-cont{
		overflow:auto;
	}

    .bar{
        height: 30px;
        margin:10px;
        padding: 10px;
        background-color:#ddd;
    }
    .buttonadd{
        
        display: block;
        outline: none;
        border: none;
        float: right;
        width:60px;
        height:20px;
        color:white;
       /* margin: 0px 0px auto auto;*/
        text-align:center;
        padding:5px;
        background-color:#07f;
        border-radius:4px;
    }
	.card{
		background-color:#fff;
		border-radius:4px;
		width:min(600px, 80%);
		margin-left:calc((100% - min(600px, 80%))/2);
		margin-top:4px;
		min-height:60px;
		overflow:auto;
	}
	.detail{
		display:block;
		padding-left:10px;
		overflow:hidden;
	}
	.celement{
		width:50%;
		float:left;
		margin-block:10px;
	}
	.button{
		color:white;
		margin:8px 15px auto auto;
		text-align:center;
		background-color:#07f;
		width:80px;
		height:25px;
		border-radius:5px;
	}

	.button > div{
		padding-top:5px;
		height:20px;
		width:38px;
		font-size: 11px;
		text-align: center;
		background-color: inherit;
		float: left;
		
	}
	.mid-button{
		border-inline:solid #fff 2px;
	}
	.left-button{
		border-radius:5px 0px 0px 5px;
		border-right:solid #fff 2px;
	}
	.right-button{
		border-radius:5px;
	}
	.name{
		font-size:18px;
	}
	.email{
		font-size:12px;
		color:#888;
	}
	.form-elem{
		background-color:#eee;
		padding:10px;
		min-height:80px;
	}
	.ques{
		background-color:#ddd;
	}
	.ans{
		padding-left:20%;
		border-bottom:solid #ccc 1px;

	}
	.ans-del{
		margin-top:10px;
		font-size:13px;
		width:50px;
		padding:7px;
		background-color:#07f;
		color:white;
		border-radius:5px;
	}
	.form-cont{
		margin-bottom:10px;
	}
	.ans-text{
		font-size:15px;
		color:#333;
	}
	.reply{
		font-size:12px;
		color:#888;
		margin-bottom:10px;
	}
	::-webkit-scrollbar{
	width:4px;
	}
	::-webkit-scrollbar-track{
		margin-block:20px;
		background:#fff;
	}
	::-webkit-scrollbar-thumb{
		background-color:#07f;
		border-radius:4px;
	}
	.notification{
		background-color:rgba(68, 68, 68, 1);
		padding:10px;
		color:white;
		position:fixed;
		width:250px;
		top:70px;
		left:calc((100% - 250px) / 2);
		display:none;
	}
	@keyframes fadeout{
		0%{
			opacity:1;
		}
		100%{
			opacity:0;
		}
	}
	@media (orientation:portrait){
	.desc{
		width:calc(80% - 60px);
		left:10%;
	}
	}
	@media screen and (max-width:725px){
		.desc{
			width:calc(80% - 60px);
			left:10%;
		}
	}

</style>
</head>
<body>




	<div class="top-bar">
	<img class="panel-icon" src="picon.png" onclick="openPanel()"><div class="logo">USHD</div><div class="logout" onclick="logout()"><label class="lg-text">logout</label><i class="pdl flr fa fa-sign-out" aria-hidden="true"></i></div>
	</div>
	<div class="panel" id="panel">
	<br>
	<br>
	<div class="item sfont" onclick="setPage(0)" id="item1"><i class="flt fa fa-tachometer" aria-hidden="true"></i>dashboard</div>
	<div class="item hide sfont" onclick="setPage(1)" id="item2"><i class="flt fa fa-book" aria-hidden="true"></i>lecture material</div>
	<div class="item sfont" onclick="setPage(2)" id="item3"><i class="flt fa fa-user" aria-hidden="true"></i>Student</div>
	<div class="item sfont" onclick="setPage(3)" id="item4"><i class="flt fa fa-sticky-note" aria-hidden="true"></i>notice</div>
	<div class="item  sd-active sfont" onclick="setPage(4)" id="item5"><i class="flt fa fa-comments" aria-hidden="true"></i>form</div>
	<div class="item sfont" onclick="setPage(5)" id="item6"><i class="flt fa fa-sitemap" aria-hidden="true"></i>course<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(6)" id="item7" >view courses</div>
	<div class="drop-item sfont" onclick="setPage(7)" id="item8" >create course</div>
	<div class="drop-item sfont" onclick="setPage(8)" id="item9" >manage course</div>
	<div class="item hide sfont" onclick="setPage(9)" id="item10">item1</div>
	</div>







	
	
	
	<div class="cont" id="cont">
	
	<div class="notification" id="notification"></div>

	<div class="bar">
			<div class="buttonadd" onclick="openFileAdd()">add<i class="fa fa-plus-circle" aria-hidden="true"></i></div>
    </div>
	
	
	
	<div id="frmcont">
	</div>
	
	
	
	
	<div class="desc" id="desc">
	<button class="close sfont" onclick="stEditClose()">X</button>
	
	
	</div>
	
	
	</div>

<script src="main-ind.js "></script>
<script>
var notification;
var frmcont;
var desc;
window.addEventListener("load", init, false);
function init(){
	desc=document.getElementById("desc");
	notification=document.getElementById("notification");
	frmcont=document.getElementById("frmcont");
	updateForms();
}
function stEditClose(){
	desc.style.visibility="hidden";
}
function setEditOpen(qid){
	desc.style.visibility="visible";
	desc.innerHTML="";
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		 desc.innerHTML=this.responseText;
	}
	xhttp.open("POST", "fqform.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("qid="+qid);
}
function updateForms(){
	frmcont.innerHTML="";
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		 frmcont.innerHTML=this.responseText;
	}
	xhttp.open("POST", "retforms.php");
	xhttp.send("");
}
function delForm(index){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		 notice(this.responseText);
		 
		 updateForms();
	}
	xhttp.open("POST", "delform.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("qid="+index);
}
function notice(message){
	notification.innerHTML=message;
	notification.style.display="block";
	notification.style.animation="fadeout 4s";
	setTimeout(function(){
		notification.style.display="none";
	}, 3000);
}
</script>
</body>
</html>