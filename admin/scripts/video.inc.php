<?php
include '../config/config.php';
error_reporting(0);
if(isset($_FILES['video'])){
      $errors= array();
      $file_name = $_FILES['video']['name'];
      $file_size =$_FILES['video']['size'];
      $file_tmp =$_FILES['video']['tmp_name'];
      $file_type=$_FILES['video']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['video']['name'])));

      $expensions= array("mp4", "mkv", "avi", "mpg");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="video format is not allowed";
      }

      if($file_size < 10){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../videos/".$file_name);
          $category = $conn->query("INSERT INTO videos(name) VALUES('$file_name')");
      }else{
         print_r($errors);
      }
   }




 ?>
