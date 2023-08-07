<?php
session_start();
include("includes/includeAllClass.php");
include "includes/check_user_isExists.php";

    ////////////////////////////////////////////////////////////////////////////////
    //////////////////////////🌺🌺🌺 OBJECTES 🌺🌺🌺/////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////
    $objCompany = new repoCompany;
    $objStore = new repoStore;
    $objCategory = new repoCategory;
    $company = $objCompany->getCompany();


    if(isset($_POST['btn_store_rate'])){
        $_SESSION['store_id'] = $_POST['swap'];
        header("location: rate.php");
        exit();
    }

    if (isset($_POST['filter_btn']) && !empty($_POST['filter'])){
        $id = $objStore->getIdByStoreName($_POST['filter']);
        if($id > 0){
            $_SESSION['store_id'] = $id;
            header("location: rate.php");
            exit();
        }
    }






    $cat = (isset($_GET['cat'])? $_GET['cat'] : 'all');


if(isset($_GET['page'])){
    $page = $_GET['page'];
    }else{
    $page = 1;
    }
    
    $num_per_page = 2;
    $previous_page = $page -1;
    $next_page = $page +1;

    if($cat != 'all'){                  
        $sql_page = $objStore->getStoreByCategoryName($cat);                   
    }else{
        $sql_page = $objStore->getAllStore();
    }

    $page_nums = count($sql_page);
    $limit_page = ceil($page_nums / $num_per_page);
    
    $start_limit = ($page - 1) * $num_per_page;

    if($cat != 'all'){
        // $query_page = $con->query("SELECT * FROM store where category_name = '{$cat}' limit $start_limit, $num_per_page");
        $query_page = $objStore->storeLimitFromToByCategoryName($cat, $start_limit, $num_per_page);
    }else{
        // $query_page = $con->query("SELECT * FROM store limit $start_limit, $num_per_page");
        $query_page = $objStore->storeLimitFromTo($start_limit, $num_per_page);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!---main css---->
    <link rel="stylesheet" href="assets/css/indexstyle.css">
    <!----google font---->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!----font awesome---->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <!-- outer -->
    <title>ClashWar</title>
    <link rel="shortcut icon" href="companyimages/dragon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="st.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>

    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-lg navbar-light fixed-top shadow custom-navbar">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand float-end">
                        <!-- <img src="productimages/lenovo-logo.png" alt="" class="img-responsive custom-logo"> -->
                        <spna class="custom-highlight"><?=$company['company_name']?></spna>
                    </a>
                    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedConetnt"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto custom-ul">

                        <li class="nav-item custom-li">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- home page start -->
        <section id="cover" class="container">

            <div class="row g-2 justify-content-around">

                <div class="col-md-6 d-flex justify-content-center align-items-center order-lg-2">
                    <div class="p-3">
                        <img src="companyimages/<?=$company['company_logo']?>" alt=""
                            class="mx-auto d-block w-100 img-fluid">
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center align-items-center order-lg-2">
                    <div class="p-3">
                        <h1 class="custom-hightlight"><?=strtoupper($company['company_name'])?></h1>
                        <h1>Never Stop Running</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora earum unde repellendus eius
                            quia quos?</p>

                    </div>
                </div>

            </div>

        </section>
        <!-- home page end -->



    </header>



    <!-- main start -->
    <main class="container">

    

        <section id="product" class="mt-5">

        
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
                                        foreach($objStore->getAllStore() as $row){
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

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">

                    <div class="card h-80 shadow custom-card">
                        <div class="card-body">
                            <h4 class="">category</h4>
                            <a href="index.php?cat=all" class="">All &copy; <?=$objStore->getNumOfRows()?> </a>
                            <hr>
                            <?php
                        foreach($objCategory->getAllCategory() as $rows){
                            $total = 0;
                            $query2 = $objStore->getStoreByCategoryName($rows['category_name']);
                            if(!empty($query2)){
                                $total = count($query2);
                            }
                        ?>
                            <a href="index.php?cat=<?=$rows['category_name']?>"><?=$rows['category_name'] ?>
                                &copy; <?=$total?> </a>
                            <hr>
                            <?php
                        }
                    ?>

                        </div>
                    </div>
                </div>



                <?php
                
                
                foreach($query_page as $result){

                    include ("cards.php");
                    ?>
                    

                <?php

                }
            ?>



</div>
<nav aria-label="Page navigation example">
    <ul class="pagination">
    <li class="page-item"><a class="page-link <?= ($page <= 1)? "disabled" : ""?>" 
    <?= ($page > 1)? "href=index.php?cat={$cat}&page={$previous_page}" : ""?>  >Previous</a></li>

    
    <?php
    for($i = 1; $i <= $limit_page ; $i++){
        ?>
        <?php if($page != $i){ ?>
    <li class="page-item"><a class="page-link" href="index.php?cat=<?=$cat?>&page=<?=$i?>"><?=$i?></a></li>
    <?php }else{?>
    <li class="page-item"><a class="page-link active"><?=$i?></a></li>
    <?php
    }}?>

    <li class="page-item"><a class="page-link <?= ($page >= $limit_page)? "disabled" : ""?>"
    <?= ($page < $limit_page)? "href=index.php?cat={$cat}&page={$next_page}" : ""?>>Next</a></li>
    </ul>
</nav>

<div class="p-10">
    <strong>Page <?=$page?> of <?=$limit_page?></strong>
</div>
</section>


    </main>
    <!-- main end -->

    <!--bootstrap JS script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="includes/foot.php"></script>
    <!-- end script -->
</body>

</html>