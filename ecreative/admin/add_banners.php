<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['bannername']) && $_POST['bannername']!='' ){
$pic= $_FILES['bannersimg']['name'];
$extnssion=$_FILES['bannersimg']['type'];
if($extnssion=='image/jpeg' || $extnssion=='image/png' ){
$error=1; }else{
$error=0;
}
$uploadedfile=$_FILES['bannersimg']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
list($width,$height)=getimagesize($uploadedfile);
$newwidthb=920;
$newheightb=($height/$width)*$newwidthb;
$tmpb=imagecreatetruecolor($newwidthb,$newheightb); 
// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmpb,$src,0,0,0,0,$newwidthb,$newheightb,$width,$height);
// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filenameb = "../images/banners/". $_FILES['bannersimg']['name'];
imagejpeg($tmpb,$filenameb,100);
imagedestroy($src);
imagedestroy($tmpb);
// NOTE: PHP will clean up the temp file it created when the requests
// has completed.
$query="INSERT INTO `banners` (`bannername`, `bannersimg`, `datentime`) ";
$query.="VALUES ('".$_POST['bannername']."', '$pic', '$datentime' ) ";
if(mysql_query($query)==true){echo'Successfully Recorded <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> ';}else{mysql_error();}
}
else{
echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Banners</th>
	</tr>
	<tr>
		<td style="width: 150px;">Banner Name</td>
		<td><input name="bannername" type="text"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Banners Img</td>
		<td><input name="bannersimg" type="file"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>

</form></div>
';}
include('includes/footer.php');
}
?>
