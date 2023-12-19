<?php
include("include/header.php");
?>

<?php
include("uhsdcon.php");
?>

	<div class="notification" id="notification"></div>

<div class="container-fluid bg-white my-3 d-flex p-2 bg-white">


<button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addstu">
 <i class="fa-solid fa-plus me-2"></i> Add
</button>

<div class="modal fade" id="addstu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Notice</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-5">
		<div class="mb-3">
			<label class="form-label">Topic</label>
			<input id="topic" type="text" placeholder="" class="form-control">
		</div>
          <div class="mb-3">
			<label class="form-label">Description</label>
	       <textarea id="noticedesc" class="form-control" placeholder="notice"></textarea>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addNotice()" id="addstu">Add</button>
      </div>
    </div>
  </div>
</div>
</div>


<div class='Px-1 px-md-5 mt-3 text-secondary fs-6'>
<div class='bg-white text-center px-2 py-1'>Notices
</div>
</div>

<div id='cardCont' class='Px-1 px-md-5'>
<div class='d-flex bg-white justify-items-center flex-column mt-1 mb-2'>
    <div class='px-3 py-2 bg-light d-flex'><div class='flex-fill'>topic topic</div>
         <div class='dropstart px-3 mt-1'>
				<i class='fa-solid fa-ellipsis-vertical' data-bs-toggle='dropdown'></i>
				<div class='dropdown-menu shadow px-3' onclick=''><i class='fa-solid fa-trash-can me-2'></i>Delete</div>
    	 </div>
    </div>
    <div class='p-3'>description description description description description description description description description description description description </div>
    <div class='px-3 py-2 text-secondary' style='font-size:14;'><div><div style='font-size:12;'>Date-Time Created</div><div> 2022-2-10</div></div><div><div class='mt-2' style='font-size:12;'>Added By</div> <div>admin</div></div></div>
</div>
</div>


<script>
	var table;
	var topic;
	var notice;
	var noteAdd;
	var descCont;
	var notification;
	var desc;
	window.addEventListener("load", init, false);
	function init(){
		$("#notice").addClass('active');
		desc=document.getElementById("desc");
		descCont=document.getElementById("descCont");
		noteAdd=document.getElementById("noteAdd");
		topic=document.getElementById("topic");
		notice=document.getElementById("notice");
		table=document.getElementById("table");
		notification=document.getElementById("notification");
		retTableData();
	}
	function viewNote(nid){
		desc.style.visibility="visible";
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 descCont.innerHTML=this.responseText;
		}
		xhttp.open("POST", "viewnote.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("nid="+nid);
	}
	function stEditClose(){
		desc.style.visibility="hidden";
	}
	function noteAddClose(){
		noteAdd.style.visibility="hidden";
	}
	function openNoteAdd(){
		noteAdd.style.visibility="visible";
	}
	function addNotice(){
	    topic=document.getElementById("topic");
		notice=document.getElementById("noticedesc");
        console.log(notice);
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 msg(this.responseText);
			 retTableData();
		}
		xhttp.open("POST", "addnotice.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("topic="+topic.value+"&notice="+notice.value);
	}
	function retTableData(){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 $("#cardCont").html(this.responseText);
			
		}
		xhttp.open("POST", "retnotices.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send();
	}
	function msg(message){
	notification.innerHTML=message;
	notification.style.display="block";
	notification.style.animation="fadeout 4s";
	setTimeout(function(){
		notification.style.display="none";
	}, 3000);
	}
	function delnotice(nid){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 msg(this.responseText);
			 retTableData();
		}
		xhttp.open("POST", "delnotice.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("nid="+nid);
	}
</script>
<?php
include("include/footer.php");
?>