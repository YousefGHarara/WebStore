<?php
include("includes/includeAllClass.php");
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $repoStore = new repoStore;
    $repoStore->removeStore($id);
}

header("Location:store.php");
exit();