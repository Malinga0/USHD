<?php
session_start();
include("connection.php");

if (isset($_POST['userName']) && isset($_POST['userPassword'])) {


     function validate($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);

         return $data;
          }

     $uname =validate( $_POST['userName']);
     
     $password = md5(validate($_POST['userPassword']));

     if(empty($uname)){
        
         header("Location:index.php?error= user name  is required");
         exit();

     }else if(empty($password)){
         header("Location:index.php?error= password  is required");
         exit();

     }else{
         $sql = "SELECT * FROM user WHERE nic = '$uname'  AND password = '$password'";
         $result = mysqli_query($conn,$sql);

         if(mysqli_num_rows($result)== 1){
            $row = mysqli_fetch_assoc($result);
            if($row['nic'] == $uname && $row['password'] == $password ){
                
                $_SESSION['uname'] = $row['nic'];
                $_SESSION['byear'] = $row['batch'];
				$_SESSION['id']=$row['user_id'];
				$stu=$row['position'];
                $idulg=$row['user_id'];

                $sql = "SELECT department.dep_name FROM department,user WHERE  user.dep_id = department.department_id AND user.nic = '$uname'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['department'] =  $row['dep_name'];
                
				if($stu == 1){
			mysqli_query($conn, "insert into userlog(user_name, name) value((select nic from user where user_id='$idulg'), CONCAT((select firstname from user where user_id='$idulg'), ' ', (select lastname from user where user_id='$idulg')))");
				
				$rw=mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(log_id) FROM userlog"));
				$_SESSION['lgid']=$rw[0];
					header("Location:home.php");
				}
				else{
			mysqli_query($conn, "insert into userlog(user_name, name) value((select nic from user where user_id='$idulg'), CONCAT((select firstname from user where user_id='$idulg'), ' ', (select lastname from user where user_id='$idulg')))");
				$rw=mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(log_id) FROM userlog"));
				$_SESSION['lgid']=$rw[0];
					header("Location:dashboard.php");
				}
                
                exit();
            }else{

                header("Location:index.php?error= user name and password");
                exit();

            }

            header("Location:index.php?error= user name and password");
            exit();
    
         }else{
            header("Location:index.php?error= user name and password");
                exit();
         }
     }
    

    
 }else{

     header("Location:index.php?error= username and password");
     exit();
    
}

?>