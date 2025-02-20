"use strict";

window.onload = pageLoad;

function pageLoad() {
	document.getElementById("new_pass").onchange = checkPassword; 
	document.getElementById("pass_repeat").onchange = validatePasswordsMatch;
}

// Password must be 6 characters, 4 letters followed by 2 numbers
function checkPassword(event) {
	var pass = document.getElementById('new_pass').value;
	
	var patternP = /^[A-Za-z]{4}\d{2}$/;  // 4 letters followed by 2 numbers
	if (pass === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = patternP.test(pass);
    
	if (result == false) {
		alert("Invalid password. Should be 4 letters followed by 2 numbers (e.g., abCD34).");
		document.getElementById("new_pass").value = "";
		document.getElementById("new_pass").select();
		return false;
    }
}

function validatePasswordsMatch() {
    var password = document.getElementById("new_pass").value;
    var confirmPassword = document.getElementById("pass_repeat").value;
	if (pass_repeat === "") {
        // Skip validation if the field is empty
        return;
    }

    if (password !== confirmPassword) {
		alert("Passwords Don't Match.");
		document.getElementById("pass_repeat").value = "";
		document.getElementById("pass_repeat").select();
    }
}