<?php 
session_start();

	include("connection.php");
	include("function.php");

  $user_data = check_login($con);
    
  //DATA FOR BEGINNER
  $beginner = "SELECT * from courses WHERE course_level = 'beginner' ";
  $result = mysqli_query($con,$beginner) or die (mysql_error());

   //DATA FOR MEDIUM
   $medium = "SELECT * from courses WHERE course_level = 'medium' ";
   $result2 = mysqli_query($con,$medium) or die (mysql_error());
  
   //DATA FOR HARD
   $hard = "SELECT * from courses WHERE course_level = 'hard' ";
   $result3 = mysqli_query($con,$hard) or die (mysql_error());

   

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
 
<div class="container-fluid wrapper bg-soft-primary">
    	<!-- Content  -->
  <div class="py-6">
    <div class="container">
      <div class="row">

      
        <div class="col-md-12">
          <!-- Tab content -->
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
              <!-- Tab pane -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-5">
                    <h2 class="mb-1">Beginner</h2>
                    <p>Learn the function of basic kit and make simple shape.</p>
                  </div>
                </div>
              </div>


              <div class="row">



                <?php 
         while ($row= mysqli_fetch_array($result))
         {
         
            ?>
             
               <!-- EDIT PHP HERE-->
               <div  class="col-lg-3 col-md-6 col-12">
                  
                  <div class="card  mb-4 card-hover">
                    <figure class="card-img-top overlay overlay1 hover-scale"><a href="#"> <img src="<?php echo $row['course_img']; ?>" width="100px" height="100px" alt="" /></a>
                      
                    </figure>
                    <div class="card-body">
                      <div class="post-header">
                        <div class="post-category text-line">
                        <a href="courses-post.php?course_path=<?php echo $row["course_path"];?>&course_Comment=<?php echo $row["course_Comment"];?>"  ><?php echo $row['course_name']; ?></a>
                        </div>
                      

                      </div>
                      <!-- /.post-header -->
                      <div class="post-content">
                        <p><?php echo $row['course_description']; ?></p>
                      </div>
                      <!-- /.post-content -->
                    </div>
                    <!--/.card-body -->
                   
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
              
              </div>
             
        <?php
         }
       
?>

              <hr class="my-5">
              <!-- Content -->
              <div class="row">

                <div class="col-lg-12 col-md-12 col-12">
                  <div class="mb-5">
                    <h2 class="mb-1">Intermediate</h2>
                    <p>Learn in depth on felting kit and combine shape.</p>
                  </div>
                </div>
              </div>
              <div class="row">

              <?php 
         while ($row= mysqli_fetch_array($result2))
         {
            ?>
               <!-- EDIT PHP HERE-->
               <div  class="col-lg-3 col-md-6 col-12">
                  
                  <div class="card  mb-4 card-hover">
                    <figure class="card-img-top overlay overlay1 hover-scale"><a href="#"> <img src="<?php echo $row['course_img']; ?>" width="100px" height="100px" alt="" /></a>
                      
                    </figure>
                    <div class="card-body">
                      <div class="post-header">
                        <div class="post-category text-line">
                        <a href="courses-post.php?course_path=<?php echo $row["course_path"];?>&course_Comment=<?php echo $row["course_Comment"];?>"  ><?php echo $row['course_name']; ?></a>
                        </div>
                      
                      </div>
                      <!-- /.post-header -->
                      <div class="post-content">
                        <p><?php echo $row['course_description']; ?></p>
                      </div>
                      <!-- /.post-content -->
                    </div>
                    <!--/.card-body -->
                   
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
              
              </div>
        <?php
         }
         
?>


              <hr class="my-5">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                  <div class="mb-5">
                    <h2 class="mb-1">Advance</h2>
                    <p>Learn how to make complete object and keychains..</p>
                  </div>
                </div>
              </div>
              <div class="row">
              <?php 
         while ($row= mysqli_fetch_array($result3))
         {
            ?>
               <!-- EDIT PHP HERE-->
               <div  class="col-lg-3 col-md-6 col-12">
                  
                  <div class="card  mb-4 card-hover">
                    <figure class="card-img-top overlay overlay1 hover-scale"><a href="#"> <img src="<?php echo $row['course_img']; ?>" width="100px" height="100px" alt="" /></a>
                      
                    </figure>
                    <div class="card-body">
                      <div class="post-header">
                        <div class="post-category text-line">
                        <a href="courses-post.php?course_path=<?php echo $row["course_path"];?>&course_Comment=<?php echo $row["course_Comment"];?>"  ><?php echo $row['course_name']; ?></a>
                        </div>
                      
                      </div>
                      <!-- /.post-header -->
                      <div class="post-content">
                        <p><?php echo $row['course_description']; ?></p>
                      </div>
                      <!-- /.post-content -->
                    </div>
                    <!--/.card-body -->
                   
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
              
              </div>
        <?php
         }
         
?>


              
              </div>


            </div>


            
            <div class="tab-pane fade" id="pills-author" role="tabpanel" aria-labelledby="pills-author-tab">
              <div class="row">
              
               
               
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
      <!--/.card-body -->
      <!-- <div class="card-footer">
        <ul class="post-meta d-flex mb-0">
          <li class="post-date"><i class="uil uil-calendar-alt"></i><span>7 Jan 2021</span></li>
          <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>2</a></li>
          <li class="post-likes ms-auto"><a href="#"><i class="uil uil-heart-alt"></i>5</a></li> -->
        <!-- </ul> -->
        <!-- /.post-meta -->
     
</div>
  
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