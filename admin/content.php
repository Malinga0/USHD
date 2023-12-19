<?php
include("include/header.php");
?>

<?php
include("uhsdcon.php");
?>

<div class="notification" id="notification"></div>



<div class="container-fluid bg-white my-3 d-flex p-2 bg-white">
<div class='mt-2 fw-bold'><?php echo $_GET['cid']?></div>
<button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addstu">
 <i class="fa-solid fa-plus me-2"></i> Add
</button>

<div class="modal fade" id="addstu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Material</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-5">
		<div class="mb-3">
			<label class="form-label">Topic</label>
			<input type="text" class="form-control" placeholder="" id="atopic">
		</div>
		<div class="mb-3">
			<label class="form-label">Link Topic</label>
			<input type="text" class="form-control" placeholder="" id="alinktitle">
		</div>
		<div class="mb-3">
			<label class="form-label">Link</label>
            <input type="text" class="form-control" placeholder="" id="alink">
		</div>
		<div class="mb-3">
			<label class="form-label">File To Upload</label>
			<input type="file" class='form-control' placeholder="" id="afile">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addMaterial()" id="addButton">Add</button>
      </div>
    </div>
  </div>
</div>
</div>




<div class='Px-1 px-md-5 pb-1'><div class='text-center bg-white'>Lecture Material</div> 
</div>
<div class='Px-1 px-md-5 pb-3' id="matCards">
</div>	

<div class="modal fade" id="editmat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="matedit">
    </div>
  </div>
</div>
<script src="main-ind.js "></script>
<script>
window.addEventListener("load", init, false);
function init(){
	loadMaterial('<?php echo $_GET['cid'];?>');	
}
function loadMaterial(id){
	var data=new FormData();
	data.append("type", "1")
	data.append("id", id);
	
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    $("#matCards").html(this.responseText);
  }
  xhttp.open("POST", "lecture_material_functions.php");
  xhttp.send(data);
}
function delMaterial(id){
	var data=new FormData();
	data.append("type", "3")
	data.append("id", id);
	data.append("cid", '<?php echo $_GET['cid'];?>');
	
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    msg(this.responseText);
	loadMaterial('<?php echo $_GET['cid'];?>');	
  }
  xhttp.open("POST", "lecture_material_functions.php");
  xhttp.send(data);
}
function addMaterial(){
	
	var data=new FormData();
	if(getValue("atopic")=="" || getValue("atopic")==" "){
		msg("please add a topic");
		return 0;
	}

	if((getValue("alink")=="" || getValue("alink")==" ") && !(element("afile").files[0])){
		msg("please add a link or a file");
		return 0;
	}
	if(element("afile").files[0]){
		if(element("afile").files[0].size > 26000000){
			msg("file size is too large");
			return 0;
		}
	}
	element("addButton").innerHTML="<i  class='fa fa-spinner fa-pulse fa-lg fa-fw'></i>&nbsp;uploading";
	data.append("type", "2");
	data.append("id", "<?php echo $_GET['cid'];?>");
	data.append("topic", getValue('atopic'));
	data.append("linktitle", getValue('alinktitle'));
	data.append("link", getValue("alink"));
	data.append("upfile", element("afile").files[0]);
	
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		element("addButton").innerHTML="add";
		msg(this.responseText);
		loadMaterial('<?php echo $_GET['cid'];?>');	
	}
	xhttp.open("POST", "lecture_material_functions.php");
	xhttp.send(data);
}
function editMaterial(id){
	var data=new FormData();
	data.append("type", "4");
	data.append("id", id);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		$("#matedit").html(innerHTML=this.responseText);
	}
	xhttp.open("POST", "lecture_material_functions.php");
	xhttp.send(data);
}
function lecMaterialTog(){
	if(element("floatForm").style.visibility=="hidden"){
		element("floatForm").style.visibility="visible";
	}
	else{
		element("floatForm").style.visibility="hidden";
	}
}
function lecMaterialEditTog(){
	if(element("floatFormEdit").style.visibility=="hidden"){
		element("floatFormEdit").style.visibility="visible";
	}
	else{
		element("floatFormEdit").style.visibility="hidden";
	}
}
function saveMaterial(id){
	var data=new FormData();
	data.append("type", "5");
	data.append("id", id);
	data.append("title", $("#etopic").val());
	data.append("linktitle", $("#elinktitle").val());
	data.append("link", $("#elink").val());
	console.log($("#elink").val());
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		msg(innerHTML=this.responseText);
		loadMaterial('<?php echo $_GET['cid'];?>');
	}
	xhttp.open("POST", "lecture_material_functions.php");
	xhttp.send(data);
}
</script>
<?php
include("include/footer.php");
?>