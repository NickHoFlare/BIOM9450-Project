<?php
if(session_id() == '') {
	session_start();
}

if (isset($_SESSION['userName'])) {
	echo "<h3>Practitioner</h3>";
	echo "<table class=\"form-table\">";

	// Accesses a page that displays all subjects associated with the practitioner logged in
	// Offers controls to search/edit/add subject data
	echo "<tr><form id=\"viewSubjects\" method=\"POST\" action=\"../FunctionalPages/viewSubjects.php\">
				<td><input type=\"submit\" id=\"viewSubjectsSubmit\" value=\"View Subjects\"/></td>
				<td>View data for my subjects.</td>
		  </tr></form>";
		
	// Bypasses the viewSubjects page to go straight to the insertSubject page.
	// Provides options/fields for adding data for a new subject. Subject need not be associated with the current practitioner.
	echo "<tr><form id=\"insertSubjects\" method=\"POST\" action=\"../FunctionalPages/insertForm.php\">
				<td><input type=\"submit\" id=\"insertSubjectSubmit\" value=\"Insert Subject\"/></td>
				<td>Insert data for a new subject.</td>
				<input type=\"hidden\" id=\"formType\" name=\"formType\" value=\"subject\"/>
		  </tr></form>";
	echo "</table>";
} else {
	echo "You are not authorised to view this page. Please log in.";
	echo '<form id="login" method="POST" action="../index.php">
				<input type="submit" id="loginSubmit" value="Log In"/></td>
			</form>';
}

?>