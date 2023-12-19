<?php
require_once("./include/headr1.php");
//session_start();
if (isset($_SESSION['uname']) && isset($_SESSION['department']) && isset($_SESSION['byear'])) {

    
    include("connection.php");


    $id = $_GET['id'];
    $_SESSION['cid'] = $id;

    $cid = $_SESSION['cid'];

    $result = mysqli_query($conn, "SELECT * FROM material WHERE cid='$cid'");
?>
    
      
                <?php

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

                 <div class='sd-course-card bg-white shadow border border-1'>
				 <div class='sd-course-card-details text-main'><?php echo $row["title"]; ?></div>
				 <div class='sd-course-card-elem'>
					<div class='sd-course-card-material'>
					
					<?php
                                    if (empty($row['mname'])) {
                                    } else {
                                    ?>
									<a href='admin/upload/<?php echo $row['mname'] ?>'><img src='result.png' width='110' height='110'><div class='sd-file-name'>Open file</div></a>
                                    <?php }
                                    ?>
					
					</div>
					<div class='sd-course-card-link'>
						<div class='text-sub-topic'><?php echo $row["linktitle"]; ?></div>
						<a href='<?php echo $row["link"]; ?>'><div class='text-sub'><?php echo $row["link"]; ?></div></a>
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
                    Notyet entered any material!
                </div>

            <?php
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