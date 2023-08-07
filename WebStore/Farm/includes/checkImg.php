<?php

function check_img($upload, $file_dir){

    $dir = $file_dir;
    $file_name = basename($_FILES[$upload]["name"]);
    $file_path = $dir . $file_name;
  
    $file_tmp = $_FILES[$upload]["tmp_name"];
    $file_size = $_FILES[$upload]["size"];

    // convert to mega bytes
    $size_mega = $file_size / 1000000;

    // check extension
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $img_size = getimagesize($file_tmp);
  

    if($img_size === false){
      echo "fail in img_size";
      return false;
    }

    if($size_mega > 10){
      echo "fail in file_size" . "<br>" . $size_mega;
      return false;
    }

    if($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg" && $file_extension != "webp"
    && $file_extension != "gif"){
      echo "fail in extension";
        return false;
    }

      $new_img_name = strval(time() . "_" . rand(1, 9999999)) . "." . $file_extension;
      if(!file_exists($file_path)){
        move_uploaded_file($file_tmp, ($dir . $new_img_name));
        echo "<h1> is Exists </h1>";
        return $new_img_name;
      }else
        return $file_name;
      
}