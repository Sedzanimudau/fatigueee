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
      
      <title>Fatigue Monitoring System Violations Report</title>
      
      
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
                              <h2>Violations</h2>
                           </div>
                        </div>
                     </div>
                    <!-- Row -->
                    <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h5 class="title">Violations</h5></h5>
                                            <div class="md-card">
                                                <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table  id="example" class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>S.No</th>
                                             <th>Vehicle ID</th>
                                             <th>Camera ID</th>
                                             <th>Driver Surname</th>
                                             <th>Driver Name</th>
                                             <th>Violation</th>
                                             <th>Date & Time</th>
    
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
session_start();

// Database configuration
$host = 'sql868.main-hosting.eu'; // Replace with your actual host
$dbname = 'u179023685_talha'; // Replace with your actual database name
$username = 'u179023685_talha'; // Replace with your actual username
$password = 'Heineken2020'; // Replace with your actual password

try {
    // Create a PDO connection
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Additional configurations if needed (e.g., character set)
    $dbh->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}

$sql="SELECT vehicle_id,camera_id,surname,name,violation,date_time FROM demo WHERE violation IN ('smoking  detected', 'Mobile phone detected', 'Distraction')";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
                                          <tr>
                                              
                                             <td><?php echo htmlentities($cnt);?></td>
                                             <td><?php  echo htmlentities($row->vehicle_id);?></td>
                                             <td><?php  echo htmlentities($row->camera_id);?></td>
                                             <td><?php  echo htmlentities($row->surname);?></td>
                                             <td><?php  echo htmlentities($row->name);?></td>
                                             <td><?php  echo htmlentities($row->violation);?></td>
                                             <td><?php  echo htmlentities($row->date_time);?></td>
                                           
                                             
                                          </tr><?php $cnt=$cnt+1;}} ?>
                                       </tbody>
                                    </table>
                                    
                                 </div>
                                 <!--<a href="generate_pdf.php">Download PDF</a>-->
                              </div>
                              
                                            </div>
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
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