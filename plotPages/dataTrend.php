<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../style.css">
		<script src="../formVerification.js"></script>
		<?php include("../functions.php"); ?>
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
        	require_once("../TeeChart/sources/libTeeChart.php"); 
        	$conn = openConnection();

        	$query = "SELECT Subjects.Subject_ID, Round(Avg(FallsRiskData.TrueFallsRisk),2) AS AvgOfTrueFallsRisk, Int((Date()-[BirthDate])/365) AS Age
						FROM Subjects LEFT JOIN FallsRiskData ON Subjects.Subject_ID = FallsRiskData.Subject_ID
						GROUP BY Subjects.Subject_ID, Int((Date()-[BirthDate])/365)";
			$dataTrend = odbc_exec($conn,$query);
			$age = array(0);
			$fallsRisk = array(0);
			$i = 0;

			while (odbc_fetch_row($dataTrend)) {
				$age[$i] = odbc_result($dataTrend,"Age");
				$fallsRisk[$i] = odbc_result($dataTrend,"AvgOfTrueFallsRisk");
				$i++;
				// some fallsRisk are missing. If problems arise, get some way to remove these anomolies.
			}  
			
			//Set up chart
			$chart1 = new TChart(640,480);
			$chart1->getAspect()->setView3D(false);
			$chart1->getHeader()->setText("Plot of Falls Risk vs Age");
			$chart1->getLegend()->setVisible(FALSE);
			
			$points = new Points($chart1->getChart());
			
			for ($j = 0 ; $j < count($fallsRisk) ; $j++) {
				echo "age is $age[$j], fallsRisk is $fallsRisk[$j]";
				$points->addXY($age[$j], $fallsRisk[$j]);
			}	
			
			$points->Setcolor(Color::RED());
			$chart1->getAxes()->getBottom()->getTitle()->setText("Age (years)"); 
			$chart1->getAxes()->getLeft()->getTitle()->setText("Falls Risk (arbitrary)"); 
		
			$chart1->render("fallsRisk.png");	
		
			echo '<img src="fallsRisk.png" style="border: 1px solid gray;"/>';

			echo '<h2>Data:</h2>';
			echo "<table class=\"form-table\">
			<tr>
				<th>Subject ID</th>
				<th>Average of True Falls Risk</th>
				<th>Age</th>
			</tr>";

			$query = "SELECT Subjects.Subject_ID, Round(Avg(FallsRiskData.TrueFallsRisk),2) AS AvgOfTrueFallsRisk, Int((Date()-[BirthDate])/365) AS Age
						FROM Subjects LEFT JOIN FallsRiskData ON Subjects.Subject_ID = FallsRiskData.Subject_ID
						GROUP BY Subjects.Subject_ID, Int((Date()-[BirthDate])/365)";
			$dataTrend = odbc_exec($conn,$query);
			while (odbc_fetch_row($dataTrend)) {
				$subjectID = odbc_result($dataTrend,"Subject_ID");
				$avgTrueFalls = odbc_result($dataTrend,"AvgOfTrueFallsRisk");
				$age = odbc_result($dataTrend,"Age");

				echo "<tr>
					<td>$subjectID</td>
					<td>$avgTrueFalls</td>
					<td>$age</td>
				  </tr>";		
			}  
			echo "</table>";
        ?>       
    </body>
	<hr>
	<footer>
		<strong>Created by Nicholas Ho / z3422527</strong>
	</footer>
</html>
