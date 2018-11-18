<?php
$email = ((isset($_POST['email']))?$_POST['email']:'');

if ($_POST) {
  if (empty($email)) {
    echo "<script>alert('email cannot be empty')</script>";
  }
  if (!empty($email)) {
    $emailInsert = $conn->query("INSERT INTO users(email) VALUES('$email')");
    if ($emailInsert === true) {
    echo "data insert success";
    }
  }
}

 ?>
