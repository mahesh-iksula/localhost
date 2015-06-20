<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['url']) && $_POST['url']!=''){

//$_FILES['uploadfile']['name']=str_replace('_', ' ', $_FILES['uploadfile']['name']);

// This is the temporary file created by PHP
$pic= $_FILES['uploadfile']['name'];

$extnssion=$_FILES['uploadfile']['type'];

if($extnssion=='image/jpeg' || $extnssion=='image/png' ){
$error=1; }else{
$error=0;
}
$uploadedfile=$_FILES['uploadfile']['tmp_name'];


$src = imagecreatefromjpeg($uploadedfile);
list($width,$height)=getimagesize($uploadedfile);
$newwidthb=250;
$newheightb=($height/$width)*$newwidthb;
$tmpb=imagecreatetruecolor($newwidthb,$newheightb); 

$newwidth=380;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight); 
// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmpb,$src,0,0,0,0,$newwidthb,$newheightb,$width,$height);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filenameb = "../images/logos/". $_FILES['uploadfile']['name'];
$filename = "../images/logos/original/". $_FILES['uploadfile']['name'];
imagejpeg($tmpb,$filenameb,100);
imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.


$query="INSERT INTO `site` (`url`, `logo`, `sitename`, `title`, `keyword`, `person`, `aboutus`, `contactno`, `contactno2`, `mobile`, `address`, `address2`, `pin`, `city`, `state`, `email`, `status`) ";
$query.="VALUES ('".$_POST['url']."', '".$pic."', '".$_POST['sitename']."', '".$_POST['title']."', '".$_POST['keyword']."', '".$_POST['person']."', '".$_POST['aboutus']."', '".$_POST['contactno']."', '".$_POST['contactno2']."', '".$_POST['mobile']."', '".$_POST['address']."', '".$_POST['address2']."', '".$_POST['pin']."', '".$_POST['city']."', '".$_POST['state']."', '".$_POST['email']."', '0'); ";
if(mysql_query($query)==true){echo $_POST['url'].' added sucessfully';}else{mysql_error();}

echo '<a href="add_site.php">Back</a>';
}
else{
echo '<div id="container" >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" class="floatl" style="width: 50%; border-collapse: collapse;" >
	<tr>
		<th colspan="4">Site Details</th>
	</tr>
	<tr>
		<td>Site URL</td>
		<td>www.<input name="url" type="text"></td>
		<td></td>
		<td></td>

	</tr>
	<tr>
		<td>Logo</td>
		<td><input name="uploadfile" type="file"><br />
		*.png formats only</td>
		<td>Site Name</td>
		<td><input name="sitename" type="text" maxlength="100" ></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><input name="title" type="text" maxlength="200" ></td>
		<td>Keywords</td>
		<td><input name="keyword" type="text" maxlength="200" ></td>
	</tr>
	<tr>
		<th colspan="4">Contact Details</th>
	</tr>
	<tr>
		<td>Owner \ Contact person name</td>
		<td colspan="3"> <input name="person" type="text" maxlength="50" ></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><input name="address" type="text" maxlength="100" ></td>
		<td>Pin</td>
		<td><input name="pin" type="text" maxlength="6" ></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="address2" type="text" maxlength="100" ></td>
		<td>City</td>
		<td><input name="city" type="text" maxlength="20" ></td>

	</tr>
	<tr>
		<td>State</td>
		<td colspan="3"><input name="state" type="text" maxlength="20" ></td>
	</tr>
	<tr>
		<td>Contact No</td>
		<td><input name="contactno" type="text" maxlength="20" ></td>
		<td>&nbsp;</td>
		<td><input name="contactno2" type="text" maxlength="20" ></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td><input name="mobile" type="text" maxlength="10" ></td>
		<td>Email</td>
		<td><input name="email" type="text" maxlength="50" ></td>
	</tr>
	<tr>
		<td></td>
		<td><input name="Submit1" type="submit" value="submit" /><input name="Reset1" type="reset" value="reset"></td>
		<td></td>
		<td></td>
	</tr>
</table>
</form></div>';}
include('includes/footer.php');
}
?>