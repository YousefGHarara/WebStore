<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");
if (strlen($_SESSION['odmsaid']==0)) 
{
  header('location:logout.php');
} else{

  $repoAdmin = new repoAdmin;

// $pid=intval($_GET['id']);

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
              <div class="col-12">
                <div class="card">
                   <div class="card-body">


                    <br/>
                    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
                      <?php

                      $adminid=$_SESSION['odmsaid'];

                      $result = $repoAdmin->getAdminById($adminid);

                      if(!empty($result))
                      {
                      ?>
                      <div class="control-group">
                        <label class="control-label" for="basicinput">Names</label>
                        <div  class="col-6">
                          <input type="text"   class="form-control" name="productName"  readonly value="<?php  echo $result['admin_name'];?>" class="span6 tip" required>
                        </div>
                      </div>
                      <br>
                      <div class="control-group"> 
                        <label class="control-label" for="basicinput">Current Image</label>
                        <div class="controls">
                        <img src="profileimages/<?php  echo $result['admin_photo'];?>" width="170" height="150"> 
                        </div>
                      </div>
                      <br>
                       <div class="form-group col-md-6">
                        <label>New Image</label>
                        <input type="file" name="profile_img" id="profile_img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <?php } ?>
                      <br>
                      <div class="form-group row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-gradient-primary " name="submit">
                            <i class="fa fa-plus "></i> Update
                          </button>
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
  </body>
</html>

<?php

if(isset($_POST['submit']) && !empty($_FILES['profile_img']['name']))
{
  $adminid=$_SESSION['odmsaid'];
  $productname=$_POST['productName'];

  // $dir = "profileimages/";
  // $file_name = basename($_FILES["profile_img"]["name"]);
  // $file_path = $dir . $file_name;

  // $file_tmp = $_FILES["profile_img"]["tmp_name"];
  // $file_size = $_FILES["profile_img"]["size"];
  // $upload_ok = 1;
  // check extension
  // $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
  // $img_size = getimagesize($file_tmp);

  // if(file_exists($file_tmp)){
  //   $upload_ok = 0;
  //   echo "file exists";
  // }
  // if($img_size === false){
  //   $upload_ok = 0; 
  //   echo "img_size is false";
  // }
  // if($file_size > 500000){
  //   $upload_ok = 0;
  //   echo "file_size grater than 500 000";
  // }
  // if($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg" && $file_extension != "webp"
  // && $file_extension != "gif"){
  //     $upload_ok = 0;
  //     echo "file_extension";
  // }
  // if($upload_ok == 1){

  //   $new_img_name = strval(time() . "_" . rand(1, 9999999)) . "." . $file_extension;
  //   move_uploaded_file($file_tmp, ($dir . $new_img_name));

  include("includes/checkImg.php");
  $check_img = check_img("profile_img", "profileimages/");

  if($check_img !== false){
    $query = $repoAdmin->updateImageAdmin($adminid, $check_img);
        if($query){
      ?>
  
  <script>
              Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
              ).then((r) => {
                if(r){
                  window.location.href ='profile.php';
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
                  'NO Selected File',
                  'warning'
                )
        </script>
      <?php
  }


}else if(isset($_POST['submit']) && empty($_FILES["profile_img"]['name'])) {
  ?>
  <script>
            Swal.fire(
              'Oops!',
              'NO Selected File',
              'warning'
            )
    </script>
  <?php
}
}

?>