// Function checks if text typed in a name field is in a valid name syntax
function  validUsername() {
	var userName = document.getElementById('userName');			
	var regex = /^[a-zA-Z][a-zA-Z\-\_]*[a-zA-Z]*$/;
	// If the captured username does not match the regex pattern, display an error message in red, and return false as an "error code".
	if (!regex.test(userName.value)) {
		document.getElementById('userNameError').innerHTML = 'The name entered is not valid. Your username must start and end with an alphabet, and only "-" and "_" symbols are allowed.';
		document.getElementById('userNameError').style.color = 'red';
		return false;
	// If the captured username matches the regex pattern, clear any error messages if they are present, and return true as a "success code".
	} else {
		document.getElementById('userNameError').innerHTML = '';
		return true;
	}
}

// Function checks if text typed in a name field is in a valid name syntax
function  validPassword() {
	var password = document.getElementById('password');			
	var regex = /^[a-zA-Z][a-zA-Z\-\_]*[a-zA-Z]*$/;
	// If the captured password does not match the regex pattern, display an error message in red, and return false as an "error code".
	if (!regex.test(password.value)) {
		document.getElementById('passwordError').innerHTML = 'The password entered is not valid. Your password must start and end with an alphabet, and only "-" and "_" symbols are allowed.';
		document.getElementById('passwordError').style.color = 'red';
		return false;
	// If the captured password matches the regex pattern, clear any error messages if they are present, and return true as a "success code".
	} else {
		document.getElementById('passwordError').innerHTML = '';
		return true;
	}
}

// Function checks if all field checks have been satisfied. If yes, proceed. If not, deny progress, and popup with an alert message. 
// This function is run upon pressing of the submit button.
function validInfo() {
	// Check that all field verification functions have returned true as success codes. If not, cause an alert popup box to appear with an error message, 
	// and return false to prevent redirection of the page to the "successful registration page"
	if (!(validUserName() && validPassword())) {
		alert("Please fix any errors in your provided information before we proceed with registration.");
		return false;
	// If the field verification functions have all returned true, the user's input is valid and we allow him to proceed to the "successful registration page"
	} else {
		return true;
	}
}