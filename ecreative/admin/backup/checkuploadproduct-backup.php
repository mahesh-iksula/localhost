<?php 

include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
echo '<div class="container"  >
';



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
$newwidthb=220;
$newheightb=($height/$width)*$newwidthb;
$tmpb=imagecreatetruecolor($newwidthb,$newheightb); 

$newwidth=120;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight); 
// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmpb,$src,0,0,0,0,$newwidthb,$newheightb,$width,$height);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filenameb = "../images/products/". $_FILES['uploadfile']['name'];
$filename = "../images/products/thumb/". $_FILES['uploadfile']['name'];
imagejpeg($tmpb,$filenameb,100);
imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.

//if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
$query="INSERT INTO `config` (`model`, `brandid`, `pimg`, `mrp`, `price`,  `discription`,  `datentime` ) ";
$query.="VALUES ('".$_POST['title']."', '".$_POST['brand']."', '".$pic."', '".$_POST['mrp']."', '".$_POST['ourprice']."', '".$_POST['discription']."', '$datentime' ) ";
if(mysql_query($query)==true){echo'Successfully Recorded ';}else{mysql_error();}
//}else{echo 'error uploading';}





echo '</div>';
include('includes/footer.php');
}
?>