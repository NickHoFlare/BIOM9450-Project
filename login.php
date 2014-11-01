<?php
	echo "<div class=\"login-form\">
		<form id=\"registrationForm\" onSubmit=\"return validLoginInfo()\" method=\"POST\" action=\"./verifyLogin.php\">
			<table class=\"form-table\">
		        <tr>
		            <td>Username:</td>
		            <td><input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Username\" onChange=\"validUsername()\"></td>
		            <td id=\"userNameError\"></td>
		        </tr>
		        <tr>
		            <td>Password:</td>
		            <td><input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Password\" onChange=\"validPassword()\"></td>
		            <td id=\"passwordError\"></td>
		        </tr>
		        <tr>
	        		<td><input type=\"submit\" id=\"submit\" value=\"Log in\"/></td>
	        	</tr>
		    </table>
		</form>
	</div>";
?>