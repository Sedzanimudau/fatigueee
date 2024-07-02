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
                           <h2 style="text-align: center; font-family: Arial, sans-serif; color: white; font-weight: bold;">Total Number of Fatigue incidents</h2>
                        
                            <br>
                            <br>
                            <div class="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>
                        
                            <script>
                                // Fetch data from the database using PHP
                               <?php
                        define('DB_HOST', 'sql868.main-hosting.eu');
                        define('DB_USER', 'u179023685_talha');
                        define('DB_PASS', 'Heineken2020');
                        define('DB_NAME', 'u179023685_talha');
                        
                        /* Attempt to connect to MySQL database */
                        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                        
                        // Check the connection
                        if (!$link) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        // SQL query to retrieve data (count detections)
                        $sql = "SELECT DATE_FORMAT(date_time, '%H') AS hour_of_operation, COUNT(violation) AS total_fatigue_incidents FROM fatigue WHERE TRIM(violation) = 'Drowsiness detected' GROUP BY hour_of_operation";
                        $result = mysqli_query($link, $sql);
                        
                        $data = array();
                        
                        if (mysqli_num_rows($result) > 0) {
                            // Create an associative array to store the sum of fatigue incidents for each hour
                            $sums = array();
                        
                            // Fetch data from the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                $hour = $row['hour_of_operation'];
                                $total_fatigue_incidents = $row['total_fatigue_incidents'];
                        
                                // If an entry for this hour already exists in the sums array, add to it
                                if (array_key_exists($hour, $sums)) {
                                    $sums[$hour] += $total_fatigue_incidents;
                                } else {
                                    // Otherwise, create a new entry
                                    $sums[$hour] = $total_fatigue_incidents;
                                }
                            }
                        
                            // Convert the sums array into the final data array
                            foreach ($sums as $hour => $sum) {
                                $data[] = array(
                                    'x' => $hour,
                                    'y' => $sum
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
                                                    labelString: 'Total Number of Fatigue Incidents ',
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
                            // Event listener for the "Back" button
                            document.getElementById("backButton").addEventListener("click", function() {
                                // Redirect to the previous page "splot1.php"
                                window.location.href = "splot1.php";
                            });
                        
                            // Event listener for the "Fatigue" button
                            document.getElementById("fatigueButton").addEventListener("click", function() {
                                // Redirect to the "Fatigue incidents" page
                                window.location.href = "fatiguestats.php"; // Change to the actual filename
                            });
                        
                            // Event listener for the "Next" button
                            document.getElementById("nextButton").addEventListener("click", function() {
                                // Redirect to the "Distractions" page
                                window.location.href = "distractionsstats.php"; // Change to the actual filename
                            });
                        </script>
                        
                        </body>
                        </html>


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