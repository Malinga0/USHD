<?php
include("include/header.php");
?>

<?php
include("uhsdcon.php");
?>
<?php
include("uhsdcon.php");
?>


<div class="container-fluid bg-white my-3 text-center p-2 bg-white fw-bold ">
Activity Log
</div>


<div class='Px-1 px-md-5 pb-1'>
<div class='d-flex p-2 bg-white align-items-center text-secondary'>
<div class='overflow-hidden d-none d-md-block px-2' style='flex:1;'>UserName</div>
<div class='overflow-hidden px-2' style='flex:1;'>Name</div>
<div class='overflow-hidden px-2' style='flex:1;'>Login Date-Time</div>
<div class='overflow-hidden px-2' style='flex:1;'>Logout Date-Time</div>
</div>
</div>
<div class='Px-1 px-md-5 pb-3' style="nth-child(even){background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity));}">



	<?php
		$query = mysqli_query($conn,"select * FROM userlog ORDER BY log_id DESC")or die(mysqli_error());
		while($row = mysqli_fetch_array($query)){
	?>
		
		<div class='mb-1 d-flex p-2 bg-white align-items-center'>
		<div class='overflow-hidden d-none d-md-block px-2' style='flex:1;'><?php echo $row['user_name']?></div>
		<div class='overflow-hidden px-2' style='flex:1;'><?php echo $row['name']?></div>
		<div class='overflow-hidden px-2' style='flex:1;'><?php echo $row['login_date']?></div>
		<div class='overflow-hidden px-2' style='flex:1;'><?php echo $row['logout_date']?></div>
		</div>
	<?php } ?>

</div>
<script>
$(document).ready(function(){
	$("#usrlog").addClass("active");
});
</script>
<?php
include("include/footer.php");
?>