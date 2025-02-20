"use strict";

window.onload=pageLoad;
function pageLoad(){
	document.getElementById("wait").onchange = checkWaitTime; 
}

function checkWaitTime() {
	var waitTime = document.getElementById('wait').value;
	
	var pattern1 = /\d{2}:\d{2}:\d{2}/;
	if (waitTime === "") {
        // Skip validation if the field is empty
        return;
    }
	var result = pattern1.test(waitTime);
    
	if (result==false) 
	{
		alert("Invalid wait Format. Should be HH:MM in 24hr format");
		document.getElementById("wait").value = "";
		document.getElementById("wait").select();
		return false;
	}
	
}