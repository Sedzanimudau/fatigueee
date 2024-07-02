<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsempid']==0)) {
  header('location:logout.php');
  } else{



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
      
   </head>
   <body class="dashboard dashboard_1">
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
               <!-- dashboard inner -->
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
        
                        <!------------1--------------->
                      <div class="col-md-6 col-lg-3">
                               <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">

                              <div class="couter_icon">
                                 <div> 
                                
                                    <i class="fa fa-car white_color" style="font-size: 74px; font-weight: bold;"></i>

                                 </div>
                              </div>
                              <div class="counter_no">
                                <?php
                                 
                                define('DB_HOST','sql868.main-hosting.eu');
                                define('DB_USER','u179023685_fatigue');
                                define('DB_PASS','Paisa@2023');
                                define('DB_NAME','u179023685_fatigue');
                                     
                                 /* Attempt to connect to MySQL database */
                                 
                                 $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                 $query = "SELECT DISTINCT vehicle_id FROM fatigue";
                                 $result = $link->query($query);
                                 $totalvehicles = mysqli_num_rows($result);
                                 
                                 
                                ?><a href="vehicle.php">

                                <div>
                                  <p class="total_no" style="font-size: 35px; font-weight: bold; color: #1f235a"><?php echo $totalvehicles;?></p>
                                  <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Vehicles</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>  
                         <!------------2--------------->
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">
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
                                 $query = "SELECT DISTINCT camera_id FROM camera";
                                 $result = $link->query($query);
                                 $totalcamera = mysqli_num_rows($result);
                                 
                                 
                                ?><a href="camera.php">
                                 <div>
                                    
                                   <p class="total_no" style="font-size: 35px; font-weight: bold; color: #1f235a"><?php echo $totalcamera;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Cameras</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>  
                        
                         <!------------3--------------->
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">

                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-calendar white_color" style="font-size: 54px; font-weight: bold;"></i>
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
                                 $query = "SELECT COUNT(violation) AS total_fatigue_num FROM fatigue WHERE TRIM(violation) ='Drowsiness detected'";
                                 $result = mysqli_query($connection, $query);
                                 $row = mysqli_fetch_array($result);
                                 $totalfatigue = $row['total_fatigue_num'];
                                ?><a href="fatigue.php">
                                 <div>
                                    
                                     <p class="total_no" style="font-size: 33px; font-weight: bold; color: #1f235a"><?php echo $totalfatigue;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Fatigue Incidents</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>  
                        
                        <!-------------4-------------->
                        <div class="col-md-6 col-lg-3">
                          <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-hashtag white_color" style="font-size: 64px; font-weight: bold;"></i>
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
                                 $query = "SELECT COUNT(violation) AS total_smoking_num FROM fatigue WHERE TRIM(violation) ='Smoking detected'";
                                 $result = mysqli_query($connection, $query);
                                 $row = mysqli_fetch_array($result);
                                 $totaldistraction = $row['total_smoking_num'];
                                ?><a href="violations.php">
                                 <div>
                                    
                                    <p class="total_no" style="font-size: 30px; font-weight: bold; color: #1f235a"><?php echo $totaldistraction;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Smoking Incidents</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-------------4-------------->
                        <div class="col-md-6 col-lg-3">
                            <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-hashtag white_color" style="font-size: 64px; font-weight: bold;"></i>
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
                                 $query = "SELECT COUNT(violation) AS total_distractions FROM fatigue WHERE TRIM(violation) ='Distraction'";
                                 $result = mysqli_query($connection, $query);
                                 $row = mysqli_fetch_array($result);
                                 $totaldistraction = $row['total_distractions'];
                                ?><a href="violations.php">
                                 <div>
                                    
                                    <p class="total_no" style="font-size: 30px; font-weight: bold; color: #1f235a"><?php echo $totaldistraction;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Distraction Incidents</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>  
                        <!-------------5-------------->
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">

                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-phone white_color" style="font-size: 60px; font-weight: bold;"></i>
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
                                 $query = "SELECT COUNT(violation) AS total_distractions FROM fatigue WHERE TRIM(violation) ='Mobile phone detected'";
                                 $result = mysqli_query($connection, $query);
                                 $row = mysqli_fetch_array($result);
                                 $totaldistraction = $row['total_distractions'];
                                ?><a href="violations.php">
                                 <div>
                                    
                                     <p class="total_no" style="font-size: 30px; font-weight: bold; color: #1f235a"><?php echo $totaldistraction;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Cellphone Usage Incidents</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div> 
                        <!-------------6-------------->
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-exclamation-triangle white_color" style="font-size: 74px; font-weight: bold;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
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
                                
                                $query = "SELECT COUNT(*) as totalRecords FROM road_sign";
                                $result = mysqli_query($link, $query);
                                
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $totaldetections = $row['totalRecords'];
                                } else {
                                    $totaldetections = 0;
                                }
                                ?><a href="traffic.php">
                                 <div>
                                    
                                    <p class="total_no" style="font-size: 35px; font-weight: bold; color: #1f235a"><?php echo $totaldetections;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Traffic Infringements</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>  
                               <!-------------7-------------->
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg" style="border-bottom: 15px solid #f5d70a;">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-tachometer white_color" style="font-size: 74px; font-weight: bold;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
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
                                
                                $query = "SELECT COUNT(speed) as totalRecords FROM road_sign";
                                $result = mysqli_query($link, $query);
                                
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $totalspeeddetections = $row['totalRecords'];
                                } else {
                                    $totalspeeddetections = 0;
                                }
                                ?><a href="traffic.php">
                                 <div>
                                    
                                    <p class="total_no" style="font-size: 35px; font-weight: bold; color: #1f235a"><?php echo $totalspeeddetections;?></p>
                                    <p class="head_couter" style="color:#000; font-size: 22px; font-weight: bold;">Total Speed Violations</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div> 
                        
                        
                        
                              </div>
                           </div>
                        </div>



                     </div>
                   
                   
                 
                  </div>
                  <!-- footer -->
                  <?php include_once('includes/footer.php');?>
               </div>
               <!-- end dashboard inner -->
            </div>
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
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html><?php } ?>