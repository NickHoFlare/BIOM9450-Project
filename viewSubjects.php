<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="./style.css">
		<?php 
			include("./functions.php");
			session_start();
		?>
		<title>View Subjects</title>
	</head>

	<body>
		<header>
			<img src="./assets/logo3.png"></a>
			<hr>
			<form id="logout" method="POST" action="./index.php">
				<input type="submit" id="logoutSubmit" value="Log Out"/></td>
			</form>
		</header>
		<form id="insertSubjects" method="POST" action="./insertSubjects.php">
			<input type="submit" id="insertSubjectSubmit" value="Insert Subject"/>
	  	</form>
		<?php
			$isAdmin = $_SESSION['isAdmin'];
			$conn = openConnection();

			displaySubjects($conn, $isAdmin);
		?>
		
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>