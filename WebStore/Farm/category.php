<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");
$category = new repoCategory;

if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

// how many lines do you need
$num_per_page = 5;
$previous_page = $page -1;
$next_page = $page +1;

$page_nums = $category->getNumOfRows();
// pagination number
$limit_page = ceil($page_nums / $num_per_page);


$start_limit = ($page - 1) * $num_per_page;
$query_page = $category->categoryLimitFromTo($start_limit, $num_per_page);

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
                                    <h5 class="modal-title" style="float: left;">Category register</h5>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <?php
                                        if(isset($_GET['error'])){
                                          ?>
                                    <div class="alert alert-danger" role="alert">
                                        please fill out this form
                                    </div>
                                    <?php
                                        }
                                        ?>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data"
                                        class="form-horizontal">
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName1">category</label>
                                                <input type="text" name="category" class="form-control" value=""
                                                    id="category" placeholder="Enter Category">
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName1">code</label>
                                                <input type="text" name="code" value="" placeholder="Enter Code"
                                                    class="form-control" id="code">
                                            </div>
                                        </div>
                                        <button type="submit" style="float: left;" name="save"
                                            class="btn btn-primary mr-2 mb-4">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                                        foreach($category->getAllCategory() as $row){
                                      ?>
                                                    <option value="<?=$row['category_name']?>"></option>
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
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Category Code</th>
                                        <th class="text-center" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>

                                <?php
                                if(isset($_POST['filter_btn']) && !empty($_POST['filter'])){
                                  include ("includes/tables/cat_table_search.php");
                                }else{
                                  include ("includes/tables/cat_table.php");
                                }
                                ?>

                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link <?= ($page <= 1)? "disabled" : ""?>"
                                            <?= ($page > 1)? "href=category.php?page={$previous_page}" : ""?>>Previous</a>
                                    </li>


                                    <?php
                                    for($i = 1; $i <= $limit_page ; $i++){
                                      ?>
                                    <?php if($page != $i){ ?>
                                    <li class="page-item"><a class="page-link"
                                            href="category.php?page=<?=$i?>"><?=$i?></a></li>
                                    <?php }else{?>
                                    <li class="page-item"><a class="page-link active"><?=$i?></a></li>
                                    <?php
                                    }}?>

                                    <li class="page-item"><a
                                            class="page-link <?= ($page >= $limit_page)? "disabled" : ""?>"
                                            <?= ($page < $limit_page)? "href=category.php?page={$next_page}" : ""?>>Next</a>
                                    </li>
                                </ul>
                            </nav>

                            <div class="p-10">
                                <strong>Page <?=$page?> of <?=$limit_page?></strong>
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
  
  $name=$_POST['category'];
  $code=$_POST['code'];

  $newCategory = new category;
  $newCategory->setCategoryName($name);
  $newCategory->setCategoryCode($code);

  if(!empty($category) && !empty($code)){
    $added = $category->addCategory($newCategory);
  if ($added) 
  {
    ?>
<script>
Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
).then((r) => {
    if (r) {
        window.location.href = 'category.php'
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
window.location.href = 'category.php?error=104';
</script>
<?php
  }
}
?>