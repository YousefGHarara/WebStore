<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");

if(!isset($_GET['editid'])){
  header("location: category.php");
}

$category = new repoCategory;

$id = $_GET['editid'];
$result = $category->getCategoryById($id);


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
                <h5 class="modal-title" style="float: left;">Edit Category</h5>
              </div>
              <div class="col-md-12 mt-4">
                <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row ">
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">category</label>
                      <input type="text" name="category" class="form-control" value="<?=$result['category_name']?>" id="category" placeholder="Enter Category" >
                    </div>
                  </div>
                  <div class="row ">
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">code</label>
                      <input type="text" name="code" value="<?=$result['category_code']?>" placeholder="Enter Code" class="form-control" id="code">
                    </div>
                  </div>
                  <button type="submit" style="float: left;" name="edit" class="btn btn-primary mr-2 mb-4">Update</button>
                </form>
              </div>
            </div>
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

if(isset($_POST['edit']))
{
  
  $name=$_POST['category'];
  $code=$_POST['code'];
  $newCategory = new category;

  if(empty($name) || empty($code)){
    ?>
    <script>
            Swal.fire(
              'Oops!',
              'Something was wrong!',
              'warning'
            )
    </script>
    

    <?php
  }else{
    $newCategory->setCategoryName($name);
    $newCategory->setCategoryCode($code);
  
    $updated = $category->updateCategory($id, $newCategory);
  
    if ($updated) 
    {
      ?>
      <script>
              Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
              ).then((r) => {
                if(r){
                  window.location.href ='category.php'
                }
              })
      </script>
      
  
      <?php
    }
    else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }


}


?>