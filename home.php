<?php
require_once("./include/headr1.php");
?>

<!DOCTYPE html>


<html lang="en">

<head>
<title>USHD</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Typed JS -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="main.cs">
    <link rel="stylesheet" type="text/css" href="maingallery.css">
    <link rel="stylesheet" type="text/css" href="dep.css">
    <link rel="stylesheet" type="text/css" href="mv.css">
    <link rel="stylesheet" type="text/css" href="2contact.cs">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <link rel="stylesheet" type="text/css" href="chat.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="style-contact.ss">


    
	<link rel="stylesheet" href="style-nav.css" />
	
	<!--Sweet Alert-->
	

</head>

<body style="background-color: rgba(0,0,0,0);">
<div class="loader"></div>
    <div class="home1">
        <h1 class="bgtext">WELCOME <span id="element"></span></h1>

    </div>
    <input type="radio" name="photos" id="check1" checked>
    <input type="radio" name="photos" id="check2">
    <input type="radio" name="photos" id="check3">
    <input type="radio" name="photos" id="check4">
    <div class="container2 ">
        <br>
        <div class="top-content">
            <h3><b>USHD  Gallery</b> </h3>
            
        </div>
        
 <div class="img-slider">
      <div class="slide active">
        <img src="1.jpg" alt="">
        <div class="info">
          <h2>Slide 01</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="2.jpg" alt="">
        <div class="info">
          <h2>Slide 02</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="3.jpg" alt="">
        <div class="info">
          <h2>Slide 03</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="4.jpg" alt="">
        <div class="info">
          <h2>Slide 04</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="5.jpg" alt="">
        <div class="info">
          <h2>Slide 05</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="navigation">
        <div class="btn active"></div>
        <div class="btn"></div>
        <div class="btn"></div>
        <div class="btn"></div>
        <div class="btn"></div>
      </div>
    </div>

    <script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    
 
    let currentSlide = 1;

    // Javascript for image slider manual navigation
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;

        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 10000);
      }
      repeater();
    }
    repeat();
    </script>

    <br>
    <section class="light">
        <div class="container py-2">
            <div class="h1 text-center text-dark" id="pageHeaderTitle">Departments</div>

            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="column-3.jpg"" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title green">
                        <a href="#">Department of Information Communication Technology</a> 
                    </h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><br>The Department of Information Communication Technology There is a strong demand for multidisciplinary ICT professionals in Sri Lanka. Department of Information and Communication Technology, Faculty of Technology, University of Colombo
                        aims to cater to this demand. Students train to serves as Network Professionals, Database Administrators, System Administrators and DevOps Engineers.</div>

                </div>
            </article>
            
            <article class="postcard light red">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="column-2.jpg"" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title red"><a href="#">Department of Environmental Technology</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><br>The Department of Environmental Technology has been established under the Faculty of Technology, University of Colombo. The department conducts research with state-of-the-art technologies to develop innovative environmental technologies.
                        The competency of the students would be well strengthened with the opportunities provided by the department.</div>

                </div>
            </article>
            <article class="postcard light blue">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="column-1.jpg"" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">Department of Agricultural Technology</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><br>The Department of Agricultural Technology conducts the academic program leading to the Bachelor of Biosystems Technology Honours in Agriculture. The curriculum is developed with the objective of imparting knowledge which will enable
                        students to develop skills and competencies for achieving goals of sustainable agriculture.</div>

                </div>
            </article>
            
            
            <article class="postcard light yellow">
                <a class="postcard__img_link" href="#">
                    <img class="" src="column-4.jpg" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title yellow">
                        <a href="#">Department of Instrumentation and Automation Technology</a>
                    </h1>
                   
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><br>Department conducts Bachelor of Engineering Technology Honours in Instrumentation and Automation. Program provides adequate knowledge of mathematics, natural sciences, engineering fundamentals, and engineering specialization in instrumentation
                        and automation technology. In the long run, the application oriented in-depth knowledge and hands-on experience will empower the undergraduates with a dazzling passion. In addition to the core courses in instrumentation and automation,
                        the course modules offer under the degree program consist of computer science.</div>

                </div>
            </article>
        </div>
    </section>
    
    
    <br>
    <br>
    
 <!--
    <div class="container features">
        <div class="row">
            <div class="col-sm-6">
                <h1>
                    <center>Vission</center>
                </h1>


                <p class="pclass "><br><br>Driven by its passion for continous improvement, the State College has to vigorously pursue distinction and proficieny in delivering its statutory functions to the Filipino people in the fields of education, business, agro-fishery,
                    industrial, science and technology, through committed and competent human resource, guided by the beacon of innovation and productivity towards the heights of elevated status</p>
            </div>
            <div class="col-sm-6">
                <h1 class="h1111 ">
                    <center>Mission</center>
                </h1>


                <p class="pclass "><br><br>A leading institution in higher and continuing education commited to engage in quality instruction, development-oriented research sustinable lucrative economic enterprise, and responsive extension and training services through
                    relevant academic programs to empower a human resource that responds effectively to challenges in life and acts as catalyst in the holistoic development of a humane society.</p>
            </div>
        </div>
    </div>
    
    
    <br><br>
