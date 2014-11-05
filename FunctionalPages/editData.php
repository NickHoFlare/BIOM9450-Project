<?php
	if(session_id() == '') {
		session_start();
	}

	if (isset($_SESSION['userName'])) {
		$fallsID = $_POST['fallsID'];
		$subjectID = $_POST['subjectID'];
		$subjectName = $_POST['subjectName'];
		$description = $_POST['description'];
		$testDate = substr($_POST['testDate'], 0, 10);
		$year = substr($testDate, 0, 4);
		$month = substr($testDate, 5, 2);
		$day = substr($testDate, 8, 2);
		$shortDate = $day."/".$month."/".$year;
			
		$fallsRisk = $_POST['fallsRisk'];
		
		echo '<h3>Insert Falls Risk Data</h3>
		<h4>Please enter Falls Risk Data for the selected subject.</h4>';
		
		echo "<h3>Subject ID: $subjectID</h3>
		<h3>Subject Name: $subjectName</h3>";
		
		echo '<form id="subjectForm" onSubmit="return validDataInfo()" method="POST" action="./changeData.php">
			<table class="form-table">
		        <tr>
		            <td>Description:</td>';
		echo "<td><input type=\"text\" id=\"description\" name=\"description\" value=\"$description\" onChange=\"validDescription()\"></td>";
		echo '      <td id="descriptionError"></td>
		        </tr>
		        <tr>
		            <td>Test Date:</td>';
		echo "      <td><input type=\"text\" id=\"testDate\" name=\"testDate\" value=\"$shortDate\" onChange=\"validTestDate()\"></td>";
		echo '      <td id="testDateError"></td>
		        </tr>
		        <tr>
		            <td>Falls Risk:</td>';
		echo "      <td><input type=\"text\" id=\"fallsRisk\" name=\"fallsRisk\" value=\"$fallsRisk\" onChange=\"validTFR()\"></td>";
		echo '      <td id="tfrError"></td>
		        </tr>
		        <tr>
	        		<td><input type="submit" id="submit" value="Edit Data"/></td>
	        	</tr>
		    </table>';
		echo "<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$subjectID\"/>
				<input type=\"hidden\" id=\"subjectName\" name=\"subjectName\" value=\"$subjectName\"/>	
				<input type=\"hidden\" id=\"fallsID\" name=\"fallsID\" value=\"$fallsID\"/>";
		echo '</form>';
	} else {
		echo "You are not authorised to view this page. Please log in.";
		echo '<form id="login" method="POST" action="../index.php">
				<input type="submit" id="loginSubmit" value="Log In"/></td>
			</form>';
	}
?>