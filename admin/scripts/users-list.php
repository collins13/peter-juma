<?php
include '../config/config.php';
if (isset($_GET['send'])) {
  $send_id = $_GET['send'];
} else {
  echo "404 error! not found";
}
$sendsql = $conn->query("SELECT * FROM users WHERE received ='1'");

$emailCount =0;
$unsubscribeCount = 0;


 ?>
