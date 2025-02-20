"use strict";

window.onload = pageLoad;

function pageLoad() {
	document.getElementById("user").onchange = checkUsername; 
	document.getElementById("pass").onchange = checkPassword; 
}

// Username must be 6 characters, 4 letters followed by 2 numbers
function checkUsername(event) {
	var username = document.getElementById('user').value;

	var patternU = /^[A-Za-z0-9]+$/;  // 4 letters followed by 2 numbers
	if (username === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = patternU.test(username);
    
	if (result == false) {
		alert("Invalid username. No special characters or spaces");
		document.getElementById("user").value = "";
		document.getElementById("user").select();
		return false;
    }
}

// Password must be 6 characters, 4 letters followed by 2 numbers
function checkPassword(event) {
	var pass = document.getElementById('pass').value;
	
	var patternP = /^[A-Za-z]{4}\d{2}$/;  // no special characters
	if (pass === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = patternP.test(pass);
    
	if (result == false) {
		alert("Invalid password. Should be 4 letters followed by 2 numbers (e.g., abCD34).");
		document.getElementById("pass").value = "";
		document.getElementById("pass").select();
		return false;
    }
}