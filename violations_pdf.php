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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js">
      
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
           
           
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                    
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
                                             <th>Speed Limit</th>
                                             <th>Vehicle Speed</th>
                                             <th>Date & Time</th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
session_start();

$sql="SELECT * FROM fatigue";
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
                                             <td><?php  echo htmlentities($row->speed_limit);?></td>
                                             <td><?php  echo htmlentities($row->vehicle_speed);?></td>
                                             <td><?php  echo htmlentities($row->date_time);?></td>
                                           
                                             
                                          </tr><?php $cnt=$cnt+1;}} ?>
                                       </tbody>
                                    </table>
                                    
                                 </div>
                                 
                              </div>
                              
                                            </div>
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                   
                </div>
                <!-- End dashboard inner -->
                  </div>
                   
                  </div>
                  <!-- footer -->
                  <
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
      <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
      <script>
      new DataTable('#example');
      </script>
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