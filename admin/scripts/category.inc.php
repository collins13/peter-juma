<?php
include '../config/config.php';
$name_error ='';
$name = ((isset($_POST['name']))?$_POST['name']:'');

if ($_POST) {
if (empty($name)) {
$name_error = 'this field is required*';
 }
 if (empty($name_error)) {
   $category = $conn->query("INSERT INTO categories(name) VALUES('$name')");
   if ($category == true) {
    echo "<script>alert('category added success');</script>";
   }
   header('Location: category.php');
 }
}




 ?>
