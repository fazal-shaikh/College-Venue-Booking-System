<?php
session_start();
if(empty($_SESSION['username']))
{
  header('Location:aboutus.html');
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Team</title>
     <link rel="stylesheet" href="aboutus.css">
     <script src="https://kit.fontawesome.com/4c3bd871f2.js" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
     <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 	<link rel="stylesheet" href="css/style.css">
 	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 </head><script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 <div class="wrapper">
       <header>

          <nav>
             <div class="menu-icon">
                <i class="fas fa-bars"></i>
             </div>
             <div class="logo">
                <h3><b>JFG</b></h3>
             </div>
             <div class="menu">
                <ul>
                 <li><a href="FFFFFF.php">Home</a></li>
                 <li><a href="status.php">Venue Status</a></li>
                 <li><a href="up.php">Upcoming Events</a></li>
                 <li><a href="logoutprocess.php">Login</a></li>


                </ul>
             </div>
          </nav>
          <script>
          $(document).ready(function() {
           $(".menu-icon").on("click", function() {
           $("nav ul").toggleClass("showing");
           });
         });
         $(window).on("scroll", function() {
            if($(window).scrollTop()) {
              $('nav').addClass('black');
           }

            else {
              $('nav').removeClass('black');
           }
         });
         </script>
         </header>
     </div>



 <body class="x">

       <div class="row">


       <div class="col-md-6 d-flex justify-content-center">
            <figure class="snip1"><img src="fazal.jpg" alt="profile-sample1" class="background" /><img src="fazal.jpg" alt="profile-sample1" class="profile" />
                <figcaption>
                  <h3>Fazal<span>Front End Developer</span></h3>
                  <div class="icons"><a href="https://github.com/fazal-shaikh"><i class="fab fa-github"></i></a><a href="https://www.linkedin.com/in/sinchana-b-a224aa215/"> <i class="fab fa-linkedin"></i></a><a href="https://www.instagram.com/b.sinchana/"> <i class="fab fa-instagram"></i></a></div>
                </figcaption>
              </figure>
          </div>

      <div class="col-md-6 d-flex justify-content-center">
        <figure class="snip1"><img src="girish.jpg" alt="profile-sample1" class="background" /><img src="girish.jpg" alt="profile-sample1" class="profile" />
            <figcaption>
              <h3>Girish<span>Front End Developer</span></h3>
              <div class="icons"><a href="https://github.com/girish1257"><i class="fab fa-github"></i></a><a href="https://www.linkedin.com/in/sinchana-b-a224aa215/"> <i class="fab fa-linkedin"></i></a><a href="https://www.instagram.com/b.sinchana/"> <i class="fab fa-instagram"></i></a></div>
            </figcaption>
          </figure>
      </div>

      <div class="col-md-6 d-flex justify-content-center">
        <figure class="snip2"><img src="jaydeep.jpg" alt="profile-sample7" class="background" /><img src="bheem.jpg" alt="profile-sample7" class="profile" />
            <figcaption>
              <h3>Bheemappa <span>Back End Developer</span></h3>
              <div class="icons"><a href="https://github.com/Bheem-star"><i class="fab fa-github"></i></a><a href="https://www.linkedin.com/in/jaydeep-singh-galhotra-02350425b//"> <i class="fab fa-linkedin"></i></a><a href="https://www.instagram.com/_.yashikayadava.__/"> <i class="fab fa-instagram"></i></a></div>
            </figcaption>
          </figure>
      </div>

  <div class="col-md-6 d-flex justify-content-center">
    <figure class="snip2"><img src="furqan.jpg" alt="profile-sample7" class="background" /><img src="furqan.jpg" alt="profile-sample7" class="profile" />
        <figcaption>
          <h3>Furqan<span>Back End Developer</span></h3>
          <div class="icons"><a href="https://github.com/mullafurqan"><i class="fab fa-github"></i></a><a href="https://www.linkedin.com/in/yashika-yadava-066664215/"> <i class="fab fa-linkedin"></i></a><a href="https://www.instagram.com/_.yashikayadava.__/"> <i class="fab fa-instagram"></i></a></div>
        </figcaption>
      </figure>
  </div>
</div>

       <script>
           $(".hover").mouseleave(function () {
            $(this).removeClass("hover");
            });
       </script>
 </body>
 </html>
