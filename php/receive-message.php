<?php

include_once("database.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$uid = $_SESSION['uid'];
	$message = $_POST["message-box"];

	$send = "INSERT INTO chat_table (sender_id, sent_message) VALUES ('$uid','$message')";

	if(mysqli_query($config, $send)) {
		header("Location: ../branch_manager/chat.php?msg=sent");
	}
	else {
		//echo ("Error description: " . $config -> error);
		header("Location: ../branch_manager/chat.php?msg=error");
	}
	mysqli_close($config);
}



?>