<?php
	if(session_id() == '') {
		session_start();
	}

	if (isset($_SESSION['userName'])) {
		$oldID = $_POST['subjectID'];
		$oldFirst = $_POST['firstName'];
		$oldLast = $_POST['lastName'];
		$oldBirth = $_POST['birthDate'];
		$oldSex = $_POST['sex'];

		// Use DOUBLE QUOTES
		echo "<h3>Edit Subject</h3>
		<h4>Please enter the details of the subject you would like to edit.</h4>

		<form id=\"subjectForm\" onSubmit=\"return validSubjectInfo()\" method=\"POST\" action=\"./changeSubjects.php\">
			<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$oldID\"/>
			<table class=\"form-table\">
				<tr>
					<td>First Name:</td>
					<td><input type=\"text\" id=\"firstName\" name=\"firstName\" value=\"$oldFirst\" onChange=\"validFirstName()\"></td>
					<td id=\"firstNameError\"></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type=\"text\" id=\"lastName\" name=\"lastName\" value=\"$oldLast\" onChange=\"validLastName()\"></td>
					<td id=\"lastNameError\"></td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type=\"text\" id=\"dateOfBirth\" name=\"dateOfBirth\" value=\"$oldBirth\" onChange=\"validDOB()\"></td>
					<td id=\"dobError\"></td>
				</tr>
				<tr>
					<td>Sex:</td>
					<td><select id=\"subjectSex\" name=\"subjectSex\" onChange=\"validSex()\">";
		if ($oldSex == "m") {
			echo "<option value=\"m\">Male</option>
				  <option value=\"f\">Female</option>";
		} else {
			echo "<option value=\"f\">Female</option>
				  <option value=\"m\">Male</option>";
		}
		echo " </select></td>
					<td id=\"sexError\"></td>
				</tr>
				<tr>
					<td><input type=\"submit\" id=\"submit\" value=\"Confirm Edits\"/></td>
				</tr>
			</table>
		</form>";
	} else {
		echo "You are not authorised to view this page. Please log in.";
		echo '<form id="login" method="POST" action="../index.php">
				<input type="submit" id="loginSubmit" value="Log In"/></td>
			</form>';
	}
?>