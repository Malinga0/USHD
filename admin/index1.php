<?php
if(isset($_GET['error'])){
    $out="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>incorrect !</strong>".$_GET['error']."
      </div>";
}
else{
    $out=" ";
}
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="logincss.css">

</head>

<body>
    <br><br><br>


    <div class="signup-wrapper text-center">

        <div class="wrapper">
            <div class="signup-wrapper text-center">
                <a href="#">Welcome... <span class="text-primary"><B>USHD</B></span></a>
            </div>

            <div class="inner-warpper text-center">
                <h2 class="title"> Admin Login</h2>
                <?php echo $out; ?>
                <form action="login.php" method="post" id="formvalidate">
                    <div class="input-group">
                        <label class="palceholder" for="userName"><B><i class="fa fa-plus"></i>User Name</B></label>
                        <input class="form-control" name="userName" id="userName" type="text" placeholder="" />
                        <span class="lighting"></span>
                    </div>
                    <div class="input-group">
                        <label class="palceholder" for="userPassword"><B>Password</B></label>
                        <input class="form-control" name="userPassword" id="userPassword" type="password" placeholder="" />
                        <span class="lighting"></span>
                    </div>

                    <button type="submit" id="login" class="lgbt">Login</button>
                    <div class="clearfix supporter">
                        <div class="pull-left remember-me">
                            <input id="rememberMe" type="checkbox">
                            <label for="rememberMe">Remember Me</label>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js'></script>
    <script src="./scriptlogin.js"></script>
    <script src="jquery-3.5.1.min.js "></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="main.js "></script>

</body>

</html>