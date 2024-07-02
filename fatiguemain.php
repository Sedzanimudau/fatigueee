<?php
session_start();
error_reporting(0);
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
                                /* Add CSS style to center the canvas */
                                #myChart {
                                    display: block;
                                    margin: 0 auto;
                                }
                            </style>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        </head>
                        <body>
                            <div style="background-color: white; padding: 20px;">
                                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
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
                                
                                // SQL query to count violations for each day of the week
                                $sql = "SELECT DAYOFWEEK(date_time) AS day_of_week, COUNT(*) AS violation_count FROM fatigue GROUP BY day_of_week";
                                $result = mysqli_query($link, $sql);
                                
                                $data = array_fill(0, 7, 0); // Initialize an array with 7 days, initially set to 0 violations
                                
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        // Fetch data from the result set and populate the data array
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $dayOfWeek = $row['day_of_week'];
                                            $data[$dayOfWeek - 1] = $row['violation_count']; // Adjust for 1-based indexing
                                        }
                                    }
                                } else {
                                    echo "Error in SQL query: " . mysqli_error($link);
                                }
                                
                                // Close the database connection
                                mysqli_close($link);
                                
                                // Print the data as a JavaScript variable
                                echo "var violationCounts = " . json_encode($data) . ";\n";
                                ?>
                            </script>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <button id="fatigueButton" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Fatigue incidents</button>
                                <button id="distractionsButton" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Distractions</button>
                                <button id="trafficButton" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Traffic Infringements</button>
                            </div>
                        
                            <script>
                                // Create the chart using the fetched data after the DOM is ready
                                document.addEventListener("DOMContentLoaded", function() {
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    
                                    new Chart(ctx, {
                                        type: "bar", // Use a bar chart for days of the week
                                        data: {
                                            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                                            datasets: [{
                                                label: 'Total Number of Violations',
                                                data: violationCounts,
                                                backgroundColor: 'rgba(0, 0, 255, 0.6)',
                                                borderWidth: 2, // Set the border width of the bars to make them bold
                                                borderColor: 'rgba(0, 0, 255, 1)', // Set the border color of the bars
                                            }]
                                        },
                                        options: {
                                            title: { // Add title to the chart
                                                display: true,
                                                text: 'Total Number of Violation Counts', // Specify the title text
                                                fontSize: 20, // Set font size for the title
                                                fontColor: 'black', // Set font color for the title
                                                fontStyle: 'bold' // Make the title bold
                                            },
                                            scales: {
                                                yAxes: [{
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: 'Total Number of Violations',
                                                        fontSize: 15, 
                                                        fontColor: 'black', 
                                                        fontStyle: 'bold' 
                                                    },
                                                    ticks: {
                                                        beginAtZero: true,
                                                        max: Math.max(...violationCounts) + 10, 
                                                        fontSize: 15, 
                                                        fontColor: 'black', 
                                                        fontStyle: 'bold' 
                                                    }
                                                }],
                                                xAxes: [{
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: 'Days of the Week',
                                                        fontSize: 15, 
                                                        fontColor: 'black', 
                                                        fontStyle: 'bold' 
                                                    },
                                                    ticks: {
                                                        fontSize: 15,
                                                        fontColor: 'black', 
                                                        fontStyle: 'bold'
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                });
                        
                                // Add click event listeners to the buttons to open new pages
                                document.getElementById("fatigueButton").addEventListener("click", function() {
                                    // Redirect to the new page for "Fatigue incidents"
                                    window.location.href = "fatiguestats.php"; // Change to the actual filename
                                });
                        
                                document.getElementById("distractionsButton").addEventListener("click", function() {
                                    // Redirect to the new page for "Distractions"
                                    window.location.href = "distractionsstats.php"; // Change to the actual filename
                                });
                        
                                document.getElementById("trafficButton").addEventListener("click", function() {
                                    // Redirect to the new page for "Traffic Infringements"
                                    window.location.href = "trafficinfringements.php"; // Change to the actual filename
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