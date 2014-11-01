<?php
	if(session_id() == '') {
		session_start();
	}

	if (isset($_SESSION['userName'])) {
		echo '<h3>Insert Subjects</h3>
		<h4>Please enter the details of the subject you would like to insert.</h4>

		<form id="subjectForm" onSubmit="return validSubjectInfo()" method="POST" action="./addSubjects.php">
			<table class="form-table">
		        <tr>
		            <td>First Name:</td>
		            <td><input type="text" id="firstName" name="firstName" placeholder="First Name" onChange="validFirstName()"></td>
		            <td id="firstNameError"></td>
		        </tr>
		        <tr>
		            <td>Last Name:</td>
		            <td><input type="text" id="lastName" name="lastName" placeholder="Last Name" onChange="validLastName()"></td>
		            <td id="lastNameError"></td>
		        </tr>
		        <tr>
		            <td>Date of Birth:</td>
		            <td><input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="Date of Birth" onChange="validDOB()"></td>
		            <td id="dobError"></td>
		        </tr>
		        <tr>
		            <td>Sex:</td>
		            <td><select id="subjectSex" name="subjectSex" onChange="validSex()">
		            		<option value="">Please select an option</option>
		            		<option value="m">Male</option>
		            		<option value="f">Female</option>
		            	</select></td>
		            <td id="sexError"></td>
		        </tr>
		        <tr>
	        		<td><input type="submit" id="submit" value="Insert Subject"/></td>
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