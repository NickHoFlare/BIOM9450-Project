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

				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$userName = $_POST['userName'];
				$password = $_POST['password'];
				$administrator = $_POST['administrator'];

				if ($administrator == "true") {
					$boolAdmin = true;
				} else {
					$boolAdmin = false;
				}

				if (practitionerAlreadyExists($firstName, $lastName, $userName, $conn)) {
					echo "<h1>This practitioner already exists! Please select a new unique practitioner to be created.</h1>";
					include("./insertPractitioners.php");
				} else {
					$sqlQuery = "INSERT INTO Practitioners (FirstName, LastName, Username, Password, Administrator) VALUES ('$firstName', '$lastName', '$userName', '$password', '$boolAdmin')";
					$result = odbc_exec($conn,$sqlQuery);

					echo "<h1>Practitioner added successfully!</h1>
					<h2>Details:</h2>";
					echo "<strong>Name: </strong>" . $firstName . " " . $lastName . "<br>" .
					"<strong>userName: </strong>" . $userName . "<br>" .
					"<strong>password (remember to sanitise this): </strong>" . $password . "<br>" .
					"<strong>admin? </strong>" . $administrator;
					
					echo "<table class=\"form-table\">
					<tr><form id=\"viewPractitioners\" method=\"POST\" action=\"../FunctionalPages/viewPractitioners.php\">
					<td><input type=\"submit\" id=\"viewPractitionersSubmit\" value=\"View Practitioners\"/></td>
					<td>View data for all practitioners.</td>
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