<?php 
session_start();

	include("connection.php");
	include("function.php");

//PHP CODE FOR SIGN UP
if (!empty($_POST['submit_2'])) {
  
  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
    $email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($username) && !empty($password) && !is_numeric($username))
		{

			//save to database
			$id = random_num(20);
      $inventory_id = random_num(20);
			$query = "insert into users (id,email,username,password,inventory_id) values ('$id','$email' , '$username','$password' , '$inventory_id' )";

			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		}else
		{
			echo '<div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
      <i class="uil uil-times-circle"></i>Please enter some valid information!</a>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

		}
	}

}

//PHP CODE FOR LOGIN 
if (!empty($_POST['submit_1'])) {
  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username2'];
		$password = $_POST['password2'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: home.php");
						die;
					}
				}
			}
			
      echo '<div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
      <i class="uil uil-times-circle"></i>wrong username or password!</a>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

		}else
		{
			echo '<div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
      <i class="uil uil-times-circle"></i>wrong username or password!</a>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
		}
	}
}


  



  
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
    <header class="wrapper bg-soft-primary" style="padding-top: 10px;">
      <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
          <a href="./register.php">
              <img src="./assets/img/logo4.png"  style="height:60px; weidth:26px;">
          </a>
          </div>
        
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
              <li class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-01">Login</a>
              </li>
              <li class="nav-item d-md-block">
                <a href="#" class="btn btn-sm btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modal-02">Sign Up</a>
              </li>
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
      <div class="modal fade" id="modal-01" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h3 class="mb-4">Login to Sandbox</h3>
              <form class="text-start mb-3" method="post">
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="username" id="loginEmail" name="username2">
                  <label for="loginEmail">username</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="password2">
                  <label for="loginPassword">Password</label>
                </div>
                <input class="btn btn-primary rounded-pill btn-login w-100 mb-2" type="submit" value="login" name="submit_1" ></input>
              </form>
              <!-- /form -->
              
      
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->

      <div class="modal fade" id="modal-02" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h3 class="mb-4">Signup to Sandbox</h3>
              <form  class="text-start mb-3" method="post">
                <div class="form-floating mb-4">
                  <input type="email" class="form-control" placeholder="Email" id="loginEmail" name="email">
                  <label for="loginEmail">Email</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="username" id="loginusername" name="username">
                  <label for="loginEmail">username</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="password">
                  <label for="loginPassword">Password</label>
                </div>
                <input class="btn btn-primary rounded-pill btn-login w-100 mb-2" type="submit" value="signup" name="submit_2"></input>
              </form>
              <!-- /form -->
              
      
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->
    </header>
    <!-- /header -->
    <section class="wrapper bg-soft-primary">
      <div class="container pt-10 pb-15 pt-md-14 pb-md-20 text-center">
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-8 col-xxl-6 mx-auto mb-13" data-cues="slideInDown" data-group="page-title">
            <h1 class="display-1 mb-4">Learning needle felting craft never been this easy</h1>
            <p class="lead fs-lg px-xl-12 px-xxl-6 mb-7">Easily achieve your goals to learn the craft from beginner to expert in one place.</p>
           
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
            
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
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