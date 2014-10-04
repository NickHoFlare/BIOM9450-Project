<?php
echo "<h3>Administrator</h3>";
echo "<table class=\"form-table\">";

// Accesses a page that displays all subjects.
// Offers controls to search/edit/add subject data
echo "<tr><form id=\"viewSubjects\" method=\"POST\" action=\"./viewSubjects.php\">
			<td><input type=\"submit\" id=\"viewSubjectsSubmit\" value=\"View Subjects\"/></td>
			<td>View data for all subjects.</td>
	  </tr></form>";

// Bypasses the viewSubjects page to go straight to the insertSubject page.
// Provides options/fields for adding data for a new subject.
echo "<tr><form id=\"insertSubjects\" method=\"POST\" action=\"./insertSubjects.php\">
			<td><input type=\"submit\" id=\"insertSubjectSubmit\" value=\"Insert Subject\"/></td>
			<td>Insert data for a new subject.</td>
	  </tr></form>";

// Accesses a page that displays all subject-practitioner relationships. Sort by practitioner.
// Offers controls to search for a practitioner / add a relationship to a practitioner / delete a relationship to a practitioner.
echo "<tr><form id=\"viewRelationships\" method=\"POST\" action=\"./viewRelationships.php\">
			<td><input type=\"submit\" id=\"viewRelationshipsSubmit\" value=\"View Relationships\"/></td>
			<td>View relationships between subjects and practitioners.</td>
	  </tr></form>";
	
// Bypasses the viewRelationships page to go straight to the insertRelationship page.
// Provides options/fields for adding data for a new relationship.
echo "<tr><form id=\"insertRelationship\" method=\"POST\" action=\"./insertRelationship.php\">
			<td><input type=\"submit\" id=\"insertRelationshipSubmit\" value=\"Insert Relationship\"/></td>
			<td>Insert a new relationship between a subject and a practitioner.</td>
	  </tr></form>";
	
// Accesses a page that displays all practitioners.
// Offers controls to search/edit/add subject data
echo "<tr><form id=\"viewPractitioners\" method=\"POST\" action=\"./viewPractitioners.php\">
			<td><input type=\"submit\" id=\"viewPractitionersSubmit\" value=\"View Practitioners\"/></td>
			<td>View data for all practitioners.</td>
	  </tr></form>";
	
// Bypasses the viewPractitioners page to go straight to the insertPractitioner page.
// Provides options/fields for adding data for a new practitioner.
echo "<tr><form id=\"insertPractitioner\" method=\"POST\" action=\"./insertPractitioner.php\">
			<td><input type=\"submit\" id=\"insertPractitionerSubmit\" value=\"Insert Practitioner\"/></td>
			<td>Insert data for a new practitioner.</td>
	  </tr></form>";
echo "</table>";


?>
