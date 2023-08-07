<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");
$repoStore = new repoStore;
$newStore = new store;


if(!isset($_GET['editid'])){
  header("location: store.php");
  exit();
}
    $id = $_GET['editid'];
    $result = $repoStore->getStoreById($id);
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
                <h5 class="modal-title" style="float: left;">Register Store</h5>
              </div>



              <div class="col-md-12 mt-4">
                <!-- cut -->
                
              <form class="form-sample"  method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label" for="basicinput">Product Image</label>
                    <div class="controls">
                        <img style="height: 100px; width: 100px;" src="productimages/<?php echo $result['store_photo'];?>" width="150" height="100">
                        <a href="update_productimage.php?imageid=<?=$result['store_id']?>">Change Image</a>
                    </div>
                </div>  
                <div>&nbsp;</div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Category Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                        <select  name="category"  class="form-control" >
                        <option value="" disabled>Select Category</option>
                        <?php


                        $sql="SELECT * from  category";
                        $query = $con->query($sql);
                        
                        
                        if($query->num_rows > 0)
                        {
                          while($row = $query->fetch_assoc())
                          {
                            ?> 
                            <option value="<?php  echo $row['category_name'];?>" <?=($row['category_name'] == $result['category_name'])?"selected":""?> ><?php  echo $row['category_name'];?></option>
                            <?php 
                          }
                        } ?>


                      </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Store Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="store" value="<?=$result['store_name'];?>" class="form-control" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Store Phone</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="phone" value="<?=$result['store_phone'];?>" class="form-control" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Store Address</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <select  name="address"  class="form-control" >
                        <option value="" disabled>Select Address</option>
                        <?php


                        $sql="SELECT * from  address";
                        $query = $con->query($sql);
                        
                        
                        if($query->num_rows > 0)
                        {
                          while($row = $query->fetch_assoc())
                          {
                            ?> 
                            <option value="<?php  echo $row['address_name'];?>" <?= ($row['address_name'] == $result['store_address'])?"selected" :"" ?> ><?php  echo $row['address_name'];?></option>
                            <?php 
                          }
                        } ?>


                      </select>
                        </div>
                    </div>
                </div>

                
                <button type="submit" name="update" class="btn btn-primary btn-fw mr-2 mb-5" style="float: left;">Update</button>
            </form>

                <!-- cut -->
              </div>


            </div>
          </div>
          <!-- cut_2 -->

          <!-- cut2 -->


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




<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->


</body>
</html>


<?php

if(isset($_POST['update']))
{

  $category = $_POST['category'];
  $name = $_POST['store'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  if(empty($name) || empty($phone)){
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
    $newStore->setCategoryName($category);
    $newStore->setStoreName($name);
    $newStore->setStorePhone($phone);
    $newStore->setStoreAddress($address);
    $updated = $repoStore->updateStore($id, $newStore);
  
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
                  window.location.href ='store.php'
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