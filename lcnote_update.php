<?php
	session_start();
	if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
		header("location: index.php");
		exit();
	}
include("connection.php");

$id = $_GET['edit'];
$sql = "SELECT * FROM  material WHERE id= '$id'";
$result = mysqli_query($conn, $sql);
$output = "";

while ($row = mysqli_fetch_assoc($result)) {

    $cid = $row['cid'];
    
    $title = $row['title'];
    $linktitle = $row['linktitle'];
    $link = $row['link'];
    $mname = $row['mname'];
}

if (isset($_POST['update'])) {



    $title = $_POST["title"];
    $linktitle = $_POST["Linktitle"];
    $link = $_POST["sourcelink"];
    $filetype = $_FILES['file']['type'];
    $filesize = $_FILES['file']['size'];
    $filename=$_FILES['file']['name'];

    $check_title = mysqli_query($conn, "SELECT * FROM material WHERE title ='$title'");

    $error = array(); #Error massege

    if (empty($title)) {
        $error['1'] = "please enter title";
    }

    if (isset($error['1'])) {
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>warning !</strong>" . $error['1'] ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        $output .= "";
    }
    if (count($error) < 1) {
        if (empty($mname)) {
            if (empty($filename)) {
                $pname = '';
                $tname = '';

                $sql = "UPDATE material SET title='$title',mname ='$pname', linktitle='$linktitle',link='$link',cid='$cid' WHERE id='$id'";
                $res = mysqli_query($conn, $sql);

                    if ($res) {
                        
                        $output .="<div class='alert alert-success alert-dismissible fade show' role='alert'>Reference update success<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    } else {
                        $output .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>Reference update fail<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
            } else {
                if ($filetype != 'application/pdf') {
                    $error['1'] = "Only pdf/docx/pptx file allowed";
                }
                if ($filesize > 30000000) {
                    $error['1'] = "File size should be less than 10mb";
                }


                if (isset($error['1'])) {
                    $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>warning !</strong>" . $error['1'] ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                } else {
                    $output .= "";
                }
                if (count($error) < 1) {
                    $pname = rand(1000, 10000) . "-" . $_FILES['file']['name'];
                    $tname = $_FILES['file']['tmp_name'];

                    $folder = 'admin/upload/';

                    move_uploaded_file($tname, $folder . $pname);
                    $sql = "UPDATE material SET title='$title',mname ='$pname', linktitle='$linktitle',link='$link',cid='$cid' WHERE id='$id'";

                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        $output .="<div class='alert alert-success alert-dismissible fade show' role='alert'>Reference update success<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    } else {
                        $output .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>Reference update fail<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
                }
            }
        } else {
            if (empty($_FILES['file']['name'])) {
                $sql = "UPDATE material SET title='$title',mname ='$mname', linktitle='$linktitle',link='$link',cid='$cid' WHERE id='$id'";
                $res = mysqli_query($conn, $sql);

                    if ($res) {
                        $output .="<div class='alert alert-success alert-dismissible fade show' role='alert'>Reference update success<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    } else {
                        $output .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>Reference update fail<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
            } else {
                $id = $_GET['edit'];
                $sql = "SELECT * FROM  material WHERE id= '$id'";

                $result = mysqli_query($conn, $sql);
                $res = mysqli_fetch_object($result);

                unlink('upload/' . $res->mname);

                if ($filetype != 'application/pdf') {
                    $error['1'] = "Only pdf/docx/pptx file allowed";
                }
                if ($filesize > 30000000) {
                    $error['1'] = "File size should be less than 10mb";
                }


                if (isset($error['1'])) {
                    $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>warning !</strong>" . $error['1'] ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                } else {
                    $output .= "";
                }
                if (count($error) < 1) {
                    $pname = rand(1000, 10000) . "-" . $_FILES['file']['name'];
                    $tname = $_FILES['file']['tmp_name'];

                    $folder = 'admin/upload/';

                    move_uploaded_file($tname, $folder . $pname);
                    $sql = "UPDATE material SET title='$title',mname ='$pname', linktitle='$linktitle',link='$link',cid='$cid' WHERE id='$id'";
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        $output .="<div class='alert alert-success alert-dismissible fade show' role='alert'>Reference update success<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    } else {
                        $output .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>Reference update fail<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
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
	<div class="item  hide sfont" onclick="setPage(1)" id="item2"><i class="flt fa fa-user" aria-hidden="true"></i>teacher</div>
	<div class="item  hide sfont" onclick="setPage(2)" id="item3"><i class="flt fa fa-user" aria-hidden="true"></i>Student</div>
	<div class="item sfont" onclick="setPage(3)" id="item4"><i class="flt fa fa-sticky-note" aria-hidden="true"></i>notice</div>
	<div class="item hide sfont" onclick="setPage(4)" id="item5"><i class="flt fa fa-comments" aria-hidden="true"></i>form</div>
	<div class="item sfont" onclick="setPage(5)" id="item6"><i class="flt fa fa-sitemap" aria-hidden="true"></i>course<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
<div class="drop-item sfont" onclick="setPage(9)" id="item7" >view lecture material</div>
	<div class="drop-item sfont" onclick="setPage(10)" id="item8" >add lecture material</div>
	<div class="drop-item sfont" onclick="setPage(11)" id="item9" >manage lecture material</div>
	<div class="item sfont" onclick="setPage(12)" id="item10"><i class="flt fa fa-sitemap" aria-hidden="true"></i>result<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(13)" id="item11" >view result</div>
	<div class="drop-item sfont" onclick="setPage(14)" id="item12" >add result</div>
	<div class="drop-item sfont" onclick="setPage(15)" id="item13" >manage result</div>
	<div class="item  hide sfont" onclick="setPage(16)" id="item14">activity log</div>
	<div class="item hide  sfont" onclick="setPage(17)" id="item15">user log</div>
	</div>

		
		
		
            <!--nav bar-->
			<div class="cont" id="cont">


                <div class="row">
                    <div class="col text-white" id="adclr">

                        <h3 class="text-center">Update lecture Material</h3>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div div class="container p-5 mt-5 border col-sm-5 ">
                            <p class="h4">lecter-material</p>
                            <div><?php echo $output; ?></div>
                            <form method="post" enctype="multipart/form-data" >

                                <div class="mb-3 mt-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Enter title" name="title" value="<?php echo $title ?>">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Link title</label>
                                    <input type="text" class="form-control" placeholder="Enter Link title" name="Linktitle" value="<?php echo $linktitle ?>">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Link for source</label>
                                    <textarea class="form-control" rows="4" name="sourcelink" placeholder="Enter links hear" value="<?php echo $link ?>"><?php echo $link ?></textarea>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Select PDF to upload </label>
                                    <input type="file" name="file" value="<?php echo $mname ?>">
                                </div>

                                <input type="submit" name="update" value="update" class="btn btn-primary my-4">
                                <a href="lcnote_manage_page.php" class="btn btn-primary">Return</a>

                            </form>


                        </div>



                    </div>
                </div>
				</div>

	<script src="main-ind.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>