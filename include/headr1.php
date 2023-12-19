<?php
session_start();
include("uhsdcon.php");
$query1 = mysqli_query($conn,"select * FROM user WHERE user_id=".$_SESSION['id']." ")or die(mysqli_error());
$rowoprof=mysqli_fetch_row($query1);
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main1.css">
	  <link rel="stylesheet" href="1style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="style-nav.css" />
   <title>USHD</title>
   <style>
   
.panel-body{
    box-shadow:0px 0px 8px 2px #bbb, 8px 8px 18px 0px #ddd;
    border-radius:5px;
  

}
   html { 
  background: url('main page.jpg') repeat right center fixed; 
  -webkit-background-size: 1300px;
  -moz-background-size: 1300px;
  -o-background-size: 1300px;
  background-size: 1300px;
 
}
/*html{ width:100%; height:100%; 
      background:#fff url('main page.jpg') center center no-repeat;
      background-attachment: fixed;
      background-size:100% auto;
}*/
   
   
   .sd-color-fade{
	color:#666;
}
.sd-card-sub-container{
	display:flex;
	align-items: center;
}
.sd-card-float-elem{
	padding:10px;
} 
.sd-card-float-elem-left{
	width:130px;
}  
.sd-card-float-elem-right{
	border-left:solid 5px #aaa;
	background-color:#f0f0f0;
	width:calc(100% - 140px);
}
body{
	overflow:hidden auto;
}
.sd-prof-img{
	border-radius:50%;
	width:110px;
	height:110px;
	margin-left:calc(50% - 60px);
	padding:10px;
	object-fit:cover;
}
.sd-text-center{
	text-align:center;
	display:block;
	overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-all;
}
.form-input{
width:60%;
height:40px;
margin-left:20%;
border-radius:4px;
border:solid #ddd 1px;
}
.form-input-file{
	margin-left:20%;
	width:60%;
}
.form-label{
display:block;
margin-left:20%;
width:80%;
margin-top:10px;
padding:8px 0px 0px 0px;
color:#777;
}
.form-title{
display:block;
text-align:center;
padding:20px;
background-color:#ddd;
border-bottom:solid 5px #aaa;
}
.form-input:focus{
box-shadow:0px 0px 4px #07f;
outline:solid #0d6efd 1px;
}
.form-add{
display:block;
width:60%;
height:40px;
margin-left:20%;
margin-top:20px;
margin-bottom:10px;
color:white;
text-align:center;
background-color:#0d6efd;
border-radius:4px;
border:solid #0d6efd 1px;
}
.sd-form-cont{
    background-color:white;
	margin-top:50px;
	margin-left:calc((100% - 500px) / 2);
	width:500px;
	border-radius:10px;
	box-shadow:0px 0px 8px 2px #bbb, 8px 8px 18px 0px #ddd;
	padding-bottom:10px;
}
	@media (orientation:portrait){
	.sd-form-cont{
		width:80%;
		margin-left:10%;
	}
	}
   
 
 
 
   
   
   
   
.sd-form-btn{
    padding:0px 15px 0px 15px;
    background-color:#07f;
    border-radius:4px;
    margin-left:10px;
    color:white;
    outline:none;
    border:none;
}
.sd-form-label{
    margin-left:10px;
}
.sd-form-container{
   width:90%;
   margin-block:10px;
   margin-left:calc(10vw / 2);
   background-color:#ddd;
   border-radius:5px;
   padding:20px;
}
.sd-form-elem{
    border-radius:5px;
    border:none;
    outline:none;
}
.sd-card-container{
	display:flex;
	flex-wrap:wrap;
	justify-content:center;
}
.sd-card{
	margin:20px;
	width:300px;
	height:200px;
	overflow:hidden;
	background-color:#fefefe;
	padding-bottom:20px;
	overflow:hidden;
	border-radius:10px;
	box-shadow:0px 0px 8px 2px #bbb, 8px 8px 18px 0px #ddd;
}
.sd-card:nth-child(odd) .sd-card-elem-top{
   	border-bottom:solid 5px #0b2;
	background-image:URL("patern2.jpg"); 
}
.sd-card:nth-child(3n) .sd-card-elem-top{
   	border-bottom:solid 5px #666;
	background-image:URL("patern3.jpg"); 
}


.sd-card-elem-top{
	height:75%;
	text-align:center;
	padding-top:50px;
	font-size:24px;
	font-weight:bold;
	border-bottom:solid 5px #0bd;
	background-image:URL("patern.jpg");
	background-size: 300px 200px;
	text-shadow: 0 2px 2px white, 2px 0 2px white,0 -2px 2px white, -2px 0 2px white,  0 2px 10px white, 2px 0 10px white,0 -2px 10px white, -2px 0 10px white;
}

.sd-card-elem-bottom{
	background-color:#fefefe;
	color:#666;
	height:70px;
	font-size:20px;
	text-align:center;
	padding-inline:10px;
	padding-block:0px;
	overflow:hidden;
}
@media (orientation:portrait){
	.sd-card-container{
		flex-direction:column;
	}
	.sd-card{
		width:75%;
		margin-left:calc(25% / 2);
	}
}













	.menu{
		font-size:20px;
	}
   .icon-notify{
	   position:absolute;
       transform: translate(15px, -20px);
	   border-radius: 50%;
	   background-color:rgba(0,0,0,0);
	   font-size:10px;
	   font-weight:bold;
	   color:rgba(0,0,0,0);
	   padding:1px 2px 1px 2px;
   }
   .sendrecv-cont{
	   display:table;
	   width:calc(100% - 2px);
   }
   .msg-recv{
	   max-width:calc(100% - 50px);
	   color:black;
	   border-radius:0px 8px 8px 8px;
	   margin-block:10px;
	   display:block;
	   position:relative;
	   float:left;
	   margin-left:10px;
	   padding:0px 7px 7px 7px;
	   background-color:#ddd;
	   word-wrap:break-word;
	    word-break: break-all;
   }
   .msg-send{
	   color:black;
	   border-radius:8px 8px 0px 8px;
	   margin-block:10px;
	   display:block;
	   position:relative;
	   float:right;
	   margin-right:10px;
	   padding:7px 7px 0px 7px;
	   background-color:#bdf;
	   max-width:calc(100% - 50px);
	   word-wrap:break-word;
	   word-break: break-all;
   }
   .triang-left{
	  margin-left:-17px;
	   width:0px;
	   height:0px;
	   border-left:10px solid transparent;
	   border-top:10px solid #ddd;
   }
   .triang-right{
	  margin-left:calc(100% + 7px);
	   width:0px;
	   height:0px;
	   border-left:10px solid #bdf;
	   border-top:10px solid transparent;
   }

   .msg-bottom{
	   background-color:red;
	   margin-top:10px;
   }
   .msg-bottom-button{
	   float:right;
	   background-color:#07f;
	   padding:7px;
	   border-radius:5px;
   }
   .msg-bottom-text{
	   float:right;
	   width:calc(100% - 30px);
	   height:30px;
	   border:1px solid #07f ;
	   border-radius:5px 0px 0px 5px;
	   outline:none;
   }
   .msg-profile{
	   width:50px;
	   height:50px;
	   border-radius:50%;
	   object-fit:cover;
   }
   .title-bar{
	   background-color:#ddd;
	   color:black;
	   padding:10px;
	   border-radius:5px 5px 0px 0px;
	   font-size:18px;
	   overflow:hidden;
	   white-space:nowrap;
	   text-overflow:ellipsis;
   }
   .msg-cards{
	   height:70px;
	   margin-block:3px;
	   background-color:#eee;
	   color:black;
   }
   .card-cont{
	   margin-top:8px;
	   height:calc(100% - 100px);
	   overflow:hidden auto;
   }
   .msg-card-elem{
	   padding:10px;
	   float:left;
	   background-color:inherit;
	   overflow:hidden;
   }
   .expand{
	   white-space:nowrap;
	   width:calc(100% - 120px);
	   overflow:hidden;
   }
   .msg-card-notify-cont{
	   float:right;
	   height:inherit;
	   width:50px;
	   padding:15px;
   }
   .msg-card-notify{
	   font-size:12px;
	   background-color:#a00;
	   text-align:center;
	   padding-inline:3px;
	   color:white;
	   border-radius:50%;
	   margin-top:50%;
   }
   .msg-card-title{
	   font-size:18px;
	   overflow:hidden;
	   text-overflow:ellipsis;
   }
   .msg-card-sub{
	   font-size:13px;
	   color:#777;
	   overflow:hidden;
	   text-overflow:ellipsis;
   }
   
   .profile{
	   width:30px;
	   height:30px;
	   border-radius:50%;
	   margin-right:10px;
	   object-fit:cover;
   }
   	.close{
		background-color:rgba(0,0, 0,0);
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
		.back{
		background-color:rgba(0,0, 0,0);
		border:none;
		border-radius:6px;
		text-align:center;
		position:absolute;
		width:30px;
		height:30px;
		color:#aaa;
		top:0px;
		left:0px;
	}
	
	.desc{
		color:white;
		position:absolute;
		width:400px;
		height:75%;
		padding:30px 20px 20px 20px;
		right:20px;
		top:100px;
		border-radius:6px;
		box-shadow:0px 0px 8px #07f;
		background-color:rgb(250, 250, 250);
		visibility:hidden;
		z-index:6;
	}
	.desc-cont{
		color:black;
		overflow:auto;
		height:75%;
		padding-bottom:40px;
		word-break: break-all;
	}
	.desc-title{
		color:black;
		font-size:20px;
		border-bottom:solid #07f 2px;
		text-align:center;
	}
	.desc-date{
		color:grey;
		font-size:12px;
		text-align:right;
	}
	.desc-control{
		color:black;
		position:absolute;
		bottom:10px;
		width:40%;
		left:30%;
		display:flex;
	}
	.desc-control-cont{
		overflow:hidden;
		flex:1;
		text-align:center;
		font-size:16px;
		background-color: #eee;
		border-radius:4px;
	}
	.desc-control-cont:hover{
		background-color:#ccc;
	}
	@media screen and (max-width:725px){
	.desc{
		top:10px;
		width:80%;
		right:10px;
	}
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
.result-card{
	width:100%;
	max-width:600px;
}








.button{
    display: block;
    outline: none;
    border: none;
    width: 60px;
    height: 20px;
	margin-left:10px;
	margin-block:5px 10px;
    color: white;
    text-align: center;
    padding: 5px;
    background-color: #07f;
    border-radius: 4px;
	cursor:default;
 }

.text-main{
	font-size:18px;
	color:black;
	padding-bottom:10px;
}
.text-sub{
	font-size:14px;
}
.text-sub-topic{
	color: #888;
}




.form-input{
width:60%;
height:40px;
margin-left:20%;
border-radius:4px;
border:solid #ddd 1px;
}
.form-input-align{
margin-left:20%;
}
.form-label{
display:block;
margin-left:20%;
width:80%;
margin-top:10px;
padding:8px 0px 8px 0px;
}
.form-title{
display:block;
text-align:center;
padding:20px;
border-bottom:solid #07f 1px;
}
.form-input:focus{
box-shadow:0px 0px 4px #07f;
outline:solid #07f 1px;
}
.form-add{
cursor:default;
border:none;
outline:none;
display:block;
margin-left:20%;
margin-top:10px;
margin-bottom:10px;
color:white;
text-align:center;
padding-block:5px;
padding-inline:10px;
background-color:#07f;
height:30px;
border-radius:4px;
}
.close-form{
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
.floating-form{
position:fixed;
width:calc(80% - 250px);
height:80%;
left:calc(10% + 250px);
top:80px;
border-radius:6px;
box-shadow:0px 0px 8px #07f;
background-color:#fff;
overflow:auto;
visibility:hidden;
z-index:5;
}
@media (orientation:portrait){
	.floating-form{
		width:80%;
		left:10%;
	}
}
@media screen and (max-width:725px){
	.floating-form{
		width:80%;
		left:10%;
	}
}
.bar{
margin:10px;
background-color:#ddd;
height:50px;
}
.bar-title{
    float: left;
    /* background-color: bisque; */
    margin-top: 15px;
    padding-inline: 10px;
    font-weight: bold;
    color: #777;
}
.add{
margin:10px 10px auto auto;
float:right;
color:white;
text-align:center;
padding:5px;
display:block;
background-color:#07f;
width:60px;
height:20px;
border-radius:4px;
}
 .sd-course-card{
	margin-block:10px;
    border-radius: 5px;
    background-color: white;
    margin-left: calc((100% - min(600px, 90%))/2);
    width: min(600px, 90%);

 }

 .sd-course-card-elem{
	display: flex;
    align-items: center;
 }

 .sd-course-card-elem-ex{

 }
 .sd-course-card-details{
	background-color:#ccc;
	padding:10px;
    text-align: center;
    border-bottom: solid #eee 1px;
    word-break: break-all;
	border-radius:5px 5px 0px 0px;
 }
 .sd-course-card-material{
    width: 110px;
    padding-block: 10px;
 }
.sd-course-card-actions-corner{
width: 60px;
padding: 5px;
background-color: #0077ff1f;
float: right;
border-radius: 0px 5px;
}
.sd-course-card-elem-action{
height:26px;
}
.sd-course-card-actions {
height:26px;
text-align: right;
letter-spacing: 5px;
margin-block: 0px;
font-size: 18px;

}
.sd-file-name{
	text-align: center;
    font-size: 14px;
    padding: 10px;
    word-break: break-all;
}
   </style>
   
 </head>
 <body style="background-color: rgba(0,0,0,0);">
   <nav class="navbarv">
     <!-- LOGO -->
     <div> <img src="logo.png" class="img"></div></div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- USING CHECKBOX HACK -->
       <input type="checkbox" id="checkbox_toggle" />
       <label for="checkbox_toggle" class="hamburger">&#9776;</label>
       <!-- NAVIGATION MENUS -->
       <div class="menu">
        <li><a href="home.php"><i style="color: red;" ></i>Home</a></li>
            <li><a href="st_cs_viwe.php"><i style="color: red;" ></i>Course</a></li>
            <li><a href="forum.php"><i style="color: red;" ></i>Forum</a></li>
            <li><a href="st_result_viwe.php"><i style="color: red;" ></i>Result</a></li>
            <li><a href="about.php"><i style="color: red;" ></i>About</a></li>
            <li >
                <a  href="#"><i onclick="stEditClose()" class="fa fa-fw fa-bell " style="color: red;"></i></a>
            </li>
			<li >
                <a  href="#"><i onclick="setMsgBox()" class="fa fa-fw fa-comments" style="color: red;"><div id="navNotify" class="icon-notify"></div></i></a>
            </li>
		    <li class="services">
           <a><img class="profile" src="<?php echo $rowoprof[10]; ?>"><i style="padding-inline:10px" class="flr fa fa-caret-down" aria-hidden="true"></i></a>
           <!-- DROPDOWN MENU -->
           <ul class="dropdown">
             <li><a href="change_password.php">edit</a></li>
             <li><a href="logout.php">log out</a></li>
           </ul>
         </li>
		 
       </div>
     </ul>
	 
	 <div class="desc" id="desc">

	</div>
	<div class="desc" id="msg">
		
	</div>
	
   </nav>
 <script>
 var desc;
 window.addEventListener('load', function(){
	 desc=document.getElementById("desc");
	 retNotice(0);
 }, false);
 	function retNotice(nIndex){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 desc.innerHTML=this.responseText;
			
		}
		xhttp.open("POST", "retnote.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("nid="+nIndex);
	}
	function stEditClose(){
	    msg=document.getElementById('msg');
		msg.style.visibility='hidden';
		if(desc.style.visibility == 'hidden'){
			desc.style.visibility='visible';
		}
		else{
			desc.style.visibility='hidden';
		}
	}
</script> 
<script>

    
var chCount=<?php $queryco = mysqli_query($conn,"select * FROM message WHERE sender_id=".$_SESSION['id']." OR reciever_id=".$_SESSION['id']." ")or die(mysqli_error());
				  $chCount=mysqli_num_rows($queryco);
				  echo $chCount;?>;
var curid;
var cardCont;
var inchat;
var msg;
var sendm;
var navNotify;
window.addEventListener('load', function(){
	msg=document.getElementById('msg');
	sendm=document.getElementById('sendm');
	cardCont=document.getElementById('cardCont');
	navNotify=document.getElementById("navNotify");
	
	retCurrentChats();
},false);

async function mainloop(){
	
	
	checkNew();
	
}

function setMsgBox(){
	inchat=2;
	desc.style.visibility='hidden';
	if(msg.style.visibility == 'hidden'){
			msg.style.visibility='visible';
			retCurrentChats();
	}
	else{
			msg.style.visibility='hidden';
	}
}
function retCurrentChats(){
	inchat=2;
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 msg.innerHTML=this.responseText;
			 var len=this.responseText.length;
			 if(this.responseText[len-4]=="+"){
			     navNotify.style.color="rgba(180,0,0,255)";
				 navNotify.style.backgroundColor="rgba(255, 255, 255, 255)";
				 navNotify.innerHTML="9+";
			 }
			 else if(this.responseText[len-4]=="0"){
				 navNotify.style.color="rgba(0,0,0,0)";
				 navNotify.style.backgroundColor="rgba(0,0,0,0)";
			 }
			 else{
				 navNotify.style.color="rgba(180,0,0,255)";
				 navNotify.style.backgroundColor="rgba(255, 255, 255, 255)";
				 navNotify.innerHTML=this.responseText[len-4];
			 }
			
			setInterval(mainloop, 10000);
		}
		xhttp.open("POST", "retCurrentChats.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("sid="+<?php echo $_SESSION['id'];?>);
}
function retChat(rid){
		curid=rid;
		inchat=1;
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 msg.innerHTML=this.responseText;
			cardCont=document.getElementById('cardCont');
			cardCont.scrollTo(0, cardCont.scrollHeight);
			$("#sendm").keypress(function(e){
                if(e.which == 13) {
                    console.log($("#revid").val());
                    sendMsg($("#revid").val());
                }
			});
			setInterval(mainloop, 10000);
		}
		xhttp.open("POST", "retChat.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("sid="+<?php echo $_SESSION['id'];?>+"&rid="+rid);
}
function checkNew(){
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			var newcount=this.responseText;
			if((parseInt(newcount) != chCount) && !isNaN(parseInt(newcount))){
				console.log(newcount);
				if(inchat==1){
				retChat(curid);
				}
				else if(inchat==2){
				retCurrentChats();
				}
				chCount=parseInt(newcount);
			 }
			 
		}
		xhttp.open("POST", "checkNew.php");
		//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send();
}
function sendMsg(rid){
		sendm=document.getElementById('sendm');
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 retChat(rid);
			
		}
		xhttp.open("POST", "sendMsg.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("sid="+<?php echo $_SESSION['id'];?>+"&rid="+rid+"&msg="+sendm.value);
}
function startNew(){
		inchat=3;
		var xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 msg.innerHTML=this.responseText;
		}
		xhttp.open("POST", "newChat.php");
		//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send();
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<!-- -->