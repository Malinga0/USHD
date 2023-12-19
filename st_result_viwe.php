<?php
require_once("./include/headr1.php");
//session_start();
if (isset($_SESSION['uname']) && isset($_SESSION['department']) && isset($_SESSION['byear'])) {

    
    include("connection.php");

    $dprt = $_SESSION['department'];
    $byear =$_SESSION['byear'];

    $result = mysqli_query($conn, "SELECT * FROM result WHERE  bg_year='$byear' AND dep='$dprt'");


?>
            <?php
            if (empty($result)) {
            ?> <h3></h3><?php
                    } else {

                        if (mysqli_num_rows($result) > 0) {


                            $i = 0;
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");

    body{
        font-family: 'Baloo 2', cursive;
    }
</style>

                        <div class="sd-form-cont">
                               <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");

    body{
        font-family: 'Baloo 2', cursive;
    }
</style>

                            <h5 class="form-title"><?php echo $row["dep"]; ?> department exam result
                                
                            </h5>
							<div class="sd-card-sub-container">
							<div class="sd-card-float-elem-left sd-card-float-elem ">
							<a target="_blank" href="admin/upload/<?php echo $row['fname'] ?>">
							<img href="admin/upload/<?php echo $row['fname'] ?>" src="result.png" width="110" height="110" />
							<div class="sd-text-center">Result Sheet</div></a>
							</div>
                            <div class="sd-card-float-elem-right sd-card-float-elem sd-color-fade">
                                <div> Year :&ensp;<?php echo $row["year"]; ?></div>
                                <div> Semester :&ensp;<?php echo $row["sem"]; ?></div>
                                <div>Batch :&ensp;<?php echo $row["bg_year"]; ?></div>
            
                            </div>
							</div>
                        </div>

                    <?php
                                $i++;
                            }
                    ?>
            <?php
                        } else { ?>
                        <div class="alert alert-danger" role="alert">
                        Not yet entered any result!
                </div>
                            
                     <?php   }
                    }

    ?>
 <?php include("include/footer.php");?>
 </body>
 </html>
 <?php
} else {
    header("Location:index.php");
    exit();
}
?>
 