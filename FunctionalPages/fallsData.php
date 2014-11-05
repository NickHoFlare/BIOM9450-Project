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
            <form id="backToViewSubjects" method="POST" action="../FunctionalPages/viewSubjects.php">
				<input type="submit" id="backToViewSubjetsSubmit" value="Back"/></td>
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
		
		echo "<form id=\"insertData\" method=\"POST\" action=\"./insertForm.php\">
						<td><input type=\"submit\" id=\"insertDataSubmit\" value=\"Insert Data\"/></td>
						<input type=\"hidden\" id=\"formType\" name=\"formType\" value=\"data\"/>
						<input type=\"hidden\" id=\"subjectName\" name=\"subjectName\" value=\"$fullName\"/>
						<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$subjectID\"/>
		  			</form>";

        echo "<table class=\"form-table\">
        <tr>
        	<th>Description</th>
			<th>Test Date</th>
			<th>True Falls Risk</th>
		</tr>";
		
		$dataAvailable = false;
		while (odbc_fetch_row($fallsData)) {
			$fallsID = odbc_result($fallsData,"FallsTest_ID");
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
					<td><form id=\"editData\" method=\"POST\" action=\"./editForm.php\">
						<input type=\"submit\" id=\"editDataSubmit\" value=\"Edit Data\"/></td>
						<input type=\"hidden\" id=\"fallsID\" name=\"fallsID\" value=\"$fallsID\"/>
						<input type=\"hidden\" id=\"formType\" name=\"formType\" value=\"data\"/>
						<input type=\"hidden\" id=\"subjectName\" name=\"subjectName\" value=\"$fullName\"/>
						<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$subjectID\"/>
						<input type=\"hidden\" id=\"description\" name=\"description\" value=\"$description\"/>
						<input type=\"hidden\" id=\"testDate\" name=\"testDate\" value=\"$testDate\"/>
						<input type=\"hidden\" id=\"fallsRisk\" name=\"fallsRisk\" value=\"$fallsRisk\"/>
		  			</form></td>
				</tr>";
			$dataAvailable = true;
		}
		echo "</table>";
		if (!$dataAvailable) {
			echo "<h2>No Falls Data is available for this subject!</h2>";
		}
		echo "<h3>Triax Data:</h3>";

		include("../PlotPages/plotTriax.php");
        ?>
	</body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>