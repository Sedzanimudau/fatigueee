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
      
      <title>Fatigue Monitoring System Traffic Violations Report</title>
      
      
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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js">s
      
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
                              <h2>Distraction Incidents</h2>
                           </div>
                        </div>
                     </div>
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <style>
                                .chart-container {
                                    background-color: white;
                                    padding: 20px;
                                    max-width: 800px; /* Adjust the maximum width as needed */
                                    margin: 0 auto; /* Center the container horizontally */
                                }
                        
                                #myChart {
                                    width: 100%; /* Make the canvas element fill the container */
                                    height: auto; /* Automatically adjust the height based on content */
                                }
                            </style>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        </head>
                        <body>
                           <h2 style="text-align: center; font-family: Arial, sans-serif; color: white; font-weight: bold;">Total Number of Distractions</h2>
    
                            <br>
                            <br>
                            <div class="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>
                        
                            <script>
                                // Fetch data from the database using PHP
                              <?php
                                define('DB_HOST', 'sql868.main-hosting.eu');
                                define('DB_USER', 'u179023685_fatigue');
                                define('DB_PASS', 'Paisa@2023');
                                define('DB_NAME', 'u179023685_fatigue');
                                
                                /* Attempt to connect to MySQL database */
                                $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                
                                // Check the connection
                                if (!$link) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                                
                                // SQL query to retrieve data (count violations)
                                $sql = "SELECT DATE_FORMAT(date_time, '%H') AS hour_of_operation, 
                                        SUM(CASE WHEN TRIM(violation) = 'Distraction' THEN 1 ELSE 0 END) AS distraction
                                        FROM fatigue 
                                        WHERE TRIM(violation) = 'Distraction' AND DATE(date_time) = CURDATE() 
                                        GROUP BY hour_of_operation";
                                
                                $result = mysqli_query($link, $sql);
                                
                                $data = array();
                                
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch data from the result set
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $hour = $row['hour_of_operation'];
                                        $total_violations = $row['distraction'];
                                
                                        $data[] = array(
                                            'x' => $hour,
                                            'y' => $total_violations
                                        );
                                    }
                                }
                                
                                // Close the database connection
                                mysqli_close($link);
                                
                                // Print the data as a JavaScript variable
                                echo "var xyValues = " . json_encode($data) . ";\n";
                                ?>
                                
                                </script>
                                    <div style="display: flex; justify-content: space-between;">
                                        <button id="backButton" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Back</button>
                                </div>
                                <script>
    
            // Create the chart using the fetched data
            new Chart("myChart", {
                type: "scatter",
                data: {
                    datasets: [{
                        pointRadius: 4,
                        pointBackgroundColor: "rgb(0,0,255)",
                        data: xyValues
                    }]
                },
                options: {
                    legend: { display: false },
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Hours of Operation (6:00 AM - 6:00 AM)',
                                fontSize: 16, // Adjust font size for the x-axis label
                                fontFamily: 'Arial, sans-serif' // Use the same font as the heading
                            },
                            ticks: {
                                min: 0,
                                max: 23,
                                stepSize: 1,
                                fontSize: 14, // Adjust font size for tick values on the x-axis
                                fontFamily: 'Arial, sans-serif' // Use the same font as the heading
                            }
                        }],
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Total Number of Distractions ',
                                fontSize: 16, // Adjust font size for the y-axis label
                                fontFamily: 'Arial, sans-serif' // Use the same font as the heading
                            },
                            ticks: {
                                min: 0,
                                max: 150,
                                stepSize: 10,
                                fontSize: 14, // Adjust font size for tick values on the y-axis
                                fontFamily: 'Arial, sans-serif' // Use the same font as the heading
                            }
                        }],
                    }
                }
            });
        </script>
        <script>
        document.getElementById("backButton").addEventListener("click", function() {
            window.location.href = "graph.php";
        });
    
        // Add click event listeners to the buttons to open new pages
        document.getElementById("distractionsButton").addEventListener("click", function() {
            // Redirect to the new page for "Fatigue incidents"
            window.location.href = "fatiguegraph.php"; // Change to the actual filename
        });
            
    </script>
    </body>
    </html>

                        </div>
                    </div>
                    <!-- Footer -->
                    <?php include_once('includes/footer.php'); ?>
                </div>
                <!-- End dashboard inner -->
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <script  src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script  src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>\
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script  src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script  src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                deferRender: true,
                scrollY:     300,
                scroller:    true   
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
     
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