 <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <?php
$aid=$_SESSION['etmsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                           <h6><?php  echo $row->AdminName;?></h6>
                           <p><span class="online_animation"></span> <?php  echo $row->Email;?></p><?php $cnt=$cnt+1;}} ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                    
                     <li><a href="dashboard.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                      <li class="active">
                        <a href="#dashboard1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-files-o orange_color"></i> <span>Departments</span></a>
                        <ul class="collapse list-unstyled" id="dashboard1">
                           <li>
                              <a href="add-dept.php">> <span>Add Departments</span></a>
                           </li>
                           <li>
                              <a href="manage-dept.php">> <span>Manage Departments</span></a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users purple_color"></i> <span>Employees</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="add-employee.php">> <span>Add Employees</span></a></li>
                           <li><a href="manage-employee.php">> <span>Manage Employees</span></a></li>
                           
                        </ul>
                     </li>
                    
                    
                  </ul>
                  
               </div>
            </nav>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var dropdownToggle = document.querySelector(".dropdown-toggle");
    var dropdownMenu = document.getElementById("sidebar-dropdown");

    dropdownToggle.addEventListener("click", function (e) {
      e.preventDefault();
      dropdownMenu.classList.toggle("show");
      var expanded = dropdownMenu.classList.contains("show");
      dropdownToggle.setAttribute("aria-expanded", expanded);
    });

    document.addEventListener("click", function (e) {
      if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.remove("show");
        dropdownToggle.setAttribute("aria-expanded", "false");
      }
    });
  });
</script>
