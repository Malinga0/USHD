<?php
include("include2/header.php");
?>
<div class='notification' id='notification'></div>
<div class="container-fluid bg-white my-3 d-flex  justify-content-end p-2 bg-white">


<button type="button" class="btn btn-primary justify-content-end" data-bs-toggle="modal" data-bs-target="#addresult">
 <i class="fa-solid fa-plus me-2"></i> Add
</button>

<div class="modal fade" id="addresult" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Result</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-5">
		<div class="mb-3">
			<label for="adep" class="form-label">Dep</label>
			<select class="form-select" id="adep" aria-label="Default select example">
			  <option value="ICT">ICT</option>
			  <option value="IAT">IAT</option>
			  <option value="AT">AT</option>
			  <option value="ET">ET</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="ayear" class="form-label">Year</label>
			<select class="form-select" id="ayear" aria-label="Default select example">
			  <option value="1st">1st</option>
			  <option value="2nd">2nd</option>
			  <option value="3rd">3rd</option>
			  <option value="3th">4th</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="asem" class="form-label">Semester</label>
			<select class="form-select" id="asem" aria-label="Default select example">
			  <option value="1st">2nd</option>
			  <option value="2nd">1st</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="abatch" class="form-label">Batch</label>
			<input id="abatch" class="form-control" placeholder="eg:2020">
		</div>
		<div class="mb-3">
		  <label for="aresfile" class="form-label">File to Upload</label>
		  <input class="form-control" type="file" id="aresfile">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addResult()" id="addres">Add</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid bg-white my-2 p-3">
	<div class="d-flex align-items-center flex-wrap">
	<div class='m-2'>
	<div class='fw-light' style='font-size:12;'>Department</div><select id="dep" class="form-control-sm">
	<option value="none">All</option>
	<option value="ICT">ICT</option>
	<option value="IAT">IAT</option>
	<option value="ET">ET</option>
	<option value="AT">AT</option>
	</select>
	</div>
	<div class='m-2'>
	<div class='fw-light' style='font-size:12'>Year</div><select id="year" class="form-control-sm">
	<option value="none">All</option>
	<option value="1st">1st</option>
	<option value="2nd">2nd</option>
	<option value="3rd">3rd</option>
	<option value="4th">4th</option>
	</select>
	</div>
	<div class='m-2'>
	<div class='fw-light' style='font-size:12'>semester</div><select id="sem" class="form-control-sm">
	<option value="none">All</option>
	<option value="1st">1st</option>
	<option value="2nd">2nd</option>
	</select>
	</div>
	<div class='m-2'>
	<div class='fw-light' style='font-size:12'>batch</div><input id="batch" type="text" placeholder="ex:2020" class="form-control-sm">
	</div>
	</div>
	<button onclick="loadResults()" class='btn btn-primary ms-2'><i class="fa-solid fa-filter me-3"></i>Search</button>
</div>
<div class='Px-1 px-md-5 mt-3'><div class='d-flex bg-white p-1 text-secondary'><div class='overflow-hidden' style='flex:1;'>  </div><div class='overflow-hidden' style='flex:1;'>Dep</div><div class='overflow-hidden' style='flex:1;'>Year</div><div class='overflow-hidden' style='flex:1;'>Sem</div><div class='overflow-hidden' style='flex:1;'>Batch</div><div class='px-3 text-white'>l</div></div>
</div>
<div id='cardCont' class='Px-1 px-md-5 pb-3'>

</div>

<script>
$(document).ready(function(){
loadResults();
$("#result").addClass('active');
});
function loadResults() {
	var data=new FormData();
	var batch=$("#batch").val();
	if($("#batch").val().trim() == ""){
		batch="none";
	}
	data.append("type", "1")
	data.append("dep", $("#dep").val());
	data.append("year", $("#year").val());
	data.append("sem", $("#sem").val());
	data.append("batch", batch);
	
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    $("#cardCont").html(this.responseText);
  }
  xhttp.open("POST", "result_functions.php");
  xhttp.send(data);
}

function addResult() {
	
	var data=new FormData();
	var batch=$("#abatch").val();
	if($("#abatch").val().trim() == "" || $("#abatch").val().trim().length != 4){
		msg("pleae enter valid batch");
		return false;
	}
	if($("#aresfile")[0].files[0]){
		if($("#aresfile")[0].files[0].size > 26000000){
			msg("file size is too large");
			return 0;
		}
	}
	else{
		msg("Add a file");
		return false;
	}
	$("#addres").html("<i  class='fa fa-spinner fa-pulse fa-lg fa-fw'></i>&nbsp;uploading");
	data.append("type", "2")
	data.append("dep", $("#adep").val());
	data.append("year", $("#ayear").val());
	data.append("sem", $("#asem").val());
	data.append("resfile", $("#aresfile")[0].files[0]);
	data.append("batch", batch);
	
  const xhttp = new XMLHttpRequest();
  
  xhttp.upload.addEventListener('progress', function (e){
	    $("#addres").html("<i  class='fa fa-spinner fa-pulse fa-lg fa-fw'></i>"+parseInt(e.loaded/e.total*100)+"% &nbsp;uploading");
	});
  
  xhttp.onload = function() {
    msg(this.responseText);
	$("#addres").html("Add");
	loadResults();
  }
  xhttp.open("POST", "result_functions.php");
  xhttp.send(data);
}
function delRes(id, dep, batch){
	var data=new FormData();
	data.append("type", "3")
	data.append("id", id);
	data.append("dep", dep);
	data.append("batch", batch);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
	msg(this.responseText);
		msg(this.responseText);
		loadResults();
	}
	xhttp.open("POST", "result_functions.php");
	xhttp.send(data);
}
</script>
<?php
include("include2/footer.php");
?>