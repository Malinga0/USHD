<?php
//session_start();
require_once("./include/headr1.php");
	
	if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == '')) {
		header("location: index.php");
		exit();
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title>About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="chat.css">
	<link rel="stylesheet" href="style-nav.css" />
	<link rel="stylesheet" href="style-contact.css">
	<link rel="stylesheet" href="1contact.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>

<body>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");

    body{
        font-family: 'Baloo 2', cursive;
    }
</style>

    <div>
        <h1 style="h11"><br>

            <center>About Us</center>
        </h1>

        </h1>
        <p>
              <div class="row mt-5">

            <div class="preview-card">
                <div class="preview-card__wrp">




                    <div class="preview-card__title mt-3"></div><center><b>USHD is an Internet-based system that enables university students to access their education.</b><br><br>The main objective is to get the educational tools required for educational activities such as<b> past papers, dummy papers, reference
                books and reference Videos </b>in one place.<br>when students log in to the system, he/she can find easily past papers, model papers, lecture materials, reference books and notes related to the subject.
                <br><br><b>This project was created by five first year students of the University of Colombo with the aim of facilitating individual education.  We believe that this website will help facilitate <br>your educational activities with facilities such as obtaining educational tools, sharing information etc</a></center> 

                </div>
            </div>

            <div class="container">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="./punsara.jpg" alt="">
                        </div>
                        <div class="contentBx">
                            <h4>Punsara</h4>
                            <h5>Developer</h5>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="./sanjana.jpg" alt="">
                        </div>
                        <div class="contentBx">
                            <h4>Sanjana</h4>
                            <h5>Developer</h5>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="./im.jpg" alt="">
                        </div>
                        <div class="contentBx">
                            <h4>Kasun</h4>
                            <h5>Developer</h5>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="./malinga.jpg" alt="">
                        </div>
                        <div class="contentBx">
                            <h4>Malinga</h4>
                            <h5>Developer</h5>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="./janitha.jpg" alt="">
                        </div>
                        <div class="contentBx">
                            <h4>Janith</h4>
                            <h5>Developer</h5>
                        </div>

                    </div>
                </div>
            </div>
    </div>

    <script src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<?php include("include/footer.php");?>
</body>

</html>