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


function validateFormOnSubmit(theForm) {
var reason = "";
  reason += validateName(theForm.name);
  reason += validateMobile(theForm.cell);
  reason += validateEmail(theForm.candidateemail);
//  reason += validateCV(theForm.file);
  
  if (reason != "") {

alert("Some fields need correction:\n" + reason);
    return false;
  }

 // alert("All fields are filled correctly");
  //return false;

}
function validateName(fld) {
    var error = "";
    var illegalChars = /\a-z/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px'; 
        error = "You didn't enter a Name.\n";
    } else if (illegalChars.test(fld.value)) {        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px'; 
        error = "The name contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}	
function validateMobile(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/, '');    

   if (fld.value == "") {
        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px'; 
        error = "You didn't enter a mobile number.\n";
    } else if (isNaN(parseInt(stripped))) {
        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px'; 
        error = "The mobile number contains illegal characters.\n";
    } else if (!(stripped.length == 10)) {
        fld.style.background = 'lightyellow';
        error = "The mobile number is the wrong length. Make sure you included an area code.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;

}
function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
}
function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
   
    if (fld.value == "") {
        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px';
        error = "You didn't enter an email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px';
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {        fld.style.background = 'lightyellow';
        fld.style.border = '1px solid #7f9db9';
        fld.style.fontsize = '12px';
        fld.style.padding = '1px 2px 2px 0px';
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}


/* Support Problem & Problem Type */
function nullOptionsDMA(aMenu){
var tot=aMenu.options.length
for (i=0;i<tot;i++)
{
aMenu.options[i]=null
}
aMenu.options.length=0;
}

function MySubjectDMA0(aMenu){
nullOptionsDMA(aMenu)
with (aMenu){
options[0]=new Option("Select", "");
options[1]=new Option("No Display", "No Display");
options[2]=new Option("No Power", "No Power");
options[3]=new Option("PC Restarting", "PC Restarting");
options[4]=new Option("BLUE Screen(Fatal Error)", "BLUE Screen(Fatal Error)");
options[5]=new Option("System Hanging", "System Hanging");

options[0].selected=true
}
}

function MySubjectDMA1(aMenu){
nullOptionsDMA(aMenu)
with (aMenu){
options[0]=new Option("No Warranty **", "No Warranty **");
options[0].selected=true
}
}
function goDMA(aMenu){
if (aMenu.options.value!="none")
{
location=aMenu.options[aMenu.selectedIndex].value
}
}
function setUpDMA(){
with (document.demo) {
if (problem.selectedIndex==0){
problem.options[0].selected=true
//typporb.options[0].selected=true
}
if (problem.selectedIndex==1)
MySubjectDMA0(typporb)
if (problem.selectedIndex==2)
MySubjectDMA1(typporb)
}
}
function changeFilesDMA(){
aMenu=document.demo.problem
aMenu2=document.demo.typporb
with (aMenu){
switch (selectedIndex) {
case 0:
aMenu2.options.length=0;
aMenu2.options[0]=
aMenu2.options[0].selected=true;
history.go(0)
break
case 1:
MySubjectDMA0(aMenu2)
aMenu2.options[0].text="Select"
break
case 2:
MySubjectDMA1(aMenu2)
aMenu2.options[0].text="No Warranty **"

break
}
}
}