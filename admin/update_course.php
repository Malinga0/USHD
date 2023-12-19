<?php
session_start();
include("connection.php");

$cid = $_GET['edit'];
$sql = "SELECT * FROM c_course WHERE cid= '$cid'";
$result = mysqli_query($conn, $sql);

$output = "";

while ($row = mysqli_fetch_assoc($result)) {

    $cid = $row['cid'];
    $course = $row['course'];
    $dp = $row['department'];
    $year = $row['year'];
    $sm = $row['sm'];
}

if (isset($_POST['update'])) {

    $year = $_POST['year'];
    $sem = $_POST['sem'];

    $cid = $_POST['cid'];
    $course = $_POST['course'];

    if (isset($_POST["dpt"])) {
        $dt = $_POST["dpt"];
        $dp = implode($dt);
    } else {

        $sql = "SELECT * FROM c_course WHERE cid= '$cid'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $dp = $row['department'];
        }
    }

    $sql = "UPDATE c_course SET cid='$cid',course ='$course', department='$dp',year='$year',sm='$sem' WHERE cid='$cid'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
                    $id=$_SESSION['id'];
$act="updated course ".$cid;
mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
        $output .="<div class='alert alert-success alert-dismissible fade show' role='alert'>Course update success<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        $output .="<div class='alert alert-success alert-dismissible fade show' role='alert'>Course update fail<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Enter update Course Details</title>
	<link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="main-ind.css">
</head>

<body>
	<div class="top-bar">
	<img class="panel-icon" src="picon.png" onclick="openPanel()"><div class="logo">USHD</div><div class="logout" onclick="logout()"><label class="lg-text">logout</label><i class="pdl flr fa fa-sign-out" aria-hidden="true"></i></div>
	</div>
	<div class="panel" id="panel">
	<br>
	<br>
	<div class="item sfont" onclick="setPage(0)" id="item1"><i class="flt fa fa-tachometer" aria-hidden="true"></i>dashboard</div>
	<div class="item sfont" onclick="setPage(1)" id="item2"><i class="flt fa fa-user" aria-hidden="true"></i>teacher</div>
	<div class="item sfont" onclick="setPage(2)" id="item3"><i class="flt fa fa-user" aria-hidden="true"></i>Student</div>
	<div class="item sfont" onclick="setPage(3)" id="item4"><i class="flt fa fa-sticky-note" aria-hidden="true"></i>notice</div>
	<div class="item hide sfont" onclick="setPage(4)" id="item5"><i class="flt fa fa-comments" aria-hidden="true"></i>form</div>
	<div class="item sfont" onclick="setPage(5)" id="item6"><i class="flt fa fa-sitemap" aria-hidden="true"></i>course<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(6)" id="item7" >view courses</div>
	<div class="drop-item sfont" onclick="setPage(7)" id="item8" >create course</div>
	<div class="drop-item sfont" onclick="setPage(8)" id="item9" >manage course</div>
	<div class="item sfont" onclick="setPage(12)" id="item10"><i class="flt fa fa-sitemap" aria-hidden="true"></i>result<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(13)" id="item11" >view result</div>
	<div class="drop-item sfont" onclick="setPage(14)" id="item12" >add result</div>
	<div class="drop-item sfont" onclick="setPage(15)" id="item13" >manage result</div>
	<div class="item sfont" onclick="setPage(16)" id="item14">activity log</div>
	<div class="item sfont" onclick="setPage(17)" id="item15">user log</div>
	</div>

		
		
            <!--nav bar-->
			<div class="cont" id="cont" src="dash.php">




 
                <div class="row">
                    <div class="col text-white" id="adclr">

                        <h3 class="text-center">Update Courses</h3>
                    </div>
                </div>
                <div class="row">
                    <!--form start-->
                    <div class="container p-5 mt-2 border col-sm-5 ">
                        <div class="mb-3 mt-3">
                            <h3>Enter course details</h3>
                            <div><?php echo $output; ?></div>

                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <label class="form-label">Department </label>
                            <div>
                                <input class="form-check-input" type="checkbox" name="dpt[ALL]" value="ALL">
                                <label class="form-check-label" for="flexCheckDefault">ALL</label>
                                <input class="form-check-input" type="checkbox" name="dpt[ICT]" value="ICT">
                                <label class="form-check-label" for="flexCheckDefault">ICT</label>
                                <input class="form-check-input" type="checkbox" name="dpt[IAT]" value="IAT">
                                <label class="form-check-label" for="flexCheckDefault">IAT</label>
                                <input class="form-check-input" type="checkbox" name="dpt[ET]" value="ET">
                                <label class="form-check-label" for="flexCheckDefault">ET</label>
                                <input class="form-check-input" type="checkbox" name="dpt[AT]" value="AT">
                                <label class="form-check-label" for="flexCheckDefault">AT</label>

                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Year</label>
                                <div>
                                    <select class="form-select mt-3" name="year" id="year">
                                        <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Semester </label>
                                <div>
                                    <select class="form-select mt-3" name="sem" id="sem">
                                        <option value="<?php echo $sm ?>"><?php echo $sm ?></option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">course ID</label>
                                <input type="text" class="form-control" placeholder="Enter course id" name="cid" value="<?php echo $cid ?>">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">course </label>
                                <input type="text" class="form-control" placeholder="Enter course name" name="course" value="<?php echo $course ?>">
                            </div>
                            <div class="mb-2 mt-3">
                            <input type="submit" name="update" value="update" class="btn btn-primary my-4">
                            
                            <a href="course_manage_page.php" class="btn btn-primary">Return</a>
                            </div>

                            
                        </form>
                    </div>
                    <!--form end-->
                </div>
			</div>
            
			
			
	<script src="main-ind.js"></script>		
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>