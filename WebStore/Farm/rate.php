<?php
    session_start();
    if(!isset($_SESSION['store_id'])){
        header("Location:index.php");
        exit();
    }
    include "includes/dbconnection.php";
    // $company = $con->query("SELECT * FROM company")->fetch_assoc();
    include("includes/includeAllClass.php");
    ////////////////////////////////////////////////////////////////////////////////
    //////////////////////////🌺🌺🌺 OBJECTES 🌺🌺🌺/////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////

    $objStore = new repoStore;
    $objRating = new repoRating;
    $objCompany = new repoCompany;


    ////////////////////////////////////////////////////////////////////////////////
    //////////////////////////🌺🌺🌺 END OBJECTES 🌺🌺🌺/////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////
    
    $company = $objCompany->getCompany();

    $store_id = $_SESSION['store_id'];
    
    // $query = $con->query("SELECT * FROM store WHERE store_id = {$store_id}");
    $store = $objStore->getStoreById($store_id);
    if(empty($store)){
        header("location:index.php");
        exit();
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
    <link rel="shortcut icon" href="companyimages/dragon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="st.css"> -->

    <!--  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://friconix.com/cdn/friconix.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>

<body>



    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-lg navbar-light fixed-top shadow custom-navbar">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand float-end">
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

                <div class="card mb-3" style="max-width: 940px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="productimages/<?=$store['store_photo']?>" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <span class="card-title"><?=$store['store_name']?></span><br>
                                <small class="card-text">categroy : <?=$store['category_name']?></small><br>
                                <small class="card-text">Address : <?=$store['store_address']?></small><br>
                                <small class="card-text">Phone : <?=$store['store_phone']?></small><br>
                                <small class="card-text">store rate : <?=$store['store_rate']?></small><br>
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <?php
                                            $start = 1;
                                            while($start <= 5){
                                                if($store['store_rate'] < $start){
                                                    ?>
                                        <li class="list-inline-item"><i class="fa fa-star-o"
                                                style="color: #ffc000;"></i></li>
                                        <?php
                                                }else{
                                                    ?>
                                        <li class="list-inline-item"><i class="fa fa-star" style="color: #ffc000;"></i>
                                        </li>
                                        <?php
                                                }
                                                $start++;
                                            }
                                            ?>
                                    </ul>
                                </div>
                                <?php
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row g-2 justify-content-around">

                <div class="card mb-3" style="max-width: 940px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- star -->

                                <div class="container">
                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">

                                                    <div class="star">
                                                        <?php 
                                                        $rating_qer = $con->query("SELECT * FROM rating r, u_account u WHERE r.user_id = u.user_id and
                                                        store_id = {$store['store_id']} and u.user_name = '{$_SESSION['user']}'")->fetch_assoc();
                                                        $j = 5; for($i=1; $i <= 5; $i++) {
                                
                                ?>
                                                        <input type="radio" name="rating" id="star-<?php echo $i; ?>"
                                                            <?= ( (!empty($rating_qer['rate'])?$rating_qer['rate']:0) == $j)?"checked": "" ?>>

                                                        <label for="star-<?php echo $i; ?>"
                                                            data-star_r="<?php echo $j; $j--; ?>"></label>

                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="rating-al-box" id="load_status">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end star -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>


        <!-- home page end -->



    </header>




    <!-- main end -->

    <!--bootstrap JS script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end script -->


    <!-- star -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"> </script>
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <script>
    $(document).ready(function() {
        $user_name = "<?=$_SESSION['user']?>";
        $("#load_status").load("Ajax/Live_status.php", {
            user: $user_name
        });

        $(".star > label").on("click", function() {
            $rating = $(this).data("star_r");
            $.ajax({
                type: "POST",
                url: "Ajax/Rating_process.php",
                data: {
                    user: $user_name,
                    rating: $rating
                },
                success: function(data) {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    ).then((r) => {
                        if (r) {
                            window.location.href = 'rate.php'
                        }
                    })
                }
            });
        });

    });

    </script>



</body>

</html>