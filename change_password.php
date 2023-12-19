<?php
//session_start();
require_once("./include/headr1.php");
	
	if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == '')) {
		header("location: index.php");
		exit();
	}
$psalert=" ";
$profalert=" ";
include("uhsdcon.php");
if(isset($_POST['submitprof'])){
	$un=$_SESSION['uname'];
	$target_dir = "profiles/";
	$target_file = $target_dir .$_SESSION['uname']. basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$profalert="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<strong>fail </strong>please upload an image file<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
	}
	else{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$profalert="<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>success </strong>profile picture updated<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
			
		}
		$query ="UPDATE user SET profile='$target_file' WHERE nic='$un'";
				if($conn->query($query) != TRUE){
					$profalert="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<strong>fail </strong>can not update profile<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
				}
		$query1 = mysqli_query($conn,"select * FROM user WHERE user_id=".$_SESSION['id']." ")or die(mysqli_error());
		$rowoprof=mysqli_fetch_row($query1);
	}

}
else if (isset($_POST['submitpass'])){
	if(isset($_POST['npass']) && isset($_POST['ncpass']) && isset($_POST['cpass']) && $_POST['npass']!='' && $_POST['ncpass']!=''){
		$un=$_SESSION['uname'];
		$psswd=md5($_POST['cpass']);
		$npsswd=$_POST['npass'];
		$ncpsswd=$_POST['ncpass'];
		
		
		
		$query = mysqli_query($conn,"SELECT * FROM user WHERE nic='$un' AND password='$psswd'")or die(mysqli_error());
		$count = mysqli_num_rows($query);

		if($count > 0){
			if($npsswd == $ncpsswd){
				$ncpsswd=md5($_POST['ncpass']);
				$query ="UPDATE user SET password='$ncpsswd' WHERE nic='$un'";
				if($conn->query($query) === TRUE){
					$psalert="<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>success</strong>changed sccessfuly<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
				}
				else{
					$psalert="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<strong>warning !</strong>can't change the password<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
				}
			}
			else{
				$psalert="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<strong>warning !</strong>confirm password is not matching<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				</div>";
			}
		}
		else{
			$psalert="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>warning !</strong>current password is wrong<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
		}
	}
	else{
		
		
		$psalert="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>warning !</strong>enter values for all fiels<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";	
		
	}
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"href="main1.css"/>
<!-- Modal -->
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");

    body{
        font-family: 'Baloo 2', cursive;
    }
</style>
</head>
<body>
	<div class="sd-form-cont">
	<h4 class="form-title">Profile</h4>
	<?php echo $profalert; ?>
	<img src="<?php echo $rowoprof[10];?>" class="sd-prof-img">
	<h5 class="sd-text-center"><?php echo $rowoprof[1].' '.$rowoprof[2];?></h5>
	
	<label class="form-label">profile picture</label>
	<form method="post" action="change_password.php" enctype="multipart/form-data">
	<input type="file" name="fileToUpload" id="fileToUpload" class="form-input-file">
	<input type="submit" class="form-add"  name="submitprof" value="upload" />
	</form>
	</div>
	
	<div class="sd-form-cont">
	<form method="post" action="change_password.php">
	<h4 class="form-title">change password</h4>
	<?php echo $psalert; ?>
	<label class="form-label">current password</label>
	<input type="password" class="form-input" name="cpass">
	<label class="form-label" >new password</label>
	<input type="password" class="form-input" name="npass">
	<label class="form-label">confirm password</label>
	<input type="password" class="form-input" name="ncpass">
	<input type="submit" value="change password" class="form-add" name="submitpass"/>
	</form>
	</div>
</body>
<?php include("include/footer.php");?>
</html>