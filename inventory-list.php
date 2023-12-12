<?php 
session_start();

	include("connection.php");
	include("function.php");
    // include("upload.php");

    $user_data = check_login($con);
    $inventory_id = $user_data['inventory_id'];
    $items_id = random_num(20);
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql) or die (mysql_error());

    if (!empty($_POST['submit_1'])) { 
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //something was posted
        $inventory_id = $user_data['inventory_id'];
        $items_name = $_POST['items_name'];
        $items_quantity = $_POST['items_quantity'];
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
       
        
    
            // if(!empty($items_name) && !empty($items_quantity) 
            // && ($_FILES["file"]["type"] == "image/png")
            // && in_array($extension, $allowedExts) )  

            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
            && in_array($extension, $allowedExts) && !empty($items_quantity) && !empty($items_name) )

            {
             
 {
  
                      //Move the file to the uploads folder
                      move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/". $_FILES["file"]["name"]);
              
                      //Get the File Location
                      $filelocation = "uploads/".$_FILES["file"]["name"];
              
                      // //Get the File Size
                      // $size = ($_FILES["file"]["size"]/1024).' kB';
              
                      //Save to your Database
                      $query = "insert into inventory (inventory_id,items_id,items_name,items_quantity,items_img) values ('$inventory_id', '$items_id','$items_name' , '$items_quantity','$filelocation')";
                     
                      mysqli_query($con, $query);
                      // mysqli_query($connect_to_db, "INSERT INTO images (user, filelocation) VALUES ('$user', '$filelocation', '$size')");
              
                      //Redirect to the confirmation page, and include the file location in the URL
                      header("Location: inventory-list.php");
              
                  }
              
            }else
            {
                echo '<div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
          <i class="uil uil-times-circle"></i>Please enter some valid information!</a>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    
            }
        }
    }

    // if (isset($_GET['delete'])) {
    //   $sql = "DELETE FROM inventory WHERE items_name='" . $_GET["items_name"] . "'";
    // }
  
  

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
  <div class="content-wrapper bg-soft-primary">
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
    <div class="container-fluid wrapper bg-soft-primary">
       

      <div class="row mb-2" style="padding-top: 40px; margin-left: 40px;">
        <div class="col-sm-4">
            <a href="apps-projects-add.html" data-bs-toggle="modal" data-bs-target="#modal-01" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i> Create Items</a>
        </div>
       
    </div> 
    <!-- end row-->

    <div class="modal fade" id="modal-01" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h3 class="mb-4">Create Item</h3>

              <!-- PHP REFERENCE -->
              <form class="text-start mb-3" method="post" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="name" name="items_name">
                  <label for="loginEmail">Name</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="number" class="form-control" placeholder="number" name="items_quantity">
                  <label for="loginPassword">Quantity</label>
                </div>
                <div class="form-floating mb-4">
                <input type="file" class="form-control" name="file">
                </div>
                <input class="btn btn-primary rounded-pill w-100 mb-2" type="submit" value="Submit" name="submit_1" ></input>
              </form>
              <!-- /form -->
              
              
              <!--/.social -->
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->

      



    <div class="row" style="margin-left: 40px; margin-right: 40px;">

    <?php 
         while ($row= mysqli_fetch_array($result))
         {
            ?>
              <div class="col-md-6 col-xxl-3" style="margin-bottom: 25px;">
             <!-- project card 1 -->
             
             <div class="card d-block shadow-lg">
                 <div class="card-body">
                 
                <div data-cues="fadeIn">
                <img src="<?php echo $row['items_img']; ?>" width="210px" height="200px">
  
                </div>
         
                     <div class="row" style="margin-top: 20px;">
                         <h4 class="mt-0 col-lg-10 col-sm-10">
                             <p class="font-13 mb-3"><?php echo $row['items_name']; ?></p>
                         </h4>
                        
                         <div class="dropdown card-widgets col-lg-2 col-sm-2" >
                             <a href="#"  data-bs-toggle="dropdown" >
                                 <i class="uil uil-bars"></i>
                             </a>
                             <div class="dropdown-menu dropdown-menu-end">
                                
                                 <!-- item-->
                                 <a href="process.php?items_id=<?php echo $row["items_id"]; ?>" class="dropdown-item" name="delete"><i class="mdi mdi-pencil me-1"></i>Delete</a>
                                 <!-- item-->
                                 <!-- <a href="update-process.php?items_id=<?php echo $row["items_id"]; ?>" class="dropdown-item" name="delete"><i class="mdi mdi-delete me-1"></i>Edit</a> -->
                                 <!-- item-->
                             </div>
     
                            
                         </div>
                         <!-- project title-->
                     </div>
                    
                     
                     <p class="font-13 mb-3">Total item available is</p><span class="underline-2 blue"><?php echo $row['items_quantity']; ?></span>
                     
 
                 </div> <!-- end card-body-->
                
             </div> <!-- end card-->
         </div> <!-- end col -->
        <?php
         }
         
?>

    

    </div>
  
   
  
   
   

  
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
</body>

</html>