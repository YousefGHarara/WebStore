<?php
session_start();
include('includes/checklogin.php');
check_login();
if(!isset($_GET['id'])){
  header("location: farm_profile.php");
  exit();
}
include("includes/includeAllClass.php");
$repoCompany = new repoCompany;
$newCompany = new company;

?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Update Product Image</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                 <form class="form-horizontal" name="image" method="post" enctype="multipart/form-data">
                  <?php 

                  $imgid=$_GET['id'];
                  $result = $repoCompany->getCompany();

                  if(!empty($result))
                  {

                      ?>  
                      <div class="form-group ml-4">
                        <label for="focusedinput" class=" control-label">Current Image </label>
                        <div class="">
                          <img src="companyimages/<?=$result['company_logo'];?>" width="200">
                        </div>
                      </div>

                      <div class="form-group ml-4">
                        <label for="focusedinput" class=" control-label">New Image</label>
                        <div class="">
                          <input type="file" name="imagename" id="imagename">
                        </div>
                      </div>  
                      <?php 
                    
                  } ?>

                  <div class="row mb-4 ml-4" >
                    <div class="col-sm-8 col-sm-offset-2">
                      <button type="submit" name="submit" class="btn-primary btn">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <?php @include("includes/footer.php");?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->
</body>
</html>


<?php

$imgid= $_GET['id'];
if(isset($_POST['submit']) && !empty($_FILES['imagename']['name'])) {

  $dir = "companyimages/";
  include("includes/checkImg.php");
  $new_img = check_img("imagename", $dir);

  if($new_img !== false){
    $newCompany->setCompanyLogo($new_img);
    $updated = $repoCompany->updateCompanyLogo($newCompany);
    if($updated){
      ?>
  
  <script>
              Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
              ).then((r) => {
                if(r){
                  window.location.href ='farm_profile.php';
                }
              })
      </script>
  
      <?php
    }else{
      echo '<script>alert("Something went wrong please try a.")</script>';
    }
  }else{
    ?>
    <script>
                Swal.fire(
                  'Oops!',
                  'Something was wrong!',
                  'warning'
                )
        </script>
        <?php
  }
  }else if(isset($_POST['submit']) && empty($_FILES['imagename']['name'])){
    ?>
    <script>
                Swal.fire(
                  'Oops!',
                  'Something was wrong!',
                  'warning'
                )
        </script>
        <?php
  }


  



?>