"use strict"
window.onload = pageLoad; 

function pageLoad(){
	document.getElementById("user").onblur = validateUsername; 
	document.getElementById("email").onblur = validateEmail; 
	document.getElementById("pass_repeat").onchange = validatePasswordsMatch;
	document.getElementById("user").onchange=checkUsername;
	document.getElementById("email").onchange=checkEmail;
	document.getElementById("fname").onchange=checkFirstName;
	document.getElementById("lname").onchange=checkLastName;
	document.getElementById("pass").onchange=checkPassword;
}

function validateUsername (){
	var username = document.getElementById("user").value; 
	new Ajax.Request ("val_user.php", 
	{
		method: "get",
		parameters: {user:username},
		onSuccess: displayUserResult
	}
	);
}

function validateEmail (){
	var email = document.getElementById("email").value; 
	new Ajax.Request ("val_email.php", 
	{
		method: "get",
		parameters: {email:email},
		onSuccess: displayEmailResult
	}
	);
}

function displayUserResult(ajax){
	$("user_msg").innerHTML=ajax.responseText; 
}

function displayEmailResult(ajax){
	$("email_msg").innerHTML=ajax.responseText; 
}

function validatePasswordsMatch() {
    var password = document.getElementById("pass").value;
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



function checkFirstName() {
	var firstName = document.getElementById('fname').value;
	
	var patternF = /^[a-zA-Z\s\-]+$/;
	if (firstName === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = patternF.test(firstName);
    
	if (result==false) 
	{
		alert("Invalid first name. Should be all letters");
		document.getElementById("fname").value = "";
		document.getElementById("fname").select();
		return false;
	}
}


function checkLastName() {
    var lastName = document.getElementById('lname').value;
	
	var patternL = /^[a-zA-Z\s\-]+$/;
	if (lastName === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = patternL.test(lastName);
    
	if (result==false) 
	{
		alert("Invalid last name. Should be all letters");
		document.getElementById("lname").value = "";
		document.getElementById("lname").select();
		return false;
	}
}


function checkUsername(event) {
	var username = document.getElementById('user').value;

	var patternU = /^[A-Za-z0-9]+$/;  // no special characters
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


//Password must be 6 characters, 2 letters followed by 4 numbers
function checkPassword(event) {
	var pass = document.getElementById('pass').value;
	
	var patternP = /^[A-Za-z]{4}\d{2}$/;  // 4 letters followed by 2 numbers
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


function checkEmail(){
	var email = document.getElementById('email').value;
	
	var patternE = /^[a-zA-Z0-9._]+@gmail\.com$/;
	if (email === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = patternE.test(email);
    
	if (result==false) 
	{
		alert("Invalid email. Should be ______@gmail.com");
		document.getElementById("email").value = "";
		document.getElementById("email").select();
		return false;
	}


}
