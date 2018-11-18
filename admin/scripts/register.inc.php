
<?php
include '../config/config.php';
 if(isset($_POST['submit'])){
	$error = array();

	//username
	if(empty($_POST['firstname'])){
		$error[] = 'Please enter a firstName. ';
	}else if( ctype_alnum($_POST['firstname']) ){
		$firstname = $_POST['firstname'];
	}else{
		$error[] = 'Firstname must consist of letters and numbers only. ';
	}
  if(empty($_POST['lastname'])){
    $error[] = 'Please enter a lastName. ';
  }else if( ctype_alnum($_POST['lastname']) ){
    $lastname = $_POST['lastname'];
  }else{
    $error[] = 'lastname must consist of letters and numbers only. ';
  }

	//email
	if(empty($_POST['email'])){
		$error[] = 'Please enter your email. ';
	}else if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
	}else{
		$error[] = 'Your e-mail address is invalid. ';
	}

	//password
	if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysqli_real_escape_string($conn, $_POST['password']);
	}

  if(empty($_POST['c_password'])){
    $error[] = 'Please conferm a password. ';
  }else{
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
  }

	if(empty($error)){
		//$result = $conn->query("SELECT * FROM admin WHERE email='$email' OR firstname='$firstname' ");
		//$result1 = mysqli_query($mysql_connect, "SELECT * FROM tempusers WHERE email='$email' OR username='$username' ") or die(mysql_error());
			$result2 = $conn->query("INSERT INTO admin (f_name,last_name,email,password,conferm_password) VALUES ('$firstname','$lastname','$email','$password','$c_password') ");
      header("Location:login.php");
      exit();
	}else{
		$error_message = '<span class="error">';
		foreach ($error as $key => $values) {
			$error_message.= "$values";
		}
		$error_message.= "</span><br/><br/>";
	}
}

?>
