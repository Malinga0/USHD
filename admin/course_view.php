</html>
 <head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="main-ind.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <style>
 body{
font-family:verdana;
 background-color:#eee;
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
 .sd-course-card{
	border-radius:5px;
	background-color:white;
	margin-left:calc((100% - min(600px, 90%))/2);
	width:min(600px, 90%);
	display:flex;
	align-items:center;
	margin-block:10px;
 }
 .course-id{
 width:100%;
 }
 .sd-course-card-elem{
	overflow:hidden;
	flex:1;
	text-align:center;
	word-break: break-word;
	padding-inline:10px;
	background:linear-gradient(113deg, #07f, #e13fe1);
	border-radius:5px 0px 0px 5px;
	color:white;
	font-weight:bold;
	align-self:stretch;
	display:flex;
	align-items:center;
 }
 .sd-course-card-elem-action{
	overflow:hidden;
	width:90px
 }
 .sd-course-card-elem-ex{
	overflow:hidden;
	flex:3;
	padding: 10px;
 }
 .sd-course-card-details{
 padding-inline:10px;
 }
 .sd-course-card-actions {
    text-align: center;
    letter-spacing: 5px;
    margin-block: 10px;
    font-size: 20px;
}
.text-main{
	font-size:18px;
	color:black;
	padding-bottom:10px;
}
.text-sub{
	font-size:14px;
	color:#666;
}

.sd-course-filter{
background-color:#ddd;
display:flex;
flex-wrap: wrap;
align-content: center;
justify-content: flex-start;
margin:10px;
padding-block:10px;
}
.sd-course-filter-elem{
margin:10px 20px;
}
.button-ic{
background-color:#07f;
color:white;
padding:3px 20px;
border-radius:4px;
}
.sd-filter-label{
margin-right:10px;
display:inline-block;
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
width:60%;
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
		width:90%;
		left:5%;
	}
}
@media screen and (max-width:725px){
	.floating-form{
		width:90%;
		left:5%;
	}
}
.bar{
margin:10px;
background-color:#ddd;
height:50px;
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
.drop-down{
	background-color:#ccc;
	padding:3px;
	border-radius:4px;
}
.drop-down > select{
	outline:none;
	border:none;
	background-color:#ccc;
}


.pdl {
    margin-top:0px;
}
 </style>
 </head>
 <body onload="setActive('item6')">
<?php include("admin_header.html")?>

		
<div class="cont" id="cont" src="dash.php">





<div id="floatFormEdit" class="floating-form">

 </div>



 
 <div id="floatForm" class="floating-form">
 <button class="close-form sfont" onclick="courseTog()"><i class='fa fa-times'></i></button>
 
	<label class="form-title sfont">Create course</label>
	
	<label class="form-label">Department </label>
		<div class="form-input-align">
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ALL]" value="ALL" id="call">
			ALL</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ICT]" value="ICT" id="cict">
			ICT</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[IAT]" value="IAT" id="ciat">
			IAT</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ET]" value="ET" id="cet">
			ET</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[AT]" value="AT" id="cat">
			AT</label></div>
	 <label class="form-label">Year</label>
	<select class="form-input" name="year" id="cyear">
		<option value=""></option>
		<option value="1st">1st</option>
		<option value="2nd">2nd</option>
		<option value="3rd">3rd</option>
		<option value="4th">4th</option>
	</select>
	
	<label class="form-label">Semester </label>
                               
	<select class="form-input" name="sem" id="csem">
		<option value=""></option>
		<option value="1st">1st</option>
		<option value="2nd">2nd</option>
	</select>
	  
	<label class="form-label">course ID</label>
	<input type="text" class="form-input" placeholder="Enter course id" id="cid">

	<label class="form-label">course </label>
	<input type="text" class="form-input" placeholder="Enter course name" id="cname">
	<button class="form-add" onclick="createCourse()">add</button>

 </div>
 
 
 
 
 
 	<div class="notification" id="notification"></div>
	
	
<div class="bar">
<div class="add sfont" onclick="courseTog()">add <i class="flt-c fa fa-plus" aria-hidden="true"></i></div>

</div>

 <div class="sd-course-filter">
	<div style="margin-right:-20px;" class="sd-course-filter-elem">

		<label class="">Department:</label>
	   </div>
	   	<div  class="sd-course-filter-elem">

			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ALL]" value="ALL" id="fall">
			ALL</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ICT]" value="ICT" id="fict">
			ICT</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[IAT]" value="IAT" id="fiat">
			IAT</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ET]" value="ET" id="fet">
			ET</label>
			<label class="sd-filter-label" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[AT]" value="AT" id="fat">
			AT</label>

	 
	</div>
	<div class="sd-course-filter-elem drop-down">
		<label class="">Year:</label>
		
			<select class="" name="year" id="fyear">
				<option value="none">all</option>
				<option value="1st">1st</option>
				<option value="2nd">2nd</option>
				<option value="3rd">3rd</option>
				<option value="4th">4th</option>
			</select>
	   
	</div>
	<div class="sd-course-filter-elem drop-down">
		<label class="">Semester:</label>
		
			<select class="" name="sem" id="fsem">
				<option value="none">all</option>
				<option value="1st">1st</option>
				<option value="2nd">2nd</option>
			</select>
	   
	</div>
	<div class="sd-course-filter-elem button-ic" onclick="loadCourses()"><i class="fa fa-filter" aria-hidden="true"></i></div>

 </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <div id="cardContainer">
 
 
 </div>
 
 </div>
	<script>
