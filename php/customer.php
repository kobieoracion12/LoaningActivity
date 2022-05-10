<?php
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$lname = $_POST["lname"];
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
	$category = $_POST["select"];
	$address = $_POST["p_address"];
	$email = $_POST["e_address"];
	$bday = $_POST["bday"];
	$telephone = $_POST["t_number"];
	$id = $_POST["id_card"];
	$mother = $_POST["mother"];
	$mcontact = $_POST["m_contact"];
	$father = $_POST["father"];
	$fcontact = $_POST["f_contact"];
	$spouse = $_POST["spouse"];
	$scontact = $_POST["s_contact"];
	$cname = $_POST["c_affiliated"];
	$caddress = $_POST["c_address"];
	$cnumber = $_POST["c_number"];
	$position = $_POST["position"];
	$status = $_POST["w_status"];
	$acc = $_POST["acc"];
	$loan_amt = $_POST["loan_amt"];
	$loan_pay = $_POST["loan_pay"];
	$loan_bal = $_POST["loan_bal"];

	$sql = "INSERT INTO customer_cred (last_name, first_name, middle_name, category, p_address, e_address, birth_date, t_number, id_card, mother, c_person, father, contact, spouse, s_number, c_affiliated, c_address, c_number, c_position, w_status) VALUES ('$lname', '$fname', '$mname', '$category', '$address', '$email', '$bday', '$telephone', '$id', '$mother', '$mcontact', '$father', '$fcontact', '$spouse', '$scontact', '$cname', '$caddress', '$cnumber', '$position', '$status')";


	if(mysqli_query($config, $sql)) {
		header("Location: ../admin/add_costumer.php?msg=success");
	}
	else {
		echo ("Error description: " . $config -> error);
		header("Location: ../admin/add_costumer.php?msg=error");
	}

	$sql1 = "INSERT INTO loan_info (customer_id, account, payment_details, remaining_balance) VALUES(LAST_INSERT_ID(),'$acc','$loan_pay','$loan_bal')";
	$result1 = mysqli_query($config, $sql1);

	if($result1) {
		header("Location: ../admin/add_costumer.php");
	}
	else {
		header("Location: ../admin/add_costumer.php?error");
	}

	$sql2 = "INSERT INTO loan_type (loan_id, loan_amount) VALUES(LAST_INSERT_ID(),'$loan_amt')";
	$result2 = mysqli_query($config, $sql2);

	if($result2) {
		header("Location: ../admin/add_costumer.php");
	}
	else {
		header("Location: ../admin/add_costumer.php?error");
	}
	mysqli_close($config);
}
?>