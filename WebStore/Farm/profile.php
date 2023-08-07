<?php
session_start();
include('includes/checklogin.php');
check_login();
include("includes/includeAllClass.php");
$profileAdmin = new repoAdmin;
$profilePermission = new repoPermission;
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
                                    <?php
                                    $adminid=$_SESSION['odmsaid'];
                                    // $sql="SELECT * from  admins where admin_id = $adminid";
                                    // $query = $con->query($sql);
                                    // $result = $query->fetch_assoc();
                                    $result = $profileAdmin->getAdminById($adminid);
                                    // $per_query = $con->query("SELECT * FROM permission where permission_id =" . $result['permission_id']);
                                    // $per_row = $per_query->fetch_assoc();
                                    $per_row = $profilePermission->getPermissionById($result['permission_id']);
                                    $cnt=1;
                                    if(!empty($result))
                                    {
                                            ?>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-username">Permision:</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" name="permission_type"
                                                    value="<?php  echo $per_row['permission_type'];?>" readonly="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-email">User Name:</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" name="username"
                                                    value="<?php  echo $result['admin_name'];?>" required='true'>
                                            </div>
                                        </div>
                                        <!-- cut -->


                                        <!-- cut -->
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-password">Email:</label>
                                            <div class="col-12">
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php  echo $result['admin_email'];?>" required='true'>
                                            </div>
                                        </div>



                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Profile Image</label>
                                            <div class="controls">
                                                <img src="profileimages/<?php  echo $result['admin_photo'];?>"
                                                    width="150" height="150">
                                                <a href="update_image.php?id=<?php echo $adminid;?>">Change Image</a>
                                            </div>
                                        </div>
                                        <?php 
          } ?>
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
  $adminid=$_SESSION['odmsaid'];
  $AName=$_POST['username'];
  $email=$_POST['email'];
  $sql="update admins set admin_name = '$AName', admin_email = '$email' where admin_id = $adminid";
  $query = $con->query($sql);

  if($query){
    ?>

<script>
Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
).then((r) => {
    if (r) {
        window.location.href = 'dashboard.php';
    }
})
</script>

<?php
  }else{
    echo '<script>alert("Something went wrong please try a.")</script>';
  }
}

?>