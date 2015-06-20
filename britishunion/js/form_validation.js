function validateForm() {

    var u_name = (document.forms["broke_frm"]["uname"].value).trim();
    var u_email = (document.forms["broke_frm"]["uemail"].value).trim();
    var u_phno = (document.forms["broke_frm"]["umobile"].value).trim();

    var reg_name = /^[a-zA-Z ]*$/;
    var reg_mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var reg_mobile = /^\+?[0-9]{10,10}$/;

    if (u_name == null || u_name == "") {
        alert("Name must be filled out");
        document.getElementById("uname").focus();
        return false;
    }
    if (!(reg_name.test(u_name))){

		alert("Please Enter a valid name");
		document.getElementById("uname").value = "";
        document.getElementById("uname").focus();
        return false;   	
    }
    if (u_email == null || u_email == "") {
        alert("Email ID must be filled out");
        document.getElementById("uemail").focus();
        return false;
    }
    if (!(reg_mail.test(u_email))){

		alert("Please Enter a valid Email ID");
		document.getElementById("uemail").value = "";
        document.getElementById("uemail").focus();
        return false;   	
    }
    if (u_phno == null || u_phno == "") {
        alert("Mobile No. must be filled out");
        document.getElementById("umobile").focus();
        return false;
    }
    if (!(reg_mobile.test(u_phno))){

		alert("Please Enter a valid 10 Digit Mobile Number ");
		document.getElementById("umobile").value = "";
        document.getElementById("umobile").focus();
        return false;   	
    }

    //all validation are true 
    loadXMLDoc(u_name,u_email,u_phno);

    return false;
}
function loadXMLDoc(u_name,u_email,u_phno)
{
var xmlhttp;
var user_nm = u_name;
var user_email = u_email;
var user_phone = u_phno;


    if(window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {   // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            
            var res = xmlhttp.responseText;
            if(res == 1){
                var res_txt = "<span class='responseText'>Thank You for Contacting Us</span>";

            }else{
                var res_txt = "<span class='responseText'>Oops! Something goes Wrong..</span>";                
            }
            document.getElementById("form1").innerHTML= res_txt;
        }
    }
    var url = "post-result.php?id="+user_nm+"&id1="+user_email+"&id2="+user_phone;

xmlhttp.open("GET",url,true);
xmlhttp.send();
}