<?php 
include('includes/meta.php');

echo'
</head>

<body>

';
include('includes/header.php');



echo '
<!-- container starts here -->
<div id="container" >';
	include('includes/laft_panel.php');


echo'<div class="conteint">';

echo '<img src="images/careers.jpg" />';

if (isset($_POST['name']) && !empty($_POST['name']) && ($_POST['candidateemail'])){

//define the receiver of the email
$to = 'hr@ecreativeindia.com';

//define the subject of the email
$subject = 'Application from '.$_POST['name'];

//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));

//define the headers we want passed. Note that they are separated with \r\n
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
//add boundary string and mime type specification
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Info Ecreative <info@ecreativeindia.com>' . "\r\n";
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks


//define the body of the message.
ob_start(); //Turn on output buffering

$msg='<h3>Candidate Details</h3>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name:</td>
    <td>'.$_POST['name'].'</td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td>'.$_POST['dob'].'</td>
  </tr>
  <tr>
    <td>Cell Phone</td>
    <td>'.$_POST['cell'].'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$_POST['candidateemail'].'</td>
  </tr>
  <tr>
    <td>Apply for position</td>
    <td>'.$_POST['designation'].'</td>
  </tr>
  <tr>
    <td>Year of Experience</td>
    <td>'.$_POST['yexp'].'</td>
  </tr>
  <tr>
    <td>Brief Profile</td>
    <td>'.$_POST['profile'].'</td>
  </tr>
</table>
';
    ob_clean();
    flush();
    readfile($file);
if(mail($to,$subject,$msg,$headers)==true){
echo '<h4>Thank you!!</h4>';
}else{
echo '<h4>Error! Sending your mail</h4>';	
}

}else{
echo 'Please provide Name and valid email.';

}


echo'

</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
