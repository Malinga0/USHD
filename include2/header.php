<?php
	session_start();
	include("uhsdcon.php");
	
	if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
		header("location: index.php");
		exit();
	}
	
	$result=mysqli_query($conn, "select * from user where user_id='".$_SESSION['id']."' and position=2");
	$row = mysqli_fetch_array($result);
	if(mysqli_num_rows($result)<1){
		header("location: index.php");
		exit();
	}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	</style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
	 <link rel="stylesheet" href="admin/fontawesome-free-6.2.1-web/css/all.css" />
	 <link rel="stylesheet"href="admin/fontawesome-free-6.2.1-web/js/all.js"/>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	
</head>

<body class="bg-light">

<div class="d-flex flex-row h-100">
<div class="offcanvas-md offcanvas-start d-flex flex-column flex-shrink-0 p-3 text-light bg-dark h-100 " tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel" style="width: 280px;" id="sidePanel">
	
    <a  class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
      <img src="logo.png" width="120px" height="50px">
	  <button type="button" class=" ms-auto bg-dark border border-0 text-white fs-4 pe-2 d-sm-block d-md-none" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#offcanvas">&times;</button>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="mt-1">
        <a href="dashboard.php" class="nav-link text-white d-flex align-items-center" id="dash">
          <i class="fa-solid fa-gauge-high me-3 fs-5 "></i>
          <span class="">Dashboard</span>
        </a>
      </li>
      
    
      <li class='mt-1'>
        <a href="notices.php" class="nav-link text-white d-flex align-items-center" id="notice">
          <i class="fa-solid fa-bell me-3 fs-5"></i>
         </span> Notice</span>
        </a>
      </li>
	  <li class='mt-1'>
        <a href="course.php" class="nav-link text-white d-flex align-items-center" id="course">
          <i class="fa-solid fa-book me-3 fs-5"></i>
          </span>Course</span>
        </a>
      </li>
	  <li class='mt-1'>
        <a href="result.php" class="nav-link text-white d-flex align-items-center" id="result">
          <i class="fa-solid fa-note-sticky me-3 fs-5"></i>
          </span>Result</span>
        </a>
      </li>
    </ul>

  </div>
 <div class="d-flex flex-column flex-fill">
 <div class="bg-dark d-flex flex-row p-2">
 <i class="fa-solid fa-bars text-light pt-2 d-md-none fs-5" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button"></i>
 <div class="dropdown ms-auto d-flex align-items-center">
  <img src="profiles/noprofile.jpg" alt="" width="32" height="32" class="rounded-circle me-2" style="object-fit:cover;">
  <div class="bg-dark p-2 text-light dropdown-toggle ms-auto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo $row['firstname']." ".$row['lastname']?>
  </div>
  <ul class="dropdown-menu dropdown-menu-dark shadow">
    <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
    <li><a class="dropdown-item" href="logout.php">logout</a></li>
  </ul>
</div>
 
 
 </div>
 <div class="flex-fill overflow-auto px-sm-1 px-md-5" style="background-color:rgb(111 147 212 / 9%)">
