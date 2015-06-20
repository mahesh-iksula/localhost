<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['brandname']) && $_POST['brandname']!='' ){
if( !$_FILES['brandlogo']['name'] == ''){ $pic= $_FILES['brandlogo']['name'];

$extnssion=$_FILES['brandlogo']['type'];
if($extnssion=='image/jpeg' || $extnssion=='image/png' ){
$error=1; }else{
$error=0;
}
$uploadedfile=$_FILES['brandlogo']['tmp_name'];
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
$filenameb = "../images/brands/". $_FILES['brandlogo']['name'];
$filename = "../images/brands/thumb/". $_FILES['brandlogo']['name'];
imagejpeg($tmpb,$filenameb,100);
imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the requests
// has completed.
}

else{ echo 'Image Not Attached <br />' ;   }


$query="INSERT INTO `brand` (`brandname`, `brandimg`, `title_txt`, `brand_txt`, `url`, `employee_id`, `datentime`) ";
$query.="VALUES ('".$_POST['brandname']."', '$pic', '".$_POST['titletxt']."', '".$_POST['abt_brand']."', '".$_POST['URL']."', '".$_POST['employee_id']."', '$datentime' ) ";
if(mysql_query($query)==true){echo'Successfully Recorded <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Brand</a> ';}else{mysql_error();}
}
else{
echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Name</td>
		<td><input name="brandname" type="text"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Brand Logo</td>
		<td><input name="brandlogo" type="file"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Creative Text</td>
		<td><textarea cols="20" name="titletxt" rows="2" ></textarea></td>
	</tr>
	<tr>
		<td style="width: 150px;">About Brand</td>
		<td><textarea cols="20" name="abt_brand" rows="2"></textarea></td>
	</tr>
	<tr>
		<td style="width: 150px;">URL</td>
		<td><input name="URL" type="text"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Manager Name</td>
		<td>';
		
$tcatq="SELECT * FROM `employees` ";
$tcatqr=mysql_query($tcatq);
echo'		<select name="employee_id" style="width: 200px">
			<option value="0" selected="selected">Select</option>';
while($row=mysql_fetch_array($tcatqr)){
echo'		<option value="'.$row['employee_id'].'">'.$row['emp_name'].' '.$row['emp_lastname'].' </option>';
}
echo'		</select>		
		</td>
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
