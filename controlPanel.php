<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="./style.css">
		<?php 
			include("./functions.php");
			session_start();
		?>
		<title>Control Panel</title>
	</head>

	<body>
		<header>
			<img src="./assets/logo3.png"></a>
		</header>
		<?php
			// User has already been identified as legitimate in the check made in verifyLogin.
			// Just need username for further checks.
			$userName = $_SESSION['userName'];

			echo "<h4>Welcome $userName, What would you like to do today?</h4>";
			
			//TODO: Switch to DB version.
			if (isAdmin($userName)) {
				include("./adminControls.php");
			} else {
				include("./practControls.php");
			}
		?>
		
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>