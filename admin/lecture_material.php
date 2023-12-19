
 <html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
 <link rel="stylesheet" href="main-ind.css">
 <style>

 </style>
 </head>
 <body>
 <div class='d-flex flex-column bg-white mt-1'>
					   <div class='px-3 py-2 bg-light d-flex'><div class='flex-fill fw-semibold'>topic topic</div>
					   <div class='dropstart px-3 mt-1'>
							<i class='fa-solid fa-ellipsis-vertical' data-bs-toggle='dropdown'></i>
								<div class='dropdown-menu shadow px-3' onclick=''><div onclick=""><i class='me-2 fa-solid fa-trash-can'></i>Delete</div><div data-bs-toggle='modal' data-bs-target='#editstu'  onclick=""  class='mt-2'><i class='me-2 fa-solid fa-pen-to-square'></i>Edit</div></div>	
					 </div>
					 </div>
				<div class='px-3 py-2'>
			<a href='' target='_blank'><div><i class='fa-solid fa-file-lines fs-1'></i></div>
			<div style='font-size:13px'>fgfgfgfffgfgfgf</div></a>
			</div>
				<div class='px-3 pt-2 fw-semibold' style='font-size:14px;'>fgffgffgfgfg</div>
				<div class='px-3 py-2'>fgfgfgfgfgfgf</div>
				</div>
 
 
 
 
 
 
 
 
 
 	<div class="top-bar">
	<div class="logo">USHD</div><div class="logout" onclick="logout()"><label class="lg-text">logout</label><i class="pdl flr fa fa-sign-out" aria-hidden="true"></i></div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div class='mat-cont'>
	
	
	
	
	
	
 <div class="floating-form" id="floatForm" >
 <button class="close-form sfont" onclick="lecMaterialTog()"><i class='fa fa-times'></i></button>
 
	<label class="form-title sfont">Add lecture material</label>
	
	<label class="form-label">topic</label>
	<input type="text" class="form-input" placeholder="" id="atopic">
			
	<label class="form-label">link title</label>
	<input type="text" class="form-input" placeholder="" id="alinktitle">
	
	<label class="form-label">link</label>
	<input type="text" class="form-input" placeholder="" id="alink">
	
	<label class="form-label">file to upload</label>
	<input type="file" style="margin-left:20%;width:60%;" placeholder="" id="afile">

	<button class="form-add" onclick="addMaterial()" id="addButton">add</button>

 </div>
 
  <div class='floating-form' id="floatFormEdit" >

 </div>
 
 
 
<div class="notification" id="notification"></div>
	
	
<div class="bar"><div class='bar-title'><?php echo $_GET['cid'];?></div>
<div class="add sfont" onclick="lecMaterialTog()">add <i class="flt-c fa fa-plus" aria-hidden="true"></i></div>

</div>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <div id="cardContainer">

 </div>
 
 </div>
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
    element("cardContainer").innerHTML=this.responseText;
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
	element("floatFormEdit").innerHTML="";
	lecMaterialEditTog();
	var data=new FormData();
	data.append("type", "4");
	data.append("id", id);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		element("floatFormEdit").innerHTML=this.responseText;
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
</script>
<script src="main-ind.js "></script>
 </body>
 </html>