--> 

 <div class="container p-5">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-2 g-3">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="text-center">
           

                        <div class="img-hover-zoom img-hover-zoom--colorize">
                            <img class="shadow" src="https://img.freepik.com/free-vector/business-strategy_1325-28.jpg?w=740&t=st=1672477942~exp=1672478542~hmac=430a23d35ea1d4e6f220d27bf91b18842aa1261d552faa92190a82ae9861cf52 600x600""
                                alt="Another Image zoom-on-hover effect">
                        </div>

                    </div>
           
                    <div class="card-body">
                        <div class="clearfix mb-3">


         

                        </div>


                        <div class="my-2 text-center">

                            <h1 style="color:black">Mission</h1>

                        </div>
                        <div class="mb-3">

                            <h2 class="text-center role">A leading institution in higher and continuing education commited to engage in quality instruction, development-oriented research sustinable lucrative economic enterprise, and responsive extension and training services through
                    relevant academic programs to empower a human resource that responds effectively to challenges in life and acts as catalyst in the holistoic development of a humane societyr</h2>

                        </div>
                        <div class="box">
                            <div>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fab fa-home"></i></li>
                                    
                                </ul>
                            </div>
                        </div>

        
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="text-center">
               

                        <div class="img-hover-zoom img-hover-zoom--colorize">
                            <img class="shadow" src=" https://img.freepik.com/free-vector/vision-statement-concept-illustration_114360-7576.jpg?w=740&t=st=1672478018~exp=1672478618~hmac=3ae755c6b839ea2817892fabf411d3cd48683d505cafd95a1f49a259b0badcde/600x600"         
                                alt="Another Image zoom-on-hover effect">
                        </div>

                    </div>
               
                    <div class="card-body">
                        <div class="clearfix mb-3">


              

                        </div>


                        <div class="my-2 text-cente">

                            <h1 style="color:black">Vision</h1>

                        </div>
                        <div class="mb-3">

                            <h2 class=" text-center role">Driven by its passion for continous improvement, the State College has to vigorously pursue distinction and proficieny in delivering its statutory functions to the Filipino people in the fields of education, business, agro-fishery,
                    industrial, science and technology, through committed and competent human resource, guided by the beacon of innovation and productivity towards the heights of elevated status</h2>

                        </div>
                        <div class="box">
                            <div>
                               <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fab fa-home"></i></li>
                                    
                                </ul>
                            </div>
                        </div>

                     
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>


    </div>

<section class="light">
        <div class="container py-2">
            <div class="h1 text-center text-dark" id="pageHeaderTitle">Contact us</div>

        </div>
    </section>
    
    
<div class="form-area">
    

    
    
        <div class=" container ">

            <div class="row single-form g-0 " style="border-radius: 15px; ">
                <div class="col-sm-12 col-lg-6 d-flex align-items-center">
                    <div class="left " style="border-radius: 15px; ">

                        <!--<h2><span><i class="bi bi-envelope-at-fill "></i></span> <br>Contact Us</h2>-->
						<img id="rci" src="114.png" width="400" height=320" ></img>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 ">
                    <div class="right ">
                                <?php
    if(isset($_GET['msg']) && $_GET['msg'] == "success") {;
?>

<div class="alert alert-success" role="alert" onclick="this.style.display='none'" id="success_msg">
  Successfully sent message.
</div>

<script>
    //Swal.fire('Any fool can use a computer');
    function dissapear() {
        let msg = document.getElementById("success_msg");
        msg.style.display = "hidden";
    }
</script>

<?php }; ?>
                        <i class="fa fa-caret-left "></i>
                        <form action="get.php" method="POST">
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1 " class=" ">Your Name</label>
                                <input type="text " class="form-control " id="exampleInputEmail1 " name="username" aria-describedby="emailHelp ">
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1 " class=" ">Email address</label>
                                <input type="email " class="form-control " id="exampleInputEmail2 " name="email" aria-describedby="emailHelp ">
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputPassword1 " class=" ">Message</label>
                                <textarea type="password " class="form-control " id="exampleInputPassword1 " name="message"></textarea>
                            </div>
                            <button type="submit " name="submit" class="btn btn-primary ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        /*echo "Hello World";
        if(isset($_POST['submit']) && !empty($_POST['message'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $message = $_POST['message'];
                                
            $receiver ="wijebandaraam1999@gmail";
            $subject = "Test Mode";
            $headers = "From: " . $email;
                                
            echo $username, $email, $message, $headres;
                                
            //mail($receiver, $subject, $message, $headres);
        }*/
    ?>
    
    <!-- Custom JavaScript -->
    <script src="app.js "></script>
    <script src="jquery-3.5.1.min.js "></script>
    <script src="bootstrap/js/bootstrap.min.js "></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include("include/footer.php");?>
</body>


<script>
var profile;
window.addEventListener("load", init, false);
function init(){
	profile=document.getElementById("profile");
}

</script>
</html>