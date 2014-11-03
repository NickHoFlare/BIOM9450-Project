<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../style.css">
		<script src="../formVerification.js"></script>
		<?php 
			include("../functions.php"); 
			session_start();
		?>
		<title>Falls Management System</title>
	</head>

	<body>
		<header>
			<img src="../assets/logo3.png">
			<hr>
			<form id="logout" method="POST" action="../index.php">
				<input type="submit" id="logoutSubmit" value="Log Out"/></td>
			</form>
            <form id="backToControlPanel" method="POST" action="../ControlPanels/controlPanel.php">
				<input type="submit" id="backToControlPanelSubmit" value="Back"/></td>
			</form>
			<hr>
		</header>
		<?php
			if (isset($_SESSION['userName'])) {
				$conn = openConnection();
				
				$subjectID = $_POST['subjectID'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dateOfBirth = $_POST['dateOfBirth'];
				$sex = $_POST['subjectSex'];

				$updateQuery = "UPDATE Subjects SET FirstName = '$firstName', LastName = '$lastName', BirthDate = '$dateOfBirth', Sex = '$sex' WHERE Subject_ID = $subjectID";
				$result = odbc_exec($conn,$updateQuery);
				
				echo "<h1>Subject edited successfully!</h1>
				<h2>Details:</h2>";
				echo "<strong>Name: </strong>" . $firstName . " " . $lastName . "<br>" .
				"<strong>Date of Birth: </strong>" . $dateOfBirth . "<br>" .
				"<strong>Sex: </strong>" . $sex . "<br>";
				
				echo "<table class=\"form-table\">
				<tr><form id=\"viewSubjects\" method=\"POST\" action=\"../FunctionalPages/viewSubjects.php\">
				<td><input type=\"submit\" id=\"viewSubjectsSubmit\" value=\"View Subjects\"/></td>
				<td>View data for all subjects.</td>
				</tr></form></table>";
				
			} else {
				echo "You are not authorised to view this page. Please log in.";
				echo '<form id="login" method="POST" action="../index.php">
				<input type="submit" id="loginSubmit" value="Log In"/></td>
				</form>';
			}
		?>
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>