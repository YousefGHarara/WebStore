<?php
session_start();
include('includes/checklogin.php');
check_login();
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
                        <div class="col-12">
                            <div class="card">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="float: left;">Company details</h5>
                                </div>

                                <div class="card-body">
                                    <?php
                                    $cnt=1;
                                    $result = $repoCompany->getCompany();
                                    if($repoCompany->getNumOfRows() > 0)
                                    {
                                            ?>
                                    <form method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Logo</label>
                                            <div class="controls">
                                                <img style="height: 100px; width: 100px;"
                                                    src="companyimages/<?php  echo $result['company_logo'];?>"
                                                    width="150" height="100">
                                                <?php 
                                                        if($_SESSION['permission'] == 1){
                                                            ?>
                                                <a href="update_logo.php?id=<?php echo $result['company_id'];?>">Change
                                                    logo</a>
                                                <?php
                                                        } ?>
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="row">
                                            <div class="form-group row col-md-6">
                                                <label class="col-12" for="register1-username">Company name:</label>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="companyname"
                                                        value="<?php  echo $result['company_name'];?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">


                                            <div class="form-group row col-md-6">
                                                <label class="col-12" for="register1-email">Company email:</label>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" name="companyemail"
                                                        value="<?php  echo $result['company_email'];?>" >
                                                </div>
                                            </div>
                                        </div>



                                        <?php 
                                        }
                                        ?>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2"
                                            style="float: left;">update</button>
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


if(isset($_POST['submit']))
{
    $name = $_POST['companyname'];
    $email = $_POST['companyemail'];


    if(empty($name) || empty($email)){
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
        $newCompany->setCompanyName($name);
        $newCompany->setCompanyEmail($email);
    
        $updated = $repoCompany->updateCompany($newCompany);
        if ($updated){
            
            ?>
<script>
Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
).then((r) => {
    if (r) {
        window.location.href = 'dashboard.php'
    }
})
</script>


<?php
    
        }else{
            echo '<script>alert("update failed! try again later")</script>';
        }
      }


}