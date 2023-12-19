<!DOCTYPE html>

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

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="logincss.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>login</title>
    </head>

    <body>
        <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");

    body{
        font-family: 'Baloo 2', cursive;
    }
</style>

        <div class="parent clearfix">
            <div class="bg-illustration">
                <!-- <img src="login.jpg" alt="logo"> -->

                <div class="burger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>

            <div class="login">
                <div class="container">
                    <h1>Login to<br />your account</h1>

                    <?php echo $out; ?>
                    <div class="login-form">
                    <form action="lgfunction.php" method="post" id="User name">
                        <input type="text" name="userName" placeholder="user name">
                        <input type="password" name="userPassword" placeholder="Password">

                        <div class="remember-form">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </div>
                        <div class="forget-pass">
                            <a href="forgetpass.php">Forgot Password ?</a>
                        </div>

                        <button type="submit" id="login">LOG-IN</button>

                    </form>
                </div>
                </div>
            </div>
        </div>

    </body>

    </html>