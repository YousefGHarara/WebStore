<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");
$repoStore = new repoStore;

$num_per_page = 5;


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
                            <table class="table align-items-center table-hover" id="">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Store Photo</th>
                                        <th class="text-center">Store Name</th>
                                        <th class="text-center" class="text-center">Total Rating</th>
                                        <th class="text-center">Number of Ratings</th>
                                        <th class="text-center">Store Rating</th>
                                    </tr>
                                </thead>

                                
                                <?php
                                if(isset($_POST['filter_btn']) && !empty($_POST['filter'])){
                                    include ("includes/tables/rate_table_search.php");
                                }else{
                                    include ("includes/tables/rate_table.php");
                                }
                                ?>

                            </table>
                            <nav aria-label="Page navigation example">
                                  <ul class="pagination">
                                    <li class="page-item"><a class="page-link <?= ($page <= 1)? "disabled" : ""?>" 
                                    <?= ($page > 1)? "href=store_rating.php?page={$previous_page}" : ""?>  >Previous</a></li>

                                    
                                    <?php
                                    for($i = 1; $i <= $limit_page ; $i++){
                                      ?>
                                      <?php if($page != $i){ ?>
                                    <li class="page-item"><a class="page-link" href="store_rating.php?page=<?=$i?>"><?=$i?></a></li>
                                    <?php }else{?>
                                    <li class="page-item"><a class="page-link active"><?=$i?></a></li>
                                    <?php
                                    }}?>

                                    <li class="page-item"><a class="page-link <?= ($page >= $limit_page)? "disabled" : ""?>"
                                    <?= ($page < $limit_page)? "href=store_rating.php?page={$next_page}" : ""?>>Next</a></li>
                                  </ul>
                                </nav>

                                <div class="p-10">
                                  <strong>Page <?=$page?> of <?=$limit_page?></strong>
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