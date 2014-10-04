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
		$regQueries = "SELECT * FROM Practitioners;";
		$practitioners = odbc_exec($conn,$regQueries);
		
		while(odbc_fetch_row($practitioners)) {
			$dbUser = odbc_result($practitioners,"Username"));
			$dbPass = odbc_result($practitioners,"Password"));
			
			if ($dbUser == $userName && $dbPass == $password) {
				return true;
			}
		}
		return false;
	}

	function isAdmin($userName, $conn) {
		$regQueries = "SELECT * FROM Practitioners WHERE Administrator = true;";
		$administrators = odbc_exec($conn,$regQueries);
		
		while(odbc_fetch_row($administrators)) {
			$dbUser = odbc_result($administrators,"Username"));
			
			if ($dbUser == $userName) {
				return true;
			}
		}
		return false;
	}

	function displaySubjects($conn, $isAdmin) {
		if ($isAdmin) {
			$regQueries = "SELECT * FROM Subjects;";
		} else {
			// TODO: Make a query that searches for subjects that are related to the practitioner that is currently logged in.
			$regQueries = "SELECT * FROM Subjects WHERE"
		}
		$subjects = odbc_exec($conn,$regQueries);
		
		echo "<table class=\"form-table\">
			<th>
				<td>Subject_ID</td>
				<td>FirstName</td>
				<td>LastName</td>
				<td>BirthDate</td>
				<td>Sex</td>
			</th>";
		while(odbc_fetch_row($subjects)) {
			$subjectID = odbc_result($subjects,"Subject_ID"));
			$firstName = odbc_result($subjects,"FirstName"));
			$lastName = odbc_result($subjects,"LastName"));
			$birthDate = odbc_result($subjects,"BirthDate"));
			$sex = odbc_result($subjects,"Sex"));

			echo "<tr>
					<td>$subjectID</td>
					<td>$firstName</td>
					<td>$lastName</td>
					<td>$birthDate</td>
					<td>$sex</td>
					<td><form id=\"fallsData\" onSubmit=\"!!!!!!!SOMETHING!!!!!!!!\" method=\"POST\" action=\"./fallsData.php\">
							<input type=\"submit\" id=\"fallsDataSubmit\" value=\"View Falls Data\"/></td>
						</form></td>
					<td><form id=\"editSubject\" method=\"POST\" action=\"./editSubjects.php\">
							<input type=\"submit\" id=\"editSubjectSubmit\" value=\"Edit\"/></td>
						</form></td>
					<td><form id=\"deleteSubject\" onSubmit=\"return confirm('Are you sure?');\" method=\"POST\" action=\"./viewSubjects.php\">
							<input type=\"submit\" id=\"deleteSubjectSubmit\" value=\"Delete\"/></td>
						</form></td>
				  </tr>";			
		}
		echo "</table>"
	}

	/***********************************
	****** Here ends DB functions ******
	***********************************/

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
?>