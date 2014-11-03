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
        $conn = openConnection();
        
        $subjectID = $_POST['subjectID'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $fullName = $firstName .' '. $lastName;

        $fallsQuery = "SELECT * FROM FallsRiskData WHERE Subject_ID = $subjectID ORDER BY TestDate";
        $fallsData = odbc_exec($conn,$fallsQuery);

        echo "<h3>Subject Name:</h3> $fullName
        <h3>Subject ID:</h3> $subjectID
        <h3>Fall Risk Trials:</h3>";
        echo "<table class=\"form-table\">
        <tr>
        	<th>Description</th>
			<th>Test Date</th>
			<th>True Falls Risk</th>
		</tr>";
		
		while (odbc_fetch_row($fallsData)) {
			$description = odbc_result($fallsData,"Description");
			$testDate = odbc_result($fallsData,"TestDate");
			$year = substr($testDate, 0, 4);
			$month = substr($testDate, 5, 2);
			$day = substr($testDate, 8, 2);
			$shortDate = $day."/".$month."/".$year;
			$fallsRisk = odbc_result($fallsData,"TrueFallsRisk");
			
			echo "<tr>
					<td>$description</td>
					<td>$shortDate</td>
					<td>$fallsRisk</td>
			</tr>";
		}
		echo "</table>";
		echo "<h3>Triax Data:</h3>";

		include("../plotPages/plotTriax.php");
        
        
        
        //odbc_binmode
        //odbc_longreadlen
        //ob_start()
        ?>
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>