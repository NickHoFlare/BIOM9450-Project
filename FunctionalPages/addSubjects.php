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
				
				// TODO: ADD SUBJECT ID, INCREMENT LAST SUBJECT ID BY ONE
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dateOfBirth = $_POST['dateOfBirth'];
				$sex = $_POST['subjectSex'];

				if (subjectAlreadyExists($firstName, $lastName, $dateOfBirth, $sex, $conn)) {
					echo "<h1>This subject already exists! Please insert a new unique subject.</h1>";
					include("./insertSubjects.php");			
				} else {
					$subjectID = getLastSubjectID($conn) + 1;

					$sqlQuery = "INSERT INTO Subjects (Subject_ID, FirstName, LastName, BirthDate, Sex) VALUES ('$subjectID', '$firstName', '$lastName', '$dateOfBirth', '$sex')";
					$result = odbc_exec($conn,$sqlQuery);

					echo "<h1>Subject added successfully!</h1>
					<h2>Details:</h2>";
					echo "<strong>Name: </strong>" . $firstName . " " . $lastName . "<br>" .
					"<strong>Date of Birth: </strong>" . $dateOfBirth . "<br>" .
					"<strong>Sex: </strong>" . $sex . "<br>";
					
					echo "<table class=\"form-table\">
					<tr><form id=\"viewSubjects\" method=\"POST\" action=\"../FunctionalPages/viewSubjects.php\">
					<td><input type=\"submit\" id=\"viewSubjectsSubmit\" value=\"View Subjects\"/></td>
					<td>View data for all subjects.</td>
			  		</tr></form></table>";
				}
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