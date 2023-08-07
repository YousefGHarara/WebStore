<?php
session_start();
include("includes/includeAllClass.php");
$admin = new repoAdmin;
$company = new repoCompany;
if(isset($_SESSION['odmsaid'])){
    header("location: dashboard.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <d class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" align="center">
                                <img class="img-avatar mb-3" src="companyimages/<?=$company->getCompany()['company_logo']?>"
                                    alt="">
                            </div>
                            <form role="form" id="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg" name="username"
                                        id="exampleInputEmail1" placeholder="Username" >
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" >
                                </div>
                                <div class="mt-3">
                                    <button name="login"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php @include("includes/foot.php");?>
    <!-- endinject -->
</body>

</html>


<?php

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(empty($username) || empty($password)){
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
        $row = $admin->checkIsAdmin($username, $password);

        if(!empty($row))
        {
    
            $_SESSION['odmsaid']=$row['admin_id'];
            $_SESSION['names']=$row['admin_name'];
            $_SESSION['permission']=$row['permission_id'];
            $_SESSION['companyname'] = $company->getCompany()['compnay_name'];
            echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    } else{
        ?>
    
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!'
    })
    </script>
    <?php
    
    }
      }


}

?>