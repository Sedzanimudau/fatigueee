<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profile_side">
            <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
            <div class="user_info">
               <?php
                  $eid=$_SESSION['etmsempid'];
                  $sql="SELECT EmpName,EmpEmail,Designation from tblemployee where ID=:eid";
                  $query = $dbh -> prepare($sql);
                  $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                     foreach($results as $row)
                     { ?>
                        <h6><?php echo $row->EmpName;?></h6>
                        <p><span class="online_animation"></span> <?php echo $row->EmpEmail;?></p>
                  <?php
                     $cnt=$cnt+1;
                     }
                  }
               ?>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <!--<h4><?php echo $row->Designation; ?></h4> -->
      <h4 style="font-size: 30px; font-weight: bold;">General</h4>

          <style>
          /* Style for the text */
          .white_color {
            color: #000; /* Text color */
            font-weight: bold; /* Make the text bold */
            font-size: 17px; /* Set the font size to 15px */
          }
        
          /* Style for the icons */
          .white_color i {
            color: #1f235a; /* Icon color */
            font-size: 17px; /* Set the font size to 15px for icons */
          }
        </style>
        
        <ul class="list-unstyled components">
          <li><a href="dashboard.php"><i class="fa fa-dashboard white_color"></i> <span class="white_color">Dashboard</span></a></li>
          <li><a href="violations.php"><i class="fa fa-times white_color"></i> <span class="white_color">Distractions</span></a></li>
          <li><a href="traffic.php"><i class="fa fa-exclamation-triangle white_color"></i> <span class="white_color">Traffic Infringement</span></a></li>
          <li><a href="fatigue.php"><i class="fa fa-exclamation-circle white_color"></i> <span class="white_color">Fatigue</span></a></li>
          <li><a href="graph.php" ><i class="fa fa-database white_color"></i> <span class="white_color">Statistics</span></a></li>
        </ul>

   </div>
</nav>
