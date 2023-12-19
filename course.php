<?php
include("include2/header.php");
?>

<?php
include("uhsdcon.php");
?>

	<div class="notification" id="notification"></div>
	<div class="container-fluid bg-white my-3 d-flex  justify-content-end p-2 bg-white">


<button type="button" class="btn btn-primary justify-content-end" data-bs-toggle="modal" data-bs-target="#addresult">
 <i class="fa-solid fa-plus me-2"></i> Add
</button>

<div class="modal fade" id="addresult" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-5">
		<div class="mb-3">
		<label class="form-label">Department </label>
		<div class="">
			<label class="me-2" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ALL]" value="ALL" id="call">
			ALL</label>
			<label class="me-2" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ICT]" value="ICT" id="cict">
			ICT</label>
			<label class="me-2" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[IAT]" value="IAT" id="ciat">
			IAT</label>
			<label class="me-2" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ET]" value="ET" id="cet">
			ET</label>
			<label class="me-2" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[AT]" value="AT" id="cat">
			AT</label></div>
		</div>
		<div class="mb-3">
			<label class="form-label">Year</label>
			<select class="form-control" name="year" id="cyear">
			<option value=""></option>
			<option value="1st">1st</option>
			<option value="2nd">2nd</option>
			<option value="3rd">3rd</option>
			<option value="4th">4th</option>
			</select>
		</div>
		<div class="mb-3">
		<label class="form-label">Semester </label>
                               
		<select class="form-control" name="sem" id="csem">
			<option value=""></option>
			<option value="1st">1st</option>
			<option value="2nd">2nd</option>
		</select>
		</div>
		<div class="mb-3">
			<label class="form-label">course ID</label>
			<input type="text" class="form-control" placeholder="Enter course id" id="cid">
		</div>
		<div class="mb-3">
		  <label class="form-label">course </label>
	<input type="text" class="form-control" placeholder="Enter course name" id="cname">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="createCourse()" id="addres">Add</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid bg-white my-2 p-3">
	<div class="d-flex align-items-center flex-wrap">
	<div class='m-2'>
	<div><label class="fw-light" style="font-size:12px;">Department</label></div>
		<div>
			<label class="" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ALL]" value="ALL" id="fall">
			ALL</label>
			<label class="" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ICT]" value="ICT" id="fict">
			ICT</label>
			<label class="" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[IAT]" value="IAT" id="fiat">
			IAT</label>
			<label class="" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[ET]" value="ET" id="fet">
			ET</label>
			<label class="" for="flexCheckDefault"><input class="" type="checkbox" name="dpt[AT]" value="AT" id="fat">
			AT</label>
			</div>
	</div>
	<div class='m-2'>
	<div class='fw-light' style='font-size:12'>Year</div>
		
			<select class="form-control-sm" name="year" id="fyear">
				<option value="none">all</option>
				<option value="1st">1st</option>
				<option value="2nd">2nd</option>
				<option value="3rd">3rd</option>
				<option value="4th">4th</option>
			</select>
	</div>
	<div class='m-2'>
	<div class='fw-light' style='font-size:12'>semester</div>
	<select class="form-control-sm" name="sem" id="fsem">
			<option value="none">all</option>
			<option value="1st">1st</option>
			<option value="2nd">2nd</option>
	</select>
	</div>
	</div>
	<button onclick="loadCourses()" class='btn btn-primary ms-2'><i class="fa-solid fa-filter me-3"></i>Search</button>
</div>
	
<div class='Px-1 px-md-5 mt-3 text-secondary fs-6'>
<div class='d-flex bg-white align-items-center px-2'>
<div class='fw-bold text-white px-2 fs-5' style=''><span class='p-2'>c</span></div>
<div class='px-2' style='flex:2'>Course name</div>
<div class='px-2 ' style='flex:1'>Deparment</div>
<div class='px-2 d-none d-md-block' style='flex:1'>Year</div>
<div class='px-2 d-none d-lg-block' style='flex:1'>Semester</div>
<div class=' bg-white px-3 text-white'>
		l
</div>
</div>
</div>	











<div id='cardCont' class='Px-1 px-md-5 pb-3'>

</div>

<div class="modal fade" id="editcourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id='cCont'>
    </div>
  </div>
</div>

<script>
window.addEventListener("load", init, false);
function init(){
	loadCourses();	
	$("#course").addClass("active");
}
function loadCourses() {
	$("#cardCont").html("<div style='color:#07f;text-align:center;margin-top:50px'><i  class='fa fa-spinner fa-pulse fa-lg fa-2x'></i></div>");
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
    $("#cardCont").html(this.responseText);
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
	//element("floatFormEdit").innerHTML="";
	//courseEditTog();
	
	data.append("type", "3");
	data.append("id", cid);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		$("#cCont").html(this.responseText);
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
 		
<?php
include("include2/footer.php");
?>