<?php
include '../config/config.php';
session_start();
if(isset($_POST['submit'])){
	$error = array();

	//username
	if(empty($_POST['submit'])){
		$error[] = 'Please enter a email. ';
	}else{
	$email = $_POST['email'];
	}

	//password
	if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysqli_real_escape_string($conn, $_POST['password']);
	}

	if(empty($error)){
		$result = $conn->query("SELECT * FROM admin WHERE email='$email' AND password='$password' ");
		if(mysqli_num_rows($result)==1){
			while($row = mysqli_fetch_assoc($result)){
				$_SESSION['f_name'] = $row['f_name'];
				header('Location:index.php');
			}
		}else{
			$error_message = '<span class="error">Username or password is incorrect.</span><br/><br/>';
		}
	}else{
		$error_message = '<span class="error">';
		foreach ($error as $key => $values) {
			$error_message.= "$values";
		}
		$error_message.= "</span><br/><br/>";
	}
}

?>
