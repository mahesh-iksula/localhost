//// JavaScript Document
//
 function validateForm(oForm)
 {
 	//oForm refers to the form which you want to validate
 	oForm.onsubmit = function() // attach the function to onsubmit event
 	{
 		var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 		if(oForm.elements['email'].value.length<1)
 		{
 			alert("You cannot leave the email field empty");
 			return false;
 		}
 		else if(!regex.test(oForm.elements['email'].value))
 		{
 			alert("Invalid email address format");
 			return false;
 		}
 		return true;
 	}
 }


