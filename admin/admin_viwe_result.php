<?php
include("connection.php");


#check any error
$output = "";
if (isset($_POST['submit'])) {


    $error = array(); #Error massege

    
    $bgyear = $_POST['bgyear'];
    $dprt = $_POST['dpt'];

   if (empty($bgyear)) {
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
        $result = mysqli_query($conn, "SELECT * FROM result WHERE  bg_year='$bgyear' AND dep ='$dprt'");
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
    <title>result viwe</title>
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

                        <h3 class="text-center">Result viwe</h3>
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
                                <label class="form-label">batch year </label>
                                <input type="text" class="form-control" placeholder="2021/2020/2019/2018" name="bgyear">
                            </div>
                            <input type="submit" name="submit" value="submit" class="btn btn-primary my-4">

                        </form>
                    </div>
                    <!--form end-->
                    <div class="col-sm-9">
                        <div class="row">
                            <?php
                            if (empty($result)) {
                            ?> <h3></h3><?php
                                    } else {
                                        
                                        if (mysqli_num_rows($result) > 0) {

                                            
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                       
                                         <div class="container p-4 m-5 col-sm-3 border border-dark">
                                            <div class="card-header border"> Badge year:
                                                <?php  echo $row["bg_year"]; ?>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"> Year :<?php echo $row["year"]; ?></h5>
                                                <h5 class="card-title"> Semester :<?php echo $row["sem"]; ?></h5>
                                                <h5 class="card-title">Department :<?php echo $row["dep"]; ?></h5>
                                                <a href="upload/<?php echo $row['fname'] ?>" class="btn btn-primary" target="_blank">Read result</a>
                                            </div>
                                        </div>

                                    <?php
                                                $i++;
                                            }
                                    ?>
                            <?php
                                        } else {
                                            echo "Not yet entered any result";
                                        }
                                    }

                            ?>

                        </div>


                    </div>
                </div>
            </div>
  


	<script src="main-ind.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>