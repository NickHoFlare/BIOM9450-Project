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
/*
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
		$regQueries = "SELECT * FROM Practitioners";
		$results = odbc_exec($conn,$regQueries);
		
		while(odbc_fetch_row($results)) {
			$dbUser = odbc_result($results,"Username"));
			$dbPass = odbc_result($results,"Password"));
			
			if ($dbUser == $userName && $dbPass == $password) {
				return true;
			}
		}
		return false;
	}
*/
	function userExists($userName, $password) {
		if ($userName == "nick" && $password == "password") {
			return true;
		}
		return false;
	}
?>