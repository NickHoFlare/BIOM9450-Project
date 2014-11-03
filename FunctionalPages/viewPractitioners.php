<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../style.css">
		<?php 
			include("../functions.php");
			session_start();
		?>
		<title>View Practitioners</title>
	</head>

	<body>
		<header>
			<img src="../assets/logo3.png"></a>
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
				echo '<h3>View Practitioners</h3>
				<form id="insertPractioners" method="POST" action="./insertForm.php">
					<input type="submit" id="insertPractitionerSubmit" value="Insert Practitioner"/>
					<input type="hidden" id="formType" name="formType" value="practitioner"/>
			  	</form><br>';
				echo '<form id="searchPractitioners" method="POST" action="./viewPractitioners.php">
						<input type="text" id="pracSearch" name="pracSearch" placeholder="search"></td>
						<input type="submit" id="searchPractitionerSubmit" value="Search Practitioners"/>
					</form>';

			
				$isAdmin = $_SESSION['isAdmin'];
				$conn = openConnection();

				if (isset($_POST['pracSearch'])) {
					$searchTerms = $_POST['pracSearch'];
				} else {
					$searchTerms = '';
				}
				displayPractitioners($conn, $isAdmin, $searchTerms);
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