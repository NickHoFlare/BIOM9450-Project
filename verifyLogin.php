<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="./style.css">
		<script src="./formVerification.js"></script>
		<?php include("./functions.php"); ?>
		<title>Falls Management System</title>
	</head>

	<body>
		<header>
			<img src="./assets/logo3.png">
		</header>
		<?php
			//$conn = openConnection();			REMEMBER to RE-ADD this when doing database integration!

			$userName = $_POST['userName'];
			$password = $_POST['password'];

			//if (userExists($userName, $password, $conn) {
			if (userExists($userName, $password)) {
				session_start();
				$_SESSION['userName'] = $userName; // store session data
				header("Location: ./controlPanel.php"); /* Redirect browser */
			} else {
				echo "<p class=\"error-HTML\">Your entered details are incorrect. Please enter a correct username and password to log in.</p>";
				include("./login.php");
			}
		?>
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>