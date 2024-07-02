<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Smart Inspector System</title>
   
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
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css_calendar/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js_calendar/jquery-3.6.0.min.js"></script>
    <script src="./js_calendar/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script type="text/javascript">
        function getemp(val) {
        $.ajax({
        type: "POST",
        url: "get_emp.php",
        data:'deptid='+val,
        success: function(data){
        $("#emplist").html(data);
        }
        });
        }
        </script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
      
   </head>
   <body class="inner_page tables_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
          <?php include_once('includes/sidebar.php');?>
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
                              <h2>Schedule Tasks</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                     
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Schedule Tasks</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <div class="container py-5" id="page-container">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div id="calendar"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="cardt rounded-0 shadow">
                                                    <div class="card-header bg-gradient bg-primary text-light">
                                                        <h5 class="card-title">Schedule Form</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <form action="save_schedule.php" method="post" id="schedule-form">
                                                                <input type="hidden" name="id" value="">
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="control-label">Title</label>
                                                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                                                </div>
                                                                <div class="field">
                                                              <label class="label_field">Department Name</label>
                                                              <select type="text" name="deptid" id="deptid" onChange="getemp(this.value);" value="" class="form-control" required='true'>
                                                                 <option value="">Select Department</option>
                                                                  <?php 
                                              
                                                                    $host = 'sql868.main-hosting.eu';
                                                                    $username = 'u179023685_talha';
                                                                    $password = 'Heineken2020';
                                                                    $dbname = 'u179023685_talha';
                                                                    
                                                                    // Create a MySQLi connection
                                                                    $conn = new mysqli($host, $username, $password, $dbname);
                                                                    
                                                                    // Check the connection
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    
                                                                    $sql2 = "SELECT * FROM tbldepartment";
                                                                    $query2 = $conn->query($sql2);
                                                                    
                                                                    if ($query2) {
                                                                        while ($row2 = $query2->fetch_assoc()) {
                                                                            echo '<option value="' . htmlentities($row2['ID']) . '">' . htmlentities($row2['DepartmentName']) . '</option>';
                                                                        }
                                                                    } else {
                                                                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                                                                    }
                                                                    
                                                                    
                                                                    ?>
                                                              </select>
                                                           </div>
                                                           <br>
                                                           <div class="field">
                                                              <div class="field">
                                                              <label class="label_field">Employee List</label>
                                                              <select type="text" name="emplist" id="emplist" value="" class="form-control">
                                
                                                              </select>
                                                           </div>
                                                           <br>
                                                           </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="description" class="control-label">Description</label>
                                                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                                                </div>
                                                                
                                                                <div class="form-group mb-2">
                                                                    <label for="start_datetime" class="control-label">Start</label>
                                                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="end_datetime" class="control-label">End</label>
                                                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                                                </div>
                                                                                                <div class="form-group mb-2">
                                                                    <label for="interval" class="control-label">Interval (days)</label>
                                                                    <input type="number" class="form-control form-control-sm rounded-0" name="interval" id="interval" min="1" required>
                                                                </div>
                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="text-center">
                                                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Event Details Modal -->
                                    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header rounded-0">
                                                    <h5 class="modal-title">Schedule Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body rounded-0">
                                                    <div class="container-fluid">
                                                        <dl>
                                                            <dt class="text-muted">Title</dt>
                                                            <dd id="title" class="fw-bold fs-4"></dd>
                                                            <dt class="text-muted">Description</dt>
                                                            <dd id="description" class=""></dd>
                                                            <dt class="text-muted">Start</dt>
                                                            <dd id="start" class=""></dd>
                                                            <dt class="text-muted">End</dt>
                                                            <dd id="end" class=""></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                                <div class="modal-footer rounded-0">
                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                                                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Event Details Modal -->
                                    <?php 
                                        $schedules = $conn->query("SELECT * FROM `schedule_list`");
                                        $sched_res = [];
                                        foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
                                            $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
                                            $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
                                            $sched_res[$row['id']] = $row;
                                        }
                                        ?>
                                        <?php 
                                        if(isset($conn)) $conn->close();
                                    ?>

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
         <!-- model popup -->
       
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
      <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script src="./js_calendar/script.js"></script>
   </body>
</html><?php } ?>