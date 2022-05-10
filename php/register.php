<?php
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($config, $name);

	$position = stripslashes($_REQUEST['position']);
	$position = mysqli_real_escape_string($config, $position);

	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($config, $email);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($config, $password);


	$sql = "INSERT INTO acc_cred (email, password) VALUES ('$email', '$password')";
	$result = mysqli_query($config, $sql);

	if($result) {
		header("Location: ../login.php");
	}
	else {
		header("Location: ../signup.php?error");
	}


	$sql1 = "INSERT INTO user_info (acc_no, name, position) VALUES(LAST_INSERT_ID(),'$name', '$position')";
	$result1 = mysqli_query($config, $sql1);

	if($result1) {
		header("Location: ../login.php");
	}
	else {
		header("Location: ../signup.php?error");
	}
}
?>