<?php
	if(session_id() == '') {
		session_start();
	}
	
	if (isset($_SESSION['userName']) && $_SESSION['isAdmin']) {
		$oldID = $_POST['pracID'];
		$oldFirst = $_POST['firstName'];
		$oldLast = $_POST['lastName'];
		$oldUser = $_POST['userName'];
		$oldPass = $_POST['password'];
		$oldAdmin = $_POST['administrator'];

		echo "<h3>Edit Practitioners</h3>
		<h4>Please enter the details of the practitioner you would like to edit.</h4>

		<form id=\"practitionerForm\" onSubmit=\"return validPractitionerInfo()\" method=\"POST\" action=\"./changePractitioners.php\">
			<input type=\"hidden\" id=\"pracID\" name=\"pracID\" value=\"$oldID\"/>
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
		            <td>Username:</td>
		            <td><input type=\"text\" id\"userName\" name=\"userName\" value=\"$oldUser\" onChange=\"validUsername()\"></td>
		            <td id=\"userNameError\"></td>
		        </tr>
		        <tr>
		            <td>Password:</td>
		            <td><input type=\"password\" id=\"password\" name=\"password\" value=\"$oldPass\" onChange=\"validPassword()\"></td>
		            <td id=\"passwordError\"></td>
		        </tr>
		        <tr>
		            <td>Administrator?</td>";

		            if ($oldAdmin) {
		            	echo "<td><input type=\"radio\" id=\"administrator\" name=\"administrator\" value=\"yes\" checked>Yes</td>";
		            	echo "<td><input type=\"radio\" id=\"administrator\" name=\"administrator\" value=\"no\">No</td>";
		            } else {
		            	echo "<td><input type=\"radio\" id=\"administrator\" name=\"administrator\" value=\"yes\">Yes</td>";
		            	echo "<td><input type=\"radio\" id=\"administrator\" name=\"administrator\" value=\"no\" checked>No</td>";
		            }

		echo "  </tr>
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