<?php
require_once("./include/headr1.php");
if(isset($_SESSION['uname']) && isset($_SESSION['department']) && isset($_SESSION['byear']))
{

include("connection.php");


#check any error
$output = "";
$dp = $_SESSION['department'];
if (isset($_POST['year'])) {


    $error = array(); #Error massege

    $year = $_POST['year'];
    
    $sem = $_POST['sem'];
   
    $dp = $_SESSION['department'];
    
    


    if (empty($year)) {
        $error['1'] = "please select Year";
    } else if (empty($sem)) {
        $error['1'] = "please select semester";
    }

    if (isset($error['1'])) {
        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>warning !</strong>" . $error['1'] . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        $output .= "";
    }
    if (count($error) < 1) {
        $result = mysqli_query($conn, "SELECT * FROM c_course Where   year='$year' AND sm='$sem' AND (department ='ALL' OR department LIKE '%$dp%')");
    }
}
else{
	$result = mysqli_query($conn, "SELECT * FROM c_course Where  (department ='ALL' OR department LIKE '%$dp%')");
}

?>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");

    body{
        font-family: 'Baloo 2', cursive;
    }
</style>
        <div  class="sd-form-container">
            <form method="post" enctype="multipart/form-data">
                
                    <label class="sd-form-label">Year</label>
                        <select class="sd-form-elem" name="year" id="year">
                            <option value=""></option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                        </select>
              
                    <label class="sd-form-label">Semester </label>
                        <select class="sd-form-elem" name="sem" id="sem">
                            <option value=""></option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                        </select>
                <button type="submit" name="submit" class="sd-form-btn"><i class="fa fa-filter" aria-hidden="true"></i></button>
            </form>
        </div>
       
	   <div class='sd-card-container'>
	   
            <?php
            if (empty($result)) {
            
            } else {
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                                                                                ?>
                        <!--cousers show-->
                       <div class='sd-card'>
					   <div class='sd-card-elem-top' onclick="redirectPage(<?php echo "'".$row["cid"]."'"; ?>)">
                                <?php echo $row["cid"];?>
                            </div>
							<div class='sd-card-elem-bottom'><?php echo $row["course"]; ?>
                            </div>
                        </div>

                    <?php
                        $i++;
                        }
                    ?>
            <?php
                } else {
                        //echo "Not yet entered any course";
                    }
            }

            ?>

        </div>    

<?php
}else{
    header("Location:index.php");
    exit();
}
?>



<?php include("include/footer.php");?>

<script>
function redirectPage(cid){
	window.location.href="st_lcnote_viwe.php?id="+cid;
}
</script>
</body>
</html>