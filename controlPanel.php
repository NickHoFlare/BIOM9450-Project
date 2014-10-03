<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="./style.css">
		<?php include("./functions.php"); ?>
		<title>Control Panel</title>
	</head>

	<body>
		<header>
			<img src="./assets/logo2.png"></a>
		</header>
		<h4>What would you like to do today?</h4>
		<?php
			

			// User has already been identified as legitimate in the check made in verifyLogin.
			// Just need username for further checks.
			$userName = $_POST["userName"];   //TODO: Use Session variables!

			if (isAdmin($userName)) {
				echo "<form id=\"viewSubjects\" method=\"POST\" action=\"./viewSubjects.php\">
						<table class=\"form-table\">
							<tr>
								<td><input type=\"submit\" id=\"viewSubjectsSubmit\" value=\"View Subjects\"/></td>
								<td>View data for all subjects.</td>
							</tr>
						</table>";
				echo "<form id=\"insertSubjects\" method=\"POST\" action=\"./insertSubjects.php\">
						<table class=\"form-table\">
							<tr>
								<td><input type=\"submit\" id=\"insertSubjectSubmit\" value=\"Insert Subject\"/></td>
								<td>Insert data for a new subject.</td>
							</tr>
						</table>";
			} else {
				echo "<a href=\"./viewSubjects.php\">View data for my subjects</a><br>";
				echo "<a href=\"./insertSubject.php\">Insert data for a new subject</a><br>";
			}
		?>
		
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>