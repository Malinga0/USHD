<?php
include("include/header.php");
?>

<?php
include("uhsdcon.php");
?>

	<div class="notification" id="notification"></div>

<!--div id="stCards">

  
</div-->




<div class="container-fluid bg-white my-3 d-flex p-2 bg-white">


<input type="text" class="form-control-sm border border-1 me-auto" onkeyup="retStCards()" placeholder="Search" id="keyword">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstu">
 <i class="fa-solid fa-plus me-2"></i> Add
</button>

<div class="modal fade" id="addstu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Teacher</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-5">
		<div class="mb-3">
			<label class="form-label">First Name</label>
			<input id="fn" type="text" placeholder="" class="form-control">
		</div>
		<div class="mb-3">
			<label class="form-label">Last Name</label>
			<input id="ln" type="text" placeholder="" class="form-control">
		</div>
		<div class="mb-3">
			<label class="form-label">NIC</label>
			<input id="nic" type="text" placeholder="" class="form-control">
		</div>
		<div class="mb-3">
			<label class="form-label">E-mail</label>
			<input id="email" type="text" placeholder="" class="form-control">
		</div>
		<div class="mb-3">
			<label class="form-label">phone number</label>
			<input id="phone" type="text" placeholder="" class="form-control">
		</div>
		<div class="mb-3">
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addStudent()" id="addstu">Add</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class='Px-1 px-md-5 pb-1'>
<div class='d-flex p-2 bg-white align-items-center text-secondary'>
<div class="" style="width:70px;"></div>
<div class='overflow-hidden px-2' style='flex:1;'>User</div>
<div class='overflow-hidden d-none d-sm-block px-2' style='flex:1;'>Phone</div>
<div class='overflow-hidden d-none d-md-block px-2' style='flex:1;'>Dep</div>
<div class='overflow-hidden d-none d-lg-block px-2' style='flex:1;'>NIC</div>
<div class='dropstart bg-white px-3 text-white'>l
</div>
</div>
</div>
<div class='Px-1 px-md-5 pb-3' id="stcards">

</div>



<div class="modal fade" id="editstu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="stuinfo">
      
    </div>
  </div>
</div>



<!--div class="stu-form" id="stuForm">
	<button class="close-form sfont" onclick="stuFormClose()">X</button>
	<label class="form-title sfont">add student</label>
	<label class="form-label sfont">first name</label>
	<input id="fn" type="text" placeholder="" class="form-input">
	<label class="form-label sfont">last name</label>
	<input id="ln" type="text" placeholder="" class="form-input">
	<label class="form-label sfont">department</label>
	<select id="dep" class="form-input">
		<?php
		$query = mysqli_query($conn,"select * from department") or die(mysqli_error());
		while ($row = mysqli_fetch_array($query)) {
		?>
		<option value="<?php echo$row['department_id']?>"><?php echo $row['dep_name']?></option>
		<?php } ?>    

	</select>
	<label class="form-label sfont">batch</label>
	<input id="batch" type="text" placeholder="2019 2020 2021 2022" class="form-input">
	<label class="form-label sfont">NIC</label>
	<input id="nic" type="text" placeholder="" class="form-input">
	<label class="form-label sfont">e-mail</label>
	<input id="email" type="text" placeholder="" class="form-input">
	<label class="form-label sfont">phone number</label>
	<input id="phone" type="text" placeholder="" class="form-input">
	<input class="form-add sfont" type="button" value="add" onclick="loadDoc()">
	
</div-->


	
	
	</div>

<script src="main-ind.js "></script>
<script>
var batch;
var keyword;
var stCards;
var nic;
var fn;
var ln;
var nice;
var batche;
var fne;
var lne;
var phonee;
var phone;
var emaile;
var email;
var dep;
var depe;
var stuForm;
var stuEdit;
var notification;
window.addEventListener("load", init, false);
function init(){
	$("#teacher").addClass('active');
	stCards=document.getElementById("stCards");
	stuForm=document.getElementById("stuForm");
	fn=document.getElementById("fn");
	ln=document.getElementById("ln");
	nic=document.getElementById("nic");
	phone=document.getElementById("phone");
	email=document.getElementById("email");
	//dep=document.getElementById("dep");
	//batch=document.getElementById("batch");
	
	stuEdit=document.getElementById("stuEdit");
	fne=document.getElementById("fne");
	lne=document.getElementById("lne");
	nice=document.getElementById("nice");
	phonee=document.getElementById("phonee");
	emaile=document.getElementById("emaile");
	//depe=document.getElementById("depe");
	//batche=document.getElementById("batche");
	keyword=document.getElementById("keyword");
	notification=document.getElementById("notification");
	
	retStCards();
}
function setStuForm(){
	stuForm.style.visibility="visible";
}
function stuFormClose(){
	stuForm.style.visibility="hidden";
}
function stEditClose(){
	stuEdit.style.visibility="hidden";
}

function addStudent() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    msg(this.responseText);
	retStCards();
  }
  xhttp.open("POST", "addstudent.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("nic="+nic.value+"&fn="+fn.value+"&ln="+ln.value+"&email="+email.value+"&dep=10&phone="+phone.value+"&pos=2");
}

function editData(stId){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		 $("#stuinfo").html(this.responseText);
	}
	xhttp.open("POST", "editstudent.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("stid="+stId);
}
function retStCards(){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		 $("#stcards").html(this.responseText);	 
	}
	xhttp.open("POST", "retstudent.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	if(keyword.value == "" || keyword.value == " "){
		xhttp.send("&pos=2");
	}
	else{
		xhttp.send("kword="+keyword.value+"&pos=2");
	}
	
}
	function msg(message){
	notification.innerHTML=message;
	notification.style.display="block";
	notification.style.animation="fadeout 4s";
	setTimeout(function(){
		notification.style.display="none";
	}, 3000);
	}
	
	function delstudent(stid){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			 msg(this.responseText);
			 retStCards();
		}
		xhttp.open("POST", "delstudent.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("stid="+stid);
	}
	function saveChanges(stid){
		fne=document.getElementById("fne");
		lne=document.getElementById("lne");
		nice=document.getElementById("nice");
		phonee=document.getElementById("phonee");
		emaile=document.getElementById("emaile");
		depe=document.getElementById("depe");
		batche=document.getElementById("batche");
		
		
		  const xhttp = new XMLHttpRequest();
		  xhttp.onload = function() {
			msg(this.responseText);
			retStCards();
		  }
		  xhttp.open("POST", "updatestudent.php");
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("nic="+nice.value+"&fn="+fne.value+"&ln="+lne.value+"&email="+emaile.value+"&phone="+phonee.value+"&stid="+stid+"&pos=2");
	
	


	}
</script>
<?php
include("include/footer.php");
?>