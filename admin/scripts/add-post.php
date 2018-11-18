


<?php
include '../config/config.php';
$titile_error ="";
$content_error = "";

$title = ((isset($_POST['title']))?$_POST['title']:'');
$content = ((isset($_POST['content']))?$_POST['content']:'');

if ($_POST) {

  if (empty($title)) {
    $titile_error = 'this field is required*';
  }
  if (empty($content)) {
    $content_error = 'this field is required*';
  }

  if(isset($_FILES['image1']) && isset($_FILES['image2']) && isset($_FILES['image3'])){
   $errors= array();
   $file_name1 = $_FILES['image1']['name'];
   $file_name2 = $_FILES['image2']['name'];
   $file_name3 = $_FILES['image3']['name'];
   $file_name4 = $_FILES['image4']['name'];
   $file_size1 =$_FILES['image1']['size'];
   $file_size2 =$_FILES['image2']['size'];
   $file_size3 =$_FILES['image3']['size'];
   $file_size4 =$_FILES['image4']['size'];
   $file_tmp1 =$_FILES['image1']['tmp_name'];
   $file_tmp2 =$_FILES['image2']['tmp_name'];
   $file_tmp3 =$_FILES['image3']['tmp_name'];
   $file_tmp4 =$_FILES['image4']['tmp_name'];
   $file_type1=$_FILES['image1']['type'];
   $file_type2=$_FILES['image2']['type'];
   $file_type3=$_FILES['image3']['type'];
   $file_type4=$_FILES['image4']['type'];
   $file_ext1=strtolower(end(explode('.',$_FILES['image1']['name'])));
   $file_ext2=strtolower(end(explode('.',$_FILES['image2']['name'])));
   $file_ext3=strtolower(end(explode('.',$_FILES['image3']['name'])));
   $file_ext4=strtolower(end(explode('.',$_FILES['image4']['name'])));

   $expensions= array("jpeg","jpg","png", "mp4", "mkv", "avi");

   if(in_array($file_ext1,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }
   if(in_array($file_ext2,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }
   if(in_array($file_ext3,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }
   if(in_array($file_ext4,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size1 <10){
      $errors[]='File is too small';
   }
   if($file_size2 <10){
      $errors[]='File is too small';
   }
   if($file_size3 <10){
      $errors[]='File is too small';
   }
   if($file_size4 <10){
      $errors[]='File is too small';
   }


}

if(empty($error)==true){
   move_uploaded_file($file_tmp1,"../images/".$file_name1);
   move_uploaded_file($file_tmp2,"../images/".$file_name2);
   move_uploaded_file($file_tmp3,"../images/".$file_name3);
   move_uploaded_file($file_tmp4,"../images/".$file_name4);
  $Insertquery = $conn->query("INSERT INTO recipes(title, body, image1, image2, image3, image4)
                VALUES('$title', '$content', '$file_name1', '$file_name2', '$file_name3', '$file_name4')");

    header("Location:add-recipe.php");
    exit();
 }
}




/*
$titile_error ="";
$content_error = "";

$title = ((isset($_POST['title']))?$_POST['title']:'');
$content = ((isset($_POST['content']))?$_POST['content']:'');

 if ($_POST) {


if (empty($title)) {
  $titile_error = 'this field is required*';
}
if (empty($content)) {
  $content_error = 'this field is required*';
}

   if(isset($_FILES['image1'])){
     $errors= array();
     $file_name1 = $_FILES['image1']['name'];
     /*$file_name2 = $_FILES['image2']['name'];
     $file_name3 = $_FILES['image3']['name'];
     $file_name4 = $_FILES['image4']['name'];
     $file_size1 =$_FILES['image1']['size'];
    $file_size2 =$_FILES['image2']['size'];
    $file_size3 =$_FILES['image3']['size'];
     $file_size4 =$_FILES['image4']['size'];
     $file_tmp1 =$_FILES['image1']['tmp_name'];
     $file_tmp2 =$_FILES['image2']['tmp_name'];
     $file_tmp3 =$_FILES['image3']['tmp_name'];
     $file_tmp4 =$_FILES['image4']['tmp_name'];
     $file_type1=$_FILES['image1']['type'];
     $file_type2=$_FILES['image2']['type'];
     $file_type3=$_FILES['image3']['type'];
     $file_type4=$_FILES['image4']['type'];
     $file_ext1=strtolower(end(explode('.',$_FILES['image1']['name'])));
     $file_ext2=strtolower(end(explode('.',$_FILES['image2']['name'])));
     $file_ext3=strtolower(end(explode('.',$_FILES['image3']['name'])));
     $file_ext4=strtolower(end(explode('.',$_FILES['image4']['name'])));

     $expensions= array("jpeg","jpg","png", "mp4", "mkv", "mp3");

     if(in_array($file_ext1,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file png, mp4, mkv and mp3.";
     }

     if($file_size1  > 300000){
        $errors[]='File size is too large';
      }
  }
  if(empty($errors)==true){
     move_uploaded_file($file_tmp1,"../images/".$file_name1);
     /*move_uploaded_file($file_tmp2,"../images/".$file_name2);
     move_uploaded_file($file_tmp3,"../images/".$file_name3);
     move_uploaded_file($file_tmp4,"../images/".$file_name4);
     $recipe = $conn->query("INSERT INTO recipes(title, body, image1, image2) VALUES('$title', '$content', '$file_name1')");
       header('Location: add-recipe.php');
  }
 }
*/
