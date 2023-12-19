<?php
	session_start();
	if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
		header("location: index.php");
		exit();
	}
include("connection.php");

$output = "";
if (isset($_POST['submit'])) {

    $error = array(); #Error massege

    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $bgyear = $_POST['bgyear'];
    $dprt = $_POST['dpt'];
    $filetype = $_FILES['file']['type'];
    $filesize = $_FILES['file']['size'];
    $fname = $_FILES['file']['name'];




    if (empty($year)) {
        $error['1'] = "please select Year";
    } else if (empty($sem)) {
        $error['1'] = "please select semester";
    } else if (empty($fname)) {
        $error['1'] = "please select result file";
    } else if (empty($bgyear)) {
        $error['1'] = "please enter badge year";
    } else if (empty($dprt)) {
        $error['1'] = "please select department";
    }



    if (isset($error['1'])) {

        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>warning !</strong>" . $error['1'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        $output .= "";
    }
    if (count($error) < 1) {

        $sql = "SELECT * FROM result WHERE year = '$year'  AND sem = '$sem' AND dep ='$dprt' AND bg_year = '$bgyear'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['year'] == $year && $row['sem'] == $sem && $row['dep'] == $dprt && $row['bg_year'] == $bgyear) {
                $error['1'] = "This result is alrady added";
                if (isset($error['1'])) {
                    $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>warning !</strong>" . $error['1'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                } else {
                    if ($filetype != 'application/pdf') {
                        $error['1'] = "Only pdf file allowed";
                    }
                    if ($filesize > 30000000) {
                        $error['1'] = "File size should be less than 10mb";
                    }
    
                    if (isset($error['1'])) {
                        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                     <strong>warning !</strong>" . $error['1'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                   </div>";
                    } else {
                        $pname = rand(1000, 10000) . "-" . $_FILES['file']['name'];
                        $tname = $_FILES['file']['tmp_name'];
    
                        $folder = 'upload/';
    
                        move_uploaded_file($tname, $folder . $pname);
    
                        $sql = "INSERT INTO result (year,sem,dep,bg_year,fname) VALUE ('$year','$sem','$dprt','$bgyear','$pname')";
                        $res = mysqli_query($conn, $sql);
    
                        if ($res) {
    
                            $output = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Result add success <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                               </div>";
							   
							$id=$_SESSION['id'];
							$act="added result ".$bgyear." ".$dprt;
							mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");
                        } else {
    
                            $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Result add Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                        }
                    }
                }
            } else {
                
            }
        }else{
            if ($filetype != 'application/pdf') {
                $error['1'] = "Only pdf file allowed";
            }
            if ($filesize > 30000000) {
                $error['1'] = "File size should be less than 10mb";
            }

            if (isset($error['1'])) {
                $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             <strong>warning !</strong>" . $error['1'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
            } else {
                $pname = rand(1000, 10000) . "-" . $_FILES['file']['name'];
                $tname = $_FILES['file']['tmp_name'];

                $folder = 'upload/';

                move_uploaded_file($tname, $folder . $pname);

                $sql = "INSERT INTO result (year,sem,dep,bg_year,fname) VALUE ('$year','$sem','$dprt','$bgyear','$pname')";
                $res = mysqli_query($conn, $sql);

                if ($res) {
					
							$id=$_SESSION['id'];
							$act="added result ".$bgyear." ".$dprt;
							mysqli_query($conn, "INSERT INTO activitylog (user_name, name, activity) VALUE ((SELECT username FROM admin WHERE id='$id'), (SELECT afirstname FROM admin WHERE id='$id'), '$act')");

                    $output = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Result add success <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                       </div>";
                } else {

                    $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Result add Fail <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            }
        }
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
    <title>Enter result Details</title>
    <style>
        #adclr {
            background: #444;
        }
    </style>
	<link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="main-ind.css">

</head>


<body>
<?php include("admin_header.html")?>





	
	
	
	<div class="cont" id="cont" src="dash.php">






                <div class="row">
                    <div class="col text-white" id="adclr">

                        <h3 class="text-center">Result add</h3>
                    </div>
                </div>
                <div class="row">
                    <!--form start-->
                    <div class="container p-5 mt-2 border col-sm-5 ">
                        <div class="mb-3 mt-3">
                            <h3>Enter result details</h3>
                            <div><?php echo $output; ?></div>
                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <label class="form-label">Department </label>
                            <div>

                                <select class="form-select mt-3" name="dpt" id="dpt">
                                    <option value=""></option>
                                    <option value="ICT">ICT</option>
                                    <option value="IAT">IAT</option>
                                    <option value="ET">ET</option>
                                    <option value="AT">AT</option>
                                </select>

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
                            <div class="mb-3 mt-3">
                                <label class="form-label">Select PDF to upload </label>
                                <input type="file" name="file">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Batch year </label>
                                <input type="text" class="form-control" placeholder="2021/2020/2019/2018" name="bgyear">
                            </div>
                            <input type="submit" name="submit" value="submit" class="btn btn-primary my-4">

                        </form>
                    </div>
                    <!--form end-->
                </div>
				</div>
    


	<script src="main-ind.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>