window.addEventListener("load", init, false);
function init(){
	loadCourses();	
}
function loadCourses() {
	element("cardContainer").innerHTML="<div style='color:#07f;text-align:center;margin-top:50px'><i  class='fa fa-spinner fa-pulse fa-lg fa-2x'></i></div>";
	var data=new FormData();
	var dep="";
	if(isSet("fall")){
		dep+=getValue("fall");
	}
	if(isSet("fict")){
		dep+=getValue("fict");
	}
	if(isSet("fiat")){
		dep+=getValue("fiat");
	}
	if(isSet("fet")){
		dep+=getValue("fet");
	}
	if(isSet("fat")){
		dep+=getValue("fat");
	}
	if(dep==""){
		dep="none";
	}
	data.append("type", "1")
	data.append("dep", dep);
	data.append("year", getValue("fyear"));
	data.append("sem", getValue("fsem"));
	
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    element("cardContainer").innerHTML=this.responseText;
  }
  xhttp.open("POST", "course_functions.php");
  xhttp.send(data);
}
function createCourse(){
	var data=new FormData();
	var dep="";
	if(isSet("call")){
		dep+=getValue("call");
	}
	if(isSet("cict")){
		dep+=getValue("cict");
	}
	if(isSet("ciat")){
		dep+=getValue("ciat");
	}
	if(isSet("cet")){
		dep+=getValue("cet");
	}
	if(isSet("cat")){
		dep+=getValue("cat");
	}
	if(dep==""){
		msg("please select department");
		return 0;
	}
	if(getValue("cyear")==""){
		msg("please select year");
		return 0;
	}
	if(getValue("csem")==""){
		msg("please select semester");
		return 0;
	}
	if(getValue("cid")=="" || getValue("cid")==" "){
		msg("please enter course id");
		return 0;
	}
	if(getValue("cname")=="" || getValue("cname")==" "){
		msg("please enter course name");
		return 0;
	}
	data.append("type", "2");
	data.append("dep", dep);
	data.append("year", getValue("cyear"));
	data.append("sem", getValue("csem"));
	data.append("id", getValue("cid"));
	data.append("name", getValue("cname"));
	
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		msg(this.responseText);
		loadCourses();
	}
	xhttp.open("POST", "course_functions.php");
	xhttp.send(data);
}
function courseSaveChanges(id){
	var data=new FormData();
	var dep="";
	if(isSet("eall")){
		dep+=getValue("eall");
	}
	if(isSet("eict")){
		dep+=getValue("eict");
	}
	if(isSet("eiat")){
		dep+=getValue("eiat");
	}
	if(isSet("eet")){
		dep+=getValue("eet");
	}
	if(isSet("eat")){
		dep+=getValue("eat");
	}
	if(dep==""){
		msg("please select department");
		return 0;
	}
	if(getValue("eyear")==""){
		msg("please select year");
		return 0;
	}
	if(getValue("esem")==""){
		msg("please select semester");
		return 0;
	}
	if(getValue("eid")=="" || getValue("eid")==" "){
		msg("please enter course id");
		return 0;
	}
	if(getValue("ename")=="" || getValue("ename")==" "){
		msg("please enter course name");
		return 0;
	}
	data.append("type", "4");
	data.append("oldid", id)
	data.append("dep", dep);
	data.append("year", getValue("eyear"));
	data.append("sem", getValue("esem"));
	data.append("id", getValue("eid"));
	data.append("name", getValue("ename"));
	
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		msg(this.responseText);
		loadCourses();
	}
	xhttp.open("POST", "course_functions.php");
	xhttp.send(data);
}
function delCourse(id){
	var data=new FormData();
	data.append("type", "5");
	data.append("id", id);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		msg(this.responseText);
		loadCourses();
	}
	xhttp.open("POST", "course_functions.php");
	xhttp.send(data);
}
function editCourse(cid){
	var data=new FormData();
	element("floatFormEdit").innerHTML="";
	courseEditTog();
	
	data.append("type", "3");
	data.append("id", cid);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		element("floatFormEdit").innerHTML=this.responseText;
	}
	xhttp.open("POST", "course_functions.php");
	xhttp.send(data);
}
function courseTog(){
	if(element("floatForm").style.visibility=="hidden"){
		element("floatForm").style.visibility="visible";
	}
	else{
		element("floatForm").style.visibility="hidden";
	}
}
function courseEditTog(){
	if(element("floatFormEdit").style.visibility=="hidden"){
		element("floatFormEdit").style.visibility="visible";
	}
	else{
		element("floatFormEdit").style.visibility="hidden";
	}
}

	</script>
 	<script src="main-ind.js "></script>
 </body>
</html>