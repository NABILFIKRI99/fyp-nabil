<?php 
session_start();

	include("connection.php");
	include("function.php");

	$user_data = check_login($con);
  
  $query = mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query);
  


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/img/logo4.png">
  <title>GeeksFelting</title>
  <link rel="stylesheet" href="./assets/css/plugins.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preload" href="./assets/css/fonts/thicccboi.css" as="style" onload="this.rel='stylesheet'">
</head>

<body>
  <div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
      <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
          <a href="./index.php">
              <img src="./assets/img/logo4.png"  style="height:60px; weidth:26px;">
            </a>
          </div>
          <div class="navbar-collapse offcanvas-nav">
            <div class="offcanvas-header d-lg-none d-xl-none">
              <a href="./index.php"><img src="./assets/img/logo4.png" srcset="./assets/img/logo@2x.png 2x" alt=""  style="height:60px; weidth:26px;">GeeksFelting</a>
              <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
            </div>
            <ul class="navbar-nav">
             <li class="nav-item dropdown"><a class="nav-link" href="./index.php">Homes</a>
             <li class="nav-item dropdown"><a class="nav-link" href="./courses-path.php">Courses</a>
             <li class="nav-item dropdown"><a class="nav-link" href="./inventory-list.php">inventory</a>  
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
              <li class="nav-item d-none d-md-block">
                <a href="logout.php" class="btn btn-sm btn-primary rounded" >Log Out</a>
              </li>
              <li class="nav-item d-lg-none">
                <div class="navbar-hamburger"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
              </li>
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
    
    </header>
    <!-- /header -->
   
    
               <section class="wrapper bg-soft-primary">
              <div class="container pt-10 pb-15 pt-md-14 pb-md-20 text-center">
              <div class="row">
              <div class="col-md-10 col-lg-8 col-xl-8 col-xxl-6 mx-auto mb-13" data-cues="slideInDown" data-group="page-title">

            <h1 class="display-1 mb-4">Welcome to GeeksFelting<br /><span class="typer text-primary text-nowrap" data-delay="100" data-words="  <?php echo $fetch['username']; ?>" ></span><span class="cursor text-primary" data-owner="typer"></span></h1>
            <p class="lead fs-lg px-xl-12 px-xxl-6 mb-7">Easily achieve your goals to learn the craft from beginner to expert in one place.</p>
            <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="page-title-buttons" data-delay="600">
              <span><a href="courses-path.php" class="btn btn-primary rounded mx-1">Get Started</a></span>
            </div>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->


   
           

    <section class="wrapper bg-light">
      <div class="container pb-12 pb-md-12 mb-lg-12 mb-xl-12">
      
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <div class="col-lg-6 position-relative">
            <div class="shape rounded bg-pale-yellow rellax d-block" data-rellax-speed="0" style="top: 50%; left: 50%; width: 50%; height: 60%; transform: translate(-50%,-50%);z-index:0"></div>
            <div class="row gx-md-5 gy-5 position-relative align-items-center">
              <div class="col-6">
                <img class="img-fluid rounded shadow-lg d-flex ms-auto" data-cue="fadeIn" data-delay="300" src="./assets/img/photos2/ig1.jpg" srcset="./assets/img/photos/sa13@2x.jpg 2x" alt="" />
              </div>
              <!-- /column -->
              <div class="col-6">
                <img class="img-fluid rounded shadow-lg d-flex col-10" data-cue="fadeIn" data-delay="1200" src="./assets/img/photos2/kit.jpeg" srcset="./assets/img/photos/sa15@2x.jpg 2x" alt="" />
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <h3 class="display-4 mb-5">We bring solutions to learn needle felting the way works best.</h3>
            <p class="mb-5">Needle felting is a craft that transforming wool into 3D shapes by using a special needle to bond the wool together.</p>
            <div class="row gy-3">
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-yellow mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>We provide a tutorial on how to do this craft for free.</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Course from beginner to expert.</span></li>
                </ul>
              </div>
              <!--/column -->
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-yellow mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Inventory to store your equipment.</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Discussion page to ask related to the crafts.</span></li>
                </ul>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
   
  
    <section class="wrapper bg-soft-primary">
      <div class="container pt-14 pb-18 pt-md-17 pb-md-22 text-center">
        <div class="row">
          <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
            <h3 class="display-4 mb-15 mb-md-6 px-lg-10">Our top courses</h3>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container py-14 py-md-16">
        <div class="pricing-wrapper position-relative mt-n22 mt-md-n24">
          <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1" style="top: 2rem; right: -2.4rem;"></div>
          <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1" style="bottom: 0.5rem; left: -2.5rem;"></div>
          <div class="row gy-6 mt-3 mt-md-5">
            <div class="col-md-6 col-lg-4">
              <div class="pricing card shadow-lg text-center">
                <div class="card-body">
                  <img src="./assets/img/photos2/newbie2.png" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                  <h4 class="card-title">Basic</h4>
                  <p>Learn the function of basic kit and make simple shape.</p>
                  <a href="courses-path.php" class="btn btn-primary rounded">Enroll Now</a>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing card shadow-lg text-center">
                <div class="card-body">
                  <img src="./assets/img/photos2/medium.png" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                  <h4 class="card-title">Medium</h4>
                  <p>Learn in depth on felting kit and combine shape.</p>
                  <a href="courses-path.php" class="btn btn-primary rounded">Enroll Now</a>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-0">
              <div class="pricing card shadow-lg text-center">
                <div class="card-body">
                  <img src="./assets/img/photos2/expert.png" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                  <h4 class="card-title">Expert</h4>
                  <p>Learn how to make complete object and keychains..</p>
                  <a href="courses-path.php" class="btn btn-primary rounded">Enroll Now</a>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!--/.pricing-wrapper -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper image-wrapper bg-auto no-overlay bg-image text-center bg-map" data-image-src="./assets/img/map.png">
      <div class="container pt-0 pb-14 pt-md-18 pb-md-18">
        <div class="row">
          <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
            <h3 class="display-4 mb-8 px-lg-12"><i>"Knowledge has power.It controls access to opportunity and advancement" -Peter Drucker </i></h3>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="join">
          <span><a href="courses-path.php" class="btn btn-primary rounded mx-1">Get Started</a></span>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="bg-dark text-inverse mt-5 mt-md-16">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
    
     
        <div class="col-md-12 col-lg-12">
          <div class="widget">
            
            <!-- <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p> -->
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <!-- <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-floating">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <!-- <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div> --> 
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
</body>

</html>