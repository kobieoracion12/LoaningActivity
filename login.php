<?php
session_start();

if (isset($_SESSION["position"]) && $_SESSION["position"] == 'Admin') {
    header("location: admin/dashboard.php");
    exit;
}
elseif (isset($_SESSION["position"]) && $_SESSION["position"] == 'Branch Manager') {
    header("location: branch_manager/dashboard.php");
    exit;
}
elseif (isset($_SESSION["position"]) && $_SESSION["position"] == 'Staff') {
    header("location: staff/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1>LOGIN FORM</h1>
				<form action="php/auth.php" method="post">
					
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input type="submit" value="LOGIN">
				</form>
				<p>Don't have an Account? <a href="signup.php"> SIGN UP!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<!-- <div class="colorlibcopy-agile">
			<p>© WEB AND DATABASE PROJECT</p>
		</div> -->
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>