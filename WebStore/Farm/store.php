<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");
$repoStore = new repoStore;
$repoCategory = new repoCategory;
$repoAddress = new repoAddress;

if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

$num_per_page = 5;
$previous_page = $page -1;
$next_page = $page +1;

$page_nums = $repoStore->getNumOfRows();
$limit_page = ceil($page_nums / $num_per_page);


$start_limit = ($page - 1) * $num_per_page;
$query_page = $repoStore->storeLimitFromTo($start_limit, $num_per_page);

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

                                    <!-- alert -->

                                    <?php
            if(isset($_GET['error'])){
              ?>
                                    <div class="alert alert-danger" role="alert">
                                        please fill out this form
                                    </div>
                                    <?php
            }
            ?>
                                    <!-- alert -->
                                    <form class="forms-sample" method="post" enctype="multipart/form-data"
                                        class="form-horizontal">
                                        <div class="row ">
                                            <div class="form-group col-md-6 ">
                                                <label for="exampleInputPassword1">Store Category</label>
                                                <select name="category" class="form-control">
                                                    <option value="" disabled>Select Category</option>
                                                    <?php
                        if($repoCategory->getNumOfRows() > 0)
                        {
                          foreach($repoCategory->getAllCategory() as $row)
                          {
                            ?>
                                                    <option value="<?php  echo $row['category_name'];?>">
                                                        <?php  echo $row['category_name'];?></option>
                                                    <?php 
                          }
                        } ?>


                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName1">Store Name </label>
                                                <input type="text" name="store_name" class="form-control" value=""
                                                    id="store_name" placeholder="Enter Store">
                                            </div>
                                        </div>

                                        <div class="row ">

                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName1">Store Phone </label>
                                                <input type="text" name="store_phone" class="form-control" value=""
                                                    id="store_phone" placeholder="Enter phone">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName1">Store Address </label>
                                                <select name="address" class="form-control">
                                                    <option value="">Select Address</option>
                                                    <?php
                        if($repoAddress->getNumOfRows() > 0)
                        {
                          foreach($repoAddress->getAllAddress() as $row)
                          {
                            ?>
                                                    <option value="<?php  echo $row['address_name'];?>">
                                                        <?php  echo $row['address_name'];?></option>
                                                    <?php 
                          }
                        } ?>


                                                </select>
                                            </div>


                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label class="col-sm-12 pl-0 pr-0 ">Attach Store Photo</label>
                                                <div class="col-sm-12 pl-0 pr-0">
                                                    <input type="file" name="productimage" class="file-upload-default">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control file-upload-info"
                                                            disabled placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-gradient-primary"
                                                                type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>


                                        <button type="submit" style="float: left;" name="save"
                                            class="btn btn-primary  mr-2 mb-4">Save</button>
                                    </form>
                                    <!-- cut -->
                                </div>


                            </div>
                        </div>
                        <!-- cut_2 -->

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" list="datalistOptions" name="filter"
                                                    placeholder="Type to search...">
                                                <datalist id="datalistOptions">
                                                    <?php
                                        foreach($repoStore->getAllStore() as $row){
                                    ?>
                                                    <option value="<?=$row['store_name']?>"></option>
                                                    <?php
                                        }
                                    ?>

                                                </datalist>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="submit" name="filter_btn"
                                                class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="table-responsive p-3" style="background-color: #fff;">
                            <table class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Store Photo</th>
                                        <th>Store Name</th>
                                        <th class="text-center"> Store Category</th>
                                        <th>Store Phone</th>
                                        <th>Store Address</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <?php

                                if(isset($_POST['filter_btn']) && !empty($_POST['filter']) && ($_POST['filter'] != "") ){
                                    include("includes/tables/store_table_search.php");
                                }else{
                                    include("includes/tables/store_table.php");
                                }

                                ?>

                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link <?= ($page <= 1)? "disabled" : ""?>"
                                            <?= ($page > 1)? "href=store.php?page={$previous_page}" : ""?>>Previous</a>
                                    </li>


                                    <?php
                                    for($i = 1; $i <= $limit_page ; $i++){
                                      ?>
                                    <?php if($page != $i){ ?>
                                    <li class="page-item"><a class="page-link" href="store.php?page=<?=$i?>"><?=$i?></a>
                                    </li>
                                    <?php }else{?>
                                    <li class="page-item"><a class="page-link active"><?=$i?></a></li>
                                    <?php
                                    }}?>

                                    <li class="page-item"><a
                                            class="page-link <?= ($page >= $limit_page)? "disabled" : ""?>"
                                            <?= ($page < $limit_page)? "href=store.php?page={$next_page}" : ""?>>Next</a>
                                    </li>
                                </ul>
                            </nav>

                            <div class="p-10">
                                <strong>Page <?=$page?> of <?=$limit_page?></strong>
                            </div>
                        </div>

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


    <!-- container-scroller -->
    <?php @include("includes/foot.php");?>
    <!-- End custom js for this page -->

    <script>
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).then((r) => {
                    if (r.value) {
                        document.location.href = href;
                    }
                })

            }
        })
    })
    </script>


</body>

</html>


<?php

if(isset($_POST['save']))
{
  $category=$_POST['category'];
  $store=$_POST['store_name'];
  $address = $_POST['address'];
  $phone = $_POST['store_phone'];
  
  $image=$_FILES["productimage"]["name"];


  move_uploaded_file($_FILES["productimage"]["tmp_name"],"productimages/".$_FILES["productimage"]["name"]);


  if(!empty($category) && !empty($store) && !empty($address) && !empty($phone) && !empty($image)){
    $sql="insert into store(category_name, store_name, store_phone, store_address, store_photo)values('$category', '$store', '$phone', '$address', '$image')";


  $query=$con->query($sql);

  if ($query) 
  {

    ?>
<script>
Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
).then((r) => {
    if (r) {
        window.location.href = 'store.php'
    }
})
</script>

<?php

  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
  }else{
    ?>
<script>
window.location.href = 'store.php?error';
</script>
<?php
  }
}

?>