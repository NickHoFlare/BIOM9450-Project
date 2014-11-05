<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../style.css">
		<script src="../formVerification.js"></script>
		<?php 
			include("../functions.php");
			session_start();
			$formType = $_POST['formType'];
		if ($formType == "subject") {
			echo "<title>Insert Subjects</title>";
		} else if ($formType == "relationship") {
			echo "<title>Insert Relationships</title>";
		} else if ($formType == "practitioner") {
			echo "<title>Insert Practitioners</title>";
		} else {
			echo "<title>Insert Falls Risk Data</title>";
		}
		?>
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
			// Serve different dynamic pages depending on which hidden field was provided
			if ($formType == "subject") {
				include("./insertSubjects.php");
			} else if ($formType == "relationship") {
				include("./insertRelationships.php");
			} else if ($formType == "practitioner") {
				include("./insertPractitioners.php");
			} else {
				include("./insertData.php");
			}
		?>
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>