<?php
	if(session_id() == '') {
		session_start();
	}

	if (isset($_SESSION['userName'])) {
		$subjectID = $_POST['subjectID'];
		$subjectName = $_POST['subjectName'];
		
		echo '<h3>Insert Falls Risk Data</h3>
		<h4>Please enter Falls Risk Data for the selected subject.</h4>';
		
		echo "<h3>Subject ID: $subjectID</h3>
		<h3>Subject Name: $subjectName</h3>";
		
		echo '<form id="subjectForm" onSubmit="return validDataInfo()" method="POST" action="./addData.php">';
		echo "<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$subjectID\"/>";
		echo '	<table class="form-table">
		        <tr>
		            <td>Description:</td>
		            <td><input type="text" id="description" name="description" placeholder="Description" onChange="validDescription()"></td>
		            <td id="descriptionError"></td>
		        </tr>
		        <tr>
		            <td>Test Date:</td>
		            <td><input type="text" id="testDate" name="testDate" placeholder="Test Date" onChange="validTestDate()"></td>
		            <td id="testDateError"></td>
		        </tr>
		        <tr>
		            <td>Falls Risk:</td>
		            <td><input type="text" id="fallsRisk" name="fallsRisk" placeholder="True Falls Risk" onChange="validTFR()"></td>
		            <td id="tfrError"></td>
		        </tr>
		        <tr>
	        		<td><input type="submit" id="submit" value="Insert Data"/></td>
	        	</tr>
		    </table>
		</form>';
	} else {
		echo "You are not authorised to view this page. Please log in.";
		echo '<form id="login" method="POST" action="../index.php">
				<input type="submit" id="loginSubmit" value="Log In"/></td>
			</form>';
	}
?>