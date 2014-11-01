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
			if (isset($_SESSION['userName']) && $_SESSION['isAdmin']) {
				$conn = openConnection();

				$pracID = $_POST['practitionerDropdown'];
				$subjectID = $_POST['subjectDropdown'];

				if (relationshipAlreadyExists($practitioner, $subject, $conn)) {
					echo "<h1>This relationship already exists! Please select a new unique relationship to be created.</h1>";
					include("./insertRelationships.php");
				} else {
					$pracNameQuery = "SELECT FirstName+' '+LastName AS Name fROM Practitioners WHERE Prac_ID = $pracID";
					$pracNameExec = odbc_exec($conn,$pracNameQuery);
					$pracName = odbc_result($pracNameExec, "Name");
					$subjectNameQuery = "SELECT FirstName+' '+LastName AS Name fROM Subjects WHERE Subject_ID = $subjectID";
					$subjectNameExec = odbc_exec($conn,$subjectNameQuery);
					$subjectName = odbc_result($subjectNameExec, "Name");

					$sqlQuery = "INSERT INTO Relationships (Prac_ID, Subject_ID) VALUES ('$pracID', '$subjectID')";
					$result = odbc_exec($conn,$sqlQuery);

					echo "<h1>Relationship added successfully!</h1>
					<h2>Details:</h2>";
					echo "<strong>Practitioner: </strong>" . $pracName . "<br>" .
					"<strong>Subject: </strong>" . $subjectName . "<br>";
					
					echo "<table class=\"form-table\">
					<tr><form id=\"viewRelationships\" method=\"POST\" action=\"../FunctionalPages/viewRelationships.php\">
					<td><input type=\"submit\" id=\"viewRelationshipsSubmit\" value=\"View Relationships\"/></td>
					<td>View relationships between subjects and practitioners.</td>
			  		</tr></form></table>";
				}
			} else {
				echo "You are not authorised to view this page. Please log in as an administrator.";
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