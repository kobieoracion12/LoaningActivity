<?php
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$lname = $_POST["lname"];
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
	$bday = $_POST["bday"];
	$mnumber = $_POST["m_number"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$type = $_POST["type"];
	$age = $_POST["age"];
	$address = $_POST["address"];
	$gender = $_POST["gender"];
	$edu = $_POST["edu"];
	$civil = $_POST["civil"];

	$fullname = $fname. " " .$lname;

	$account = "INSERT INTO acc_cred (email, password) VALUES ('$email', '$password')";

	if(mysqli_query($config, $account)) {
		//header("Location: ../admin/account.php?msg=success");


		$id = mysqli_insert_id($config);

		$sql = "INSERT INTO user_info (acc_no, name, position, user_bday, user_mobile, user_age, user_address, user_gender, user_edu, user_status) VALUES (LAST_INSERT_ID(), '$fullname', '$type', '$bday', '$mnumber', '$age', '$address', '$gender', '$edu', '$civil')";

		if(mysqli_query($config, $sql)) {
			header("Location: ../admin/account.php?msg=success");
		}
		else {
			echo ("Error description: " . $config -> error);
			//header("Location: ../admin/add_costumer.php?msg=error");
		}

		
	}
	else {
		echo ("Error description: " . $config -> error);
		//header("Location: ../admin/add_costumer.php?msg=error");
	}


	
	mysqli_close($config);
}

?>