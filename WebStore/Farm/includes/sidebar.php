<?php 
//  session_start();
$sidebarAdmin = new repoAdmin;
$sidebarCompany = new repoCompany;

 
 ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <?php
            $aid=$_SESSION['odmsaid'];
            // $sql="SELECT * from  admins where admin_id=$aid";
            
            // $query = $con->query($sql);
            // $row = $query->fetch_assoc();

            $row = $sidebarAdmin->getAdminById($aid);
            
            $cnt=1;
            if(!empty($row))
            { 
                    ?>
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img class="img-avatar" src="profileimages/<?php  echo $row['admin_photo'];?>" alt="">

                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php  echo $row['admin_name'];?></span>
                    <?php
                            // $sql="SELECT * from  company ";
                            // $query = $con->query($sql);
                            // $row = $query->fetch_assoc();
                            
                            $row = $sidebarCompany->getCompany();

                            $cnt=1;
                            if(!empty($row))
                            {
                                    ?>
                    <span class="text-secondary text-small"><?php  echo $row['company_name'];?></span>
                    <?php }?>
                </div>
            </a>
            <?php 
            } ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Store Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="category.php">Manage Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="store.php">Manage Store</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#companymanagement" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Farm management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-bank menu-icon"></i>
            </a>
            <div class="collapse" id="companymanagement">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="farm_profile.php">Farm profile </a></li>

                    <li class="nav-item"> <a class="nav-link" href="store_rating.php"> Rating store</a></li>
                </ul>
            </div>
        </li>



    </ul>
</nav>