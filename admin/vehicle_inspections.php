<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsaid']==0)) {
  header('location:logout.php');
  } else{

// Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblasset where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-ast.php'</script>";     


}

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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js">
      
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
                              <h2>Vehicle Inspections</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <!-- Row -->
                    <div class="row">
                            <div class="col-md-13">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h5 class="title">Vehicle inspections</h5>
                                            <div class="md-card">
                                                <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table  id="example" class="table table-bordered">
                                       <thead>
                                          <tr>
                                            
                                             <th>S.No</th>
                                             <th>Asset Name</th>
                                             <th>Asset ID</th>
                                             <th>Name</th>
                                             <th>Surname</th>
                                             <th>Emp Number</th>
                                             <th>Reg No</th>
                                             <th>Temp</th>
                                             <th>Tires</th>
                                             <th>Lights</th>
                                             <th>Mirrors</th>
                                             <th>Horn</th>
                                             <th>Windshield & Wiper</th>
                                             <th>Fluids</th>
                                             <th>safety</th>
                                             <th>Engine</th>
                                             <th>notes</th>
                                             <th>Date</th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
session_start();
$empid = $_SESSION['empid']; 
$sql="SELECT * FROM tblvehicleinspect";
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
                                             <td><?php  echo htmlentities($row-> asset_name);?></td>
                                             <td><?php  echo htmlentities($row->asset_id);?></td>
                                             <td><?php  echo htmlentities($row->name);?></td>
                                             <td><?php  echo htmlentities($row->surname);?></td>
                                             <td><?php  echo htmlentities($row->emp_number);?></td>
                                             <td><?php  echo htmlentities($row->reg_no);?></td>
                                             <td><?php  echo htmlentities($row->temperature);?></td>
                                             <td><?php  echo htmlentities($row->tires);?></td>
                                             <td><?php  echo htmlentities($row->lights);?></td>
                                             <td><?php  echo htmlentities($row->mirrors);?></td>
                                             <td><?php  echo htmlentities($row->horn);?></td>
                                             <td><?php  echo htmlentities($row->windshield_wiper);?></td>
                                             <td><?php  echo htmlentities($row->fluids);?></td>
                                             <td><?php  echo htmlentities($row->safety);?></td>
                                             <td><?php  echo htmlentities($row->engine);?></td>
                                             <td><?php  echo htmlentities($row->notes);?></td>
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
         <!-- model popup -->
       
      </div>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
      <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
      <script>
      new DataTable('#example');
      </script>
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php } ?>