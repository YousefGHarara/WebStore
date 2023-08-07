<?php
include("includes/includeAllClass.php");
$category = new repoCategory;
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $category->removeCategory($id);
}
header("Location:category.php");
exit();