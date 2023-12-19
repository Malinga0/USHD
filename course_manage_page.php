<?php
session_start();
	if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
		header("location: index.php");
		exit();
	}
include("connection.php");
include("spfunction.php");
$output = "";
if (isset($_POST['submit'])) {



    $error = array(); #Error massege

    $_SESSION['year'] = $_POST['year'];
    $year =  $_SESSION['year'];

    $_SESSION['sem'] = $_POST['sem'];
    $sem =  $_SESSION['sem'];


    if (isset($_POST["dpt"])) {

        $_SESSION['dpt'] = $_POST["dpt"];
        $dp = $_SESSION['dpt'];
        $dp = implode($dp);
    } else {
        $error['1'] = "please select Department";
    }
    if (empty($year)) {
        $error['1'] = "please select Year";
    } else if (empty($sem)) {
        $error['1'] = "please select semester";
    }

    if (isset($error['1'])) {
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>warning !</strong>" . $error['1'] ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        $output .= "";
    }
    if (count($error) < 1) {
        $result = mysqli_query($conn, "SELECT * FROM c_course Where department='$dp' AND year='$year' AND sm='$sem'");
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
      <style>
        #adclr {
            background: #444;
        }
    </style>
    <title>Enter Course Details</title>
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
	<div class="item  hide sfont" onclick="setPage(0)" id="item1"><i class="flt fa fa-tachometer" aria-hidden="true"></i>dashboard</div>
	<div class="item hide  sfont" onclick="setPage(1)" id="item2"><i class="flt fa fa-user" aria-hidden="true"></i>teacher</div>
	<div class="item  hide sfont" onclick="setPage(2)" id="item3"><i class="flt fa fa-user" aria-hidden="true"></i>Student</div>
	<div class="item sfont" onclick="setPage(3)" id="item4"><i class="flt fa fa-sticky-note" aria-hidden="true"></i>notice</div>
	<div class="item hide sfont" onclick="setPage(4)" id="item5"><i class="flt fa fa-comments" aria-hidden="true"></i>form</div>
	<div class="item sfont" onclick="setPage(5)" id="item6"><i class="flt fa fa-sitemap" aria-hidden="true"></i>course<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(6)" id="item7" >view courses</div>
	<div class="drop-item sfont" onclick="setPage(7)" id="item8" >create course</div>
	<div class="drop-item sd-active sfont" onclick="setPage(8)" id="item9" >manage course</div>
	<div class="item sfont" onclick="setPage(12)" id="item10"><i class="flt fa fa-sitemap" aria-hidden="true"></i>result<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(13)" id="item11" >view result</div>
	<div class="drop-item sfont" onclick="setPage(14)" id="item12" >add result</div>
	<div class="drop-item sfont" onclick="setPage(15)" id="item13" >manage result</div>
	<div class="item hide  sfont" onclick="setPage(16)" id="item14">activity log</div>
	<div class="item hide  sfont" onclick="setPage(17)" id="item15">user log</div>
	</div>

		
            <!--nav bar-->
			<div class="cont" id="cont" src="dash.php">




                <div class="row">
                    <div class="col text-white" id="adclr">

                        <h3 class="text-center">Manage courses</h3>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="container mt-5 p-5 border col-sm-4">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <h3>Enter course details</h3>
                                    <div>
                                        <?php echo $output; ?>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">

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
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Year</label>
                                    <div>
                                        <select class="form-select mt-3" name="year" id="year">
                                            <option value=""></option>
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
                                            <option value=""></option>
                                            <option value="1st">1st</option>
                                            <option value="2nd">2nd</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- when select year/sem/department show data on table. then admin can delete or update data-->

                        <?php if (empty($result)) {
                        ?> <h3> Plese select data you wont </h3> <?php
                                                                } else { ?>
                            <div><?php echo $output; ?></div>
                            <table class="table table-bordered mt-5">
                                <tr>
                                    <th>ID</th>
                                    <th>Course</th>
                                    <th>Department</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        $i = 0;
                                                                        while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row["cid"]; ?></td>
                                            <td><?php echo $row["course"]; ?></td>
                                            <td><?php echo $row["department"]; ?></td>
                                            <td><?php echo $row["year"]; ?></td>
                                            <td><?php echo $row["sm"]; ?></td>
                                            <td>
                                                <a href="update_course.php?edit=<?php echo $row['cid']; ?>" class="btn btn-success">Edit</a>
                                                <a href="spfunction.php?delete=<?php echo $row['cid']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    <?php
                                                                            $i++;
                                                                        }
                                    ?>
                                <?php
                                                                    } else {
                                ?> <h3>No result found</h3><?php
                                                                    }
                                                            ?>
                            </table>
                        <?php } ?>
                    </div>
                </div>
  </div>


	<script src="main-ind.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>