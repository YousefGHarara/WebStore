 <?php 
//  session_start();
 ?>
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <?php
    $headerCompany = new repoCompany;
    $headerAdmin = new repoAdmin;
    $companyname=$_SESSION['companyname'];
    $header_row = $headerCompany->getCompany();
    $cnt=1;


    if(!empty($header_row))
    {
      ?>
        <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar" style="height: 60px; width: 60px;" src="companyimages/<?php  echo $header_row['company_logo'];?>" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img style="height: 30px; width: 30px;" src="companyimages/<?php  echo $header_row['company_logo']?>" alt="logo" /></a>
      <?php
    }
    ?>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <?php
        $aid=$_SESSION['odmsaid'];
        $row_admin = $headerAdmin->getAdminById($aid);
        $cnt=1;
        if(!empty($row_admin))
        {
          
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
              <img class="img-avatar" src="profileimages/<?php  echo $row_admin['admin_photo'];?>" alt="">
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php  echo $row_admin['admin_name'];?></p>
              </div>
            </a>
            <?php


        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
            <div class="dropdown-divider"></div>
              <form action="logout.php" method="post">
                <input type="hidden" name="logout">
                <button class="dropdown-item to-logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </button>
              </form>

            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
         
          <li class="nav-item nav-logout d-none d-lg-block">
            <form action="logout.php" method="post">
              <input type="hidden" name="logout">
              <button class="nav-link" style="background-color: transparent; border: none;">
              <i class="mdi mdi-power"></i>
            </button>
            </form>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>