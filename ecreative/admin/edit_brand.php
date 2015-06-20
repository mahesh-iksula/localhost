<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['brandname']) && $_POST['brandname']!='' ){

$pic=$_POST['brandnamen'];
if(isset($_FILES['brandlogo']['name']) && $_FILES['brandlogo']['name']==''){

}else{
$pic= $_FILES['brandlogo']['name'];
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
$query="UPDATE `brand` ";
$query.="SET brandname= '".$_POST['brandname']."', `brandimg` = '$pic', `title_txt` = '".$_POST['titletxt']."', `brand_txt` = '".$_POST['abt_brand']."', `employee_id`='".$_POST['employee_id']."',`url` = '".$_POST['URL']."', `datentime`='$datentime' ";
$query.="WHERE brandid='".$_POST['id']."'";
if(mysql_query($query)==true){echo 'Record updated sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> '; } else{ echo 'Error'; }

}
else{

$query="SELECT * FROM brand WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);


echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Name</td>
		<td><input name="id" type="hidden" value="'.$row['brandid'].'"><input name="brandname" type="text" value="'.$row['brandname'].'"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Brand Logo</td>
		<td><input name="brandnamen" type="hidden" value="'.$row['brandimg'].'"><input name="brandlogo" type="file"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Creative Text</td>
		<td><textarea cols="20" name="titletxt" rows="2" >'.$row['title_txt'].'</textarea></td>
	</tr>
	<tr>
		<td style="width: 150px;">About Brand</td>
		<td><textarea cols="20" name="abt_brand" rows="2">'.$row['brand_txt'].'</textarea></td>
	</tr>
	<tr>
		<td style="width: 150px;">URL</td>
		<td><input name="URL" type="text" value="'.$row['url'].'"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Manager Name</td>
		<td>';
$tcatqr=mysql_query('SELECT * FROM `employees` ');
echo'		<select name="employee_id" style="width: 200px">
<option value="'.$row['employee_id'].'">Change</option>
';
while($emprow=mysql_fetch_array($tcatqr)){
echo'		<option value="'.$emprow['employee_id'].'">'.$emprow['emp_name'].' '.$emprow['emp_lastname'].' </option>';
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
