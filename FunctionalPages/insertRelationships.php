<?php // Insert options as Practitioner/Subject name, but actual value as their IDs.
	include("../functions.php");
	
	if(session_id() == '') {
		session_start();
	}
	
	if (isset($_SESSION['userName']) && $_SESSION['isAdmin']) {
		$conn = openConnection();
		
		echo '<h3>Insert Relationships</h3>
		<h4>Please select the practitioner and subject for whom you would like to create a relationship for.</h4>
		<form id="relationshipForm" onSubmit="return validRelationshipInfo()" method="POST" action="./addRelationships.php">
			<table class="form-table">
		        <tr>
		            <td>Practitioner:</td>
		            <td><select id="practitionerDropdown" name="practitionerDropdown" onChange="validPractitioner()">
		            		<option value="">Please select an option</option>';
		            		printPractitionerOptions($conn);
		echo '            	</select></td>
		            <td id="practitionerError"></td>
		        </tr>
		        <tr>
		            <td>Subject:</td>
		            <td><select id="subjectDropdown" name="subjectDropdown" onChange="validSubject()">
		            		<option value="">Please select an option</option>';
		            		printSubjectOptions($conn);
		echo '            	</select></td>
		            <td id="subjectError"></td>
		        </tr>
		        <tr>
	        		<td><input type="submit" id="submit" value="Insert Relationship"/></td>
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
