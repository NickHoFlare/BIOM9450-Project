<?php
	include("../functions.php");
	session_start(); 
	
	if (isset($_SESSION['userName']) && $_SESSION['isAdmin']) {
		$conn = openConnection();

		$practitioner = $_POST['pracID'];
		$subject = $_POST['subjectID'];

		$sqlQuery = "DELETE FROM Relationships WHERE Prac_ID = $practitioner AND Subject_ID = $subject";
		$result = odbc_exec($conn,$sqlQuery);
		
		header('Location: ./viewRelationships.php');		
	} else {
		echo "You are not authorised to view this page. Please log in.";
		echo '<form id="login" method="POST" action="../index.php">
		<input type="submit" id="loginSubmit" value="Log In"/></td>
		</form>';
	}
?>