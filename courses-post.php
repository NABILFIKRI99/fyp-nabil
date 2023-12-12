<?php

session_start();
include("connection.php");
include("function.php");


$sql = "SELECT * from coursepath WHERE course_path='" . $_GET["course_path"] . " ' ";
$result = mysqli_query($con,$sql) or die (mysql_error());



//PHP FOR DISPLAY COMMENT
$sql2 = "SELECT * from courseComment WHERE course_Comment='" . $_GET["course_Comment"] . " ' ";
$result2 = mysqli_query($con,$sql2) or die (mysql_error());


//PHP CODE FOR SIGN UP
if (!empty($_POST['submit_2'])) {
  
  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
  //something was posted
  $course_Comment = $_GET["course_Comment"];
  $comment_id= random_num(20);
  $user_data = check_login($con);
  $username = $user_data['username'];
  $comment = $_POST['comment'];

  

		if(!empty($comment) )
		{

			//save to database
		
			$query = "insert into coursecomment (course_Comment, comment_id ,username, comment) values ('$course_Comment ' ,' $comment_id' , ' $username' ,' $comment' )";

			mysqli_query($con, $query);

			header("Location: courses-path.php");
      
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
            <img src="./assets/img/logo4.png" srcset="./assets/img/logo@2x.png 2x" alt="" / style="height:60px; weidth:26px;">
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


    <?php 
         while ($row= mysqli_fetch_array($result))
         {
            ?>
            <section class="wrapper bg-soft-primary">
              <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
                <div class="row">
                  <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                     
                      <!-- /.post-category -->
                      <h1 class="display-1 mb-4"><?php echo $row['course_pathName']; ?></h1>
                      
                      <!-- /.post-meta -->
                    </div>
                    <!-- /.post-header -->
                  </div>
                  <!-- /column -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container -->
            </section>
            <!-- /section -->

               <!-- /section -->
   <section class="wrapper bg-light">
    <div class="container pb-14 pb-md-16">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="blog single mt-n17">
            <div class="card">
                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $row['course_pathLink']; ?>"></div>
              <div class="card-body">
                <div class="classic-view">
                  <article class="post">
                    <div class="post-content mb-5">
                      <h2 class="h1 mb-4"><?php echo $row['course_pathName']; ?></h2>
                      <blockquote class="fs-lg my-8">
                        <p><?php echo $row['course_pathList']; ?></p>
                        <footer class="blockquote-footer">Items Needed </footer>
                      </blockquote>
                      <p><?php echo $row['course_pathDescription']; ?></p>
                      
                      <div class="row g-6 mt-3 mb-10 light-gallery-wrapper">
                      
                        <!--/column -->
          
                    </div>
                  
                  </article>
                  <!-- /.post -->
                </div>
                <!-- /.classic-view -->
                <hr />
                <h3 class="mb-6">Discussion </h3>

          <!-- TEST -->
          <?php 
         while ($row= mysqli_fetch_array($result2))
         {
            ?>
             <div id="comments">
                 
                 
                  <ol id="singlecomments" class="commentlist">
                    <li class="comment">
                      <div class="comment-header d-md-flex align-items-center">
                        <div class="d-flex align-items-center">
                          
                          <div>
                            <h6 class="comment-author"><?php echo $row['username']; ?></h6>
                          
                            <!-- /.post-meta -->
                          </div>
                          <!-- /div -->
                        </div>
                      
                      </div>
                      <!-- /.comment-header -->
                      <p><?php echo $row['comment']; ?></p>
                    </li>
             
                  </ol>
                </div>

        <?php
         }
         
?>
         



        
              

                <!-- /#comments -->
                <hr />
                <h3 class="mb-3">Would you like to share your thoughts?</h3>
                <form class="comment-form" method="post" >
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" name="comment" placeholder="Comment" style="height: 150px">
                    <label>Comment *</label>
                  </div>
                  <input class="btn btn-primary rounded-pill mb-0" type="submit" value="Submit" name="submit_2"></input>
                  <!-- <button type="submit" class="btn btn-primary rounded-pill mb-0" name="submit_2">Submit</button> -->
                </form>
                <!-- /.comment-form -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.blog -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
        <?php
         }
         
?>



 

  
  </div>
 
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