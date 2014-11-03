<?php
	// This function converts the raw data in ecg.txt into the final form that will be plotted on the graph.
	// For each item in the array, multiply by 5 and divide by 4095 to normalize the values from 0-4095 to 0-5.
	// Then, subtract each value by 2.5 to bring the values to the range -2.5-2.5
	// Then, divide by 450 to reverse the effect of the gain
	// Finally, multiply by 1000 to convert the values from V to mV.
	function convertData($array) {
		for ($i = 0 ; $i < sizeof($array) ; $i++) {
			$array[$i] = (($array[$i] * 5 / 4095) - 2.5) / 450 * 1000 ;
		}
		return $array;
	}

	/********************************* 
	****** Here be DB functions ******
	*********************************/

	// This function opens the connection to the database. Returns a reference to the open connection.
	function openConnection() {
		$conn = odbc_connect('z3422527', '', '',SQL_CUR_USE_ODBC);
		return $conn;
	}

	// This function opens a connection to the database and checks if the 
	// username and password of the person logging in matches any of the entries of the database
	// in the Practitioners table.
	// Return True if Yes.
	function userExists($userName, $password, $conn) {
		$query = "SELECT * FROM Practitioners";
		$practitioners = odbc_exec($conn,$query);
		
		while(odbc_fetch_row($practitioners)) {
			$dbUser = odbc_result($practitioners,"Username");
			$dbPass = odbc_result($practitioners,"Password");
			
			if ($dbUser == $userName && $dbPass == $password) {
				return true;
			}
		}
		return false;
	}

	function isAdmin($userName, $conn) {
		$query = "SELECT * FROM Practitioners WHERE Administrator = true";
		$administrators = odbc_exec($conn,$query);
		
		while(odbc_fetch_row($administrators)) {
			$dbUser = odbc_result($administrators,"Username");
			
			if ($dbUser == $userName) {
				return true;
			}
		}
		return false;
	}

	function getPracID($conn, $userName) {
		//$query = "SELECT Prac_ID from Practitioners WHERE Username = '$userName'";
		$query = "SELECT Prac_ID from Practitioners WHERE Username = '$userName'";
		$result = odbc_exec($conn,$query);
		$pracID = odbc_result($result,"Prac_ID");
		return $pracID;
	}

	function displaySubjects($conn, $isAdmin, $pracID, $searchTerms) {
		if ($searchTerms == '') {
			if ($isAdmin) {
				$query = "SELECT * FROM Subjects";
			} else {
				$query = "SELECT s.Subject_ID, s.FirstName, s.LastName, s.BirthDate, s.Sex 
							FROM Subjects s INNER JOIN Relationships r 
							ON r.Subject_ID = s.Subject_ID 
							WHERE r.Prac_ID = $pracID";
			}
		} else {
			if ($isAdmin) {
				$query = "SELECT * FROM Subjects 
							WHERE FirstName LIKE '%$searchTerms%'
							OR LastName LIKE '%$searchTerms%'";
			} else {
				$query = "SELECT s.Subject_ID, s.FirstName, s.LastName, s.BirthDate, s.Sex 
							FROM Subjects s INNER JOIN Relationships r 
							ON r.Subject_ID = s.Subject_ID 
							WHERE r.Prac_ID = $pracID";
			}
		}
		$subjects = odbc_exec($conn,$query);
		
		echo "<table class=\"form-table\">
			<tr>
				<th>Subject ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Birth Date</th>
				<th>Sex</th>
			</tr>";
		while(odbc_fetch_row($subjects)) {
			$subjectID = odbc_result($subjects,"Subject_ID");
			$firstName = odbc_result($subjects,"FirstName");
			$lastName = odbc_result($subjects,"LastName");
			$birthDate = substr(odbc_result($subjects,"BirthDate"), 0, 10);
			$bdYear = substr($birthDate, 0, 4);
			$bdMonth = substr($birthDate, 5, 2);
			$bdDay = substr($birthDate, 8, 2);
			$birthDate = $bdDay."/".$bdMonth."/".$bdYear;
			$sex = odbc_result($subjects,"Sex");

			echo "<tr>
					<td>$subjectID</td>
					<td>$firstName</td>
					<td>$lastName</td>
					<td>$birthDate</td>
					<td>$sex</td>
					<td><form id=\"fallsData\" onSubmit=\"!!!!!!!SOMETHING!!!!!!!!\" method=\"POST\" action=\"./fallsData.php\">
							<input type=\"submit\" id=\"fallsDataSubmit\" value=\"View Falls Data\"/></td>
						</form></td>
					<td><form id=\"editSubject\" method=\"POST\" action=\"./editForm.php\">
							<input type=\"submit\" id=\"editSubjectSubmit\" value=\"Edit\"/></td>
							<input type=\"hidden\" id=\"formType\" name=\"formType\" value=\"subject\"/>
							<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$subjectID\"/>
							<input type=\"hidden\" id=\"firstName\" name=\"firstName\" value=\"$firstName\"/>
							<input type=\"hidden\" id=\"lastName\" name=\"lastName\" value=\"$lastName\"/>
							<input type=\"hidden\" id=\"birthDate\" name=\"birthDate\" value=\"$birthDate\"/>
							<input type=\"hidden\" id=\"sex\" name=\"sex\" value=\"$sex\"/>
						</form></td>
				  </tr>";			
		}
		echo "</table>";
	}
	
	function displayRelationships($conn, $isAdmin, $searchTerms) {
		if ($searchTerms == '') {
			if ($isAdmin) {
				$query = "SELECT r.Rel_ID, p.Prac_ID, p.FirstName+' '+p.LastName AS Practitioner_Name, s.Subject_ID, s.FirstName +' '+s.LastName AS Subject_Name FROM Relationships r, Practitioners p, Subjects s
	WHERE s.Subject_ID = r.Subject_ID
	AND p.Prac_ID = r.Prac_ID";
			} 
		} else {
			if ($isAdmin) {
				$query = "SELECT r.Rel_ID, p.Prac_ID, p.FirstName+' '+p.LastName AS Practitioner_Name, s.Subject_ID, s.FirstName +' '+s.LastName AS Subject_Name FROM Relationships r, Practitioners p, Subjects s
	WHERE s.Subject_ID = r.Subject_ID
	AND p.Prac_ID = r.Prac_ID
	AND (p.FirstName LIKE '%$searchTerms%'
		OR p.LastName LIKE '%$searchTerms%'
		OR s.FirstName LIKE '%$searchTerms%'
		OR s.LastName LIKE '%$searchTerms%')";
			}
		}
		$relationships = odbc_exec($conn,$query);
		
		echo "<table class=\"form-table\">
			<tr>
				<th>Relationship ID</th>
				<th>Practitioner ID</th>
				<th>Practitioner Name</th>
				<th>Subject ID</th>
				<th>Subject Name</th>
			</tr>";
		while(odbc_fetch_row($relationships)) {
			$relationshipID = odbc_result($relationships,"Rel_ID");
			$pracID = odbc_result($relationships,"Prac_ID");
			$pracName = odbc_result($relationships,"Practitioner_Name");
			$subjectID = odbc_result($relationships,"Subject_ID");
			$subjectName = odbc_result($relationships,"Subject_Name");

			echo "<tr>
					<td>$relationshipID</td>
					<td>$pracID</td>
					<td>$pracName</td>
					<td>$subjectID</td>
					<td>$subjectName</td>
					<td><form id=\"deleteRelationship\" onSubmit=\"return confirm('Are you sure?');\" method=\"POST\" action=\"./deleteRelationships.php\">
							<input type=\"hidden\" id=\"pracID\" name=\"pracID\" value=\"$pracID\"/>
							<input type=\"hidden\" id=\"subjectID\" name=\"subjectID\" value=\"$subjectID\"/>
							<input type=\"submit\" id=\"deleteRelationshipSubmit\" value=\"Delete\"/></td>
						</form></td>
				  </tr>";			
		}
		echo "</table>";
	}

	function displayPractitioners($conn, $isAdmin, $searchTerms) {
		if ($searchTerms == '') {
			if ($isAdmin) {
				$query = "SELECT * FROM Practitioners";
			}
		} else {
			if ($isAdmin) {
				$query = "SELECT * FROM Practitioners
							WHERE FirstName LIKE '%$searchTerms%'
							OR LastName LIKE '%$searchTerms%'
							OR Username LIKE '%$searchTerms%'";
			}
		}
		$practitioners = odbc_exec($conn,$query);
		
		echo "<table class=\"form-table\">
			<tr>
				<th>Practitioner ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Password</th>
				<th>Administrator?</th>
			</tr>";
		while(odbc_fetch_row($practitioners)) {
			$pracID = odbc_result($practitioners,"Prac_ID");
			$firstName = odbc_result($practitioners,"FirstName");
			$lastName = odbc_result($practitioners,"LastName");
			$userName = odbc_result($practitioners,"Username");
			$password = odbc_result($practitioners,"Password");
			$administrator = odbc_result($practitioners,"Administrator");
			
			if ($administrator) {
				$administratorString = "Yes";
			} else {
				$administratorString = "No";
			}

			echo "<tr>
					<td>$pracID</td>
					<td>$firstName</td>
					<td>$lastName</td>
					<td>$userName</td>
					<td>$password</td>
					<td>$administratorString</td>
					<td><form id=\"editPractitioner\" method=\"POST\" action=\"./editForm.php\">
							<input type=\"submit\" id=\"editPractitionerSubmit\" value=\"Edit\"/></td>
							<input type=\"hidden\" id=\"formType\" name=\"formType\" value=\"practitioner\"/>
							<input type=\"hidden\" id=\"pracID\" name=\"pracID\" value=\"$pracID\"/>
							<input type=\"hidden\" id=\"firstName\" name=\"firstName\" value=\"$firstName\"/>
							<input type=\"hidden\" id=\"lastName\" name=\"lastName\" value=\"$lastName\"/>
							<input type=\"hidden\" id=\"userName\" name=\"userName\" value=\"$userName\"/>
							<input type=\"hidden\" id=\"password\" name=\"password\" value=\"$password\"/>
							<input type=\"hidden\" id=\"administrator\" name=\"administrator\" value=\"$administrator\"/>
						</form></td>
				  </tr>";			
		}
		echo "</table>";
	}

	function subjectAlreadyExists($firstName, $lastName, $dateOfBirth, $sex, $conn) {
		$query = "SELECT * FROM Subjects";
		$subjects = odbc_exec($conn,$query);

		while(odbc_fetch_row($subjects)) {
			$dbFirst = strtolower(odbc_result($subjects,"FirstName"));
			$dbLast = strtolower(odbc_result($subjects,"LastName"));
			$dbBirthDate = strtolower(odbc_result($subjects,"BirthDate"));
			$bdYear = substr($dbBirthDate, 0, 4);
			$bdMonth = substr($dbBirthDate, 5, 2);
			$bdDay = substr($dbBirthDate, 8, 2);
			$dbBirthDate = $bdDay."/".$bdMonth."/".$bdYear;
			$dbSex = odbc_result($subjects,"Sex");
			
			if ($dbFirst == strtolower($firstName)			&& 
				$dbLast == strtolower($lastName) 			&& 
				$dbBirthDate == strtolower($dateOfBirth)	&&
				$dbSex == strtolower($sex)) {
				return true;
			}
		}
		return false;
	}
	
	function relationshipAlreadyExists($practitioner, $subject, $conn) {
		$query = "SELECT * FROM Relationships";
		$results = odbc_exec($conn,$query);

		while(odbc_fetch_row($results)) {
			$dbPractitioner = odbc_result($results,"Prac_ID");
			$dbSubject = odbc_result($results,"Subject_ID");
			
			if ($dbPractitioner == $practitioner	&& 
				$dbSubject == $subject) {
				
				return true;
			}
		}
		return false;
	}
	
	function practitionerAlreadyExists($firstName, $lastName, $userName, $conn) {
		$query = "SELECT * FROM Practitioners";
		$practitioners = odbc_exec($conn,$query);

		while(odbc_fetch_row($practitioners)) {
			$dbFirst = strtolower(odbc_result($practitioners,"FirstName"));
			$dbLast = strtolower(odbc_result($practitioners,"LastName"));
			$dbUserName = odbc_result($practitioners,"Username");
			
			if ($dbFirst == strtolower($firstName)			&& 
				$dbLast == strtolower($lastName) 			&& 
				$dbUserName == $userName) {
					
				return true;
			}
		}
		return false;
	}

	function getLastSubjectID($conn) {
		$query = "SELECT TOP 1 Subject_ID AS ID FROM Subjects ORDER BY Subject_ID DESC";
		$result = odbc_exec($conn,$query);
		
		$lastID = odbc_result($result,"ID");
		
		return $lastID;
	}
	
	function printPractitionerOptions($conn) {
		$query = "SELECT * FROM Practitioners";
		$practitioners = odbc_exec($conn,$query);

		while(odbc_fetch_row($practitioners)) {
			$pracID = odbc_result($practitioners,"Prac_ID");
			$firstName = odbc_result($practitioners,"FirstName");
			$lastName = odbc_result($practitioners,"LastName");
			$fullName = $firstName." ".$lastName;

			echo "<option value=\"$pracID\">$fullName</option>";
		}
	}
	
	function printSubjectOptions($conn) {
		$query = "SELECT * FROM Subjects";
		$subjects = odbc_exec($conn,$query);

		while(odbc_fetch_row($subjects)) {
			$subjectID = odbc_result($subjects,"Subject_ID");
			$firstName = odbc_result($subjects,"FirstName");
			$lastName = odbc_result($subjects,"LastName");
			$fullName = $firstName." ".$lastName;

			echo "<option value=\"$subjectID\">$fullName</option>";
		}
	}

	/***********************************
	****** Here ends DB functions ******
	***********************************/
/*
	function userExists($userName, $password) {
		if (($userName == "nick" || $userName == "tom") && $password == "password") {
			return true;
		}
		return false;
	}

	function isAdmin($userName) {
		if ($userName == "nick") {
			return true;
		} else {
			return false;
		}
	}
	
	// When checking names, remember to check non-case sensitive!
	function subjectAlreadyExists($firstName, $lastName, $dateOfBirth, $sex) {
		if ($firstName == "Tim" && $lastName == "Lambert") {
			return true;
		} else {
			return false;
		}
	}

	function relationshipAlreadyExists($practitioner, $subject) {
		if ($practitioner == "1") {
			return true;
		} else {
			return false;
		}
	}

	function practitionerAlreadyExists($firstName, $lastName) {
		if ($firstName == "Tim" && $lastName == "Lambert") {
			return true;
		} else {
			return false;
		}
	}
*/
?>