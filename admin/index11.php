<!DOCTYPE html>

<html lang="en">

<head>

    <title>About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./style2.css">

</head>

<body>
    <br><br>
    <!-- partial:index.partial.html -->

    <div class="signup-wrapper text-center">

        <div class="wrapper">
            <div class="signup-wrapper text-center">
                <a href="#">Welcome <span class="text-primary"><B>USHD</B></span></a>
            </div>

            <div class="inner-warpper text-center">
                <h2 class="title">Login as a Admin</h2>
                <form action="login.php" method="post" id="formvalidate">
                    <div class="input-group">
                        <label class="palceholder" for="userName"><B>User Name</B></label>
                        <input class="form-control" name="userName" id="userName" type="text" placeholder="" />
                        <span class="lighting"></span>
                    </div>
                    <div class="input-group">
                        <label class="palceholder" for="userPassword"><B>Password</B></label>
                        <input class="form-control" name="userPassword" id="userPassword" type="password" placeholder="" />
                        <span class="lighting"></span>
                    </div>

                    <button type="submit" id="login">Login</button>
                    <div class="clearfix supporter">
                        <div class="pull-left remember-me">
                            <input id="rememberMe" type="checkbox">
                            <label for="rememberMe">Remember Me</label>
                        </div>
                        <a class="forgot pull-right" href="#">Forgot Password?</a>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    <br><br><br>
   
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js'></script>
    <script src="./script.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js "></script>

</body>

</html>