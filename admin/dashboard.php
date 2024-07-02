<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

 $deptname=$_POST['deptname'];
$sql="insert into tbldepartment(DepartmentName)values(:deptname)";
$query=$dbh->prepare($sql);
$query->bindParam(':deptname',$deptname,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Department has been added.")</script>';
echo "<script>window.location.href ='add-dept.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Fatigue Monitoring System</title>
    
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
     
   </head>
   <body class="inner_page general_elements">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
           <?php include_once('includes/sidebar.php');?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include_once('includes/header.php');?>
               <!-- end topbar -->
                              <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #fe0000;">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-group white_color" style="font-size: 55px; font-weight: bold;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                <?php
                                 
                                define('DB_HOST','sql868.main-hosting.eu');
                                define('DB_USER','u179023685_talha');
                                define('DB_PASS','Heineken2020');
                                define('DB_NAME','u179023685_talha');
                                     
                                 /* Attempt to connect to MySQL database */
                                 
                                $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                $query = "SELECT COUNT(*) AS total_rows FROM tblemployee";
                                $result = mysqli_query($connection, $query);
                                $row = mysqli_fetch_array($result);
                                $totalSumEmp = $row['total_rows'];
                                 
                                 
                                ?>
                                 <div>
                                    <p class="total_no" style="font-size: 35px; font-weight: bold; color: #fe0000"><?php echo $totalSumEmp;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Employees</p>
                                  
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>
                        
                          <!------------1--------------->
            

                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #fe0000;">
                              <div class="couter_icon">
                                 <div> 
                                     <i class="fa fa-car white_color" style="font-size: 74px; font-weight: bold;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                <?php
                                 
                                define('DB_HOST','sql868.main-hosting.eu');
                                define('DB_USER','u179023685_talha');
                                define('DB_PASS','Heineken2020');
                                define('DB_NAME','u179023685_talha');
                                     
                                 /* Attempt to connect to MySQL database */
                                 
                                 $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                 $query = "SELECT DISTINCT vehicle_id FROM fatigue";
                                 $result = $link->query($query);
                                 $totalvehicles = mysqli_num_rows($result);
                                 
                                 
                                ?>
                                 <div>
                                    <p class="total_no" style="font-size: 35px; font-weight: bold; color: #fe0000"><?php echo $totalvehicles;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Vehicles</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #fe0000;">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-camera white_color" style="font-size: 74px; font-weight: bold;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <?php
                                 
                                define('DB_HOST','sql868.main-hosting.eu');
                                define('DB_USER','u179023685_talha');
                                define('DB_PASS','Heineken2020');
                                define('DB_NAME','u179023685_talha');
                                     
                                 /* Attempt to connect to MySQL database */
                                 
                                 $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                 $query = "SELECT DISTINCT camera_id FROM fatigue";
                                 $result = $link->query($query);
                                 $totalcameras = mysqli_num_rows($result);
                                 
                                 
                                
           
                                ?>
                                 <div>
                                    <p class="total_no" style="font-size: 35px; font-weight: bold; color: #fe0000"><?php echo $totalcameras;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Cameras</p>
                                 </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg">
                              <div class="couter_icon">
                                 <div> 
                                   <i class="fa fa-files-o white_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    
                                    <?php
                                    define('DB_HOST', 'sql868.main-hosting.eu');
                                    define('DB_USER', 'u179023685_talha');
                                    define('DB_PASS', 'Heineken2020');
                                    define('DB_NAME', 'u179023685_talha');
                                    
                                    /* Attempt to connect to MySQL database */
                                    $link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                    
                                    // Check connection
                                    if ($link->connect_error) {
                                        die("Connection failed: " . $link->connect_error);
                                    }
                                    
                                    $today_date = date('yyyy-mm-dd'); // Format the date as yyyy-mm-dd
                                    $query = "SELECT id FROM fatigue WHERE DATE(date_time) = '$today_date'";
                                    $result = $link->query($query);
                                    
                                    if ($result) {
                                        $todaydetections = $result->num_rows;
                                    } else {
                                        $todaydetections = 0; // Default value if query fails
                                    }
                                    
                                    $link->close();
                                    ?>
                                 
                        
                                    <p class="total_no"><?php echo $todaydetections; ?></p>
                                    <p class="head_couter" style="color:#000">Today detections</p>
                                 </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                           <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                               <div>
                                <?php 
                                define('DB_HOST', 'sql868.main-hosting.eu');
                                define('DB_USER', 'u179023685_talha');
                                define('DB_PASS', 'Heineken2020');
                                define('DB_NAME', 'u179023685_talha');
                                
                                /* Attempt to connect to MySQL database */
                                $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                
                                if (!$link) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                                
                                $query = "SELECT COUNT(*) as totalRecords FROM fatigue";
                                $result = mysqli_query($link, $query);
                                
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $totaldetections = $row['totalRecords'];
                                } else {
                                    $totaldetections = 0;
                                }
                                ?>
                                
                                <p class="total_no"><?php echo $totaldetections; ?></p>
                                <p class="head_couter" style="color: #000;">total detections</p>
                            </div>

                              </div>
                           </div>
                           <div class="col-md-6 col-lg-3">
                               
                            </div>
                            

                     
                </div>
            </div>
         <!-- model popup -->
         <!-- footer -->
                  <?php include_once('includes/footer.php');?>
    
        </div>
      </div> 
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php } ?>