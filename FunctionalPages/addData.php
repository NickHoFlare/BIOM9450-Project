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
				$description = $_POST['description'];
				$testDate = $_POST['testDate'];
				$fallsRisk = $_POST['fallsRisk'];

				if (dataAlreadyExists($description, $testDate, $fallsRisk, $conn)) {
					echo "<h1>This set of data already exists! Please insert a new unique set of data.</h1>";
					include("./insertData.php");			
				} else {
					$sqlQuery = "INSERT INTO FallsRiskData (Subject_ID, Description, TestDate, TrueFallsRisk) VALUES ('$subjectID', '$description', '$testDate', '$fallsRisk')";
					$result = odbc_exec($conn,$sqlQuery);

					echo "<h1>Data added successfully!</h1>
					<h2>Details:</h2>";
					echo "<strong>Subject ID: </strong>$subjectID<br>" .
					"<strong>Description: </strong>$description<br>" .
					"<strong>Test Date: </strong>$testDate<br>".
					"<strong>Falls Risk: </strong>$fallsRisk<br>";
					
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