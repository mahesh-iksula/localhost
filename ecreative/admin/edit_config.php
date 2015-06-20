<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');



if(isset($_POST['title']) && $_POST['title']!='' ){


$newimg=($_FILES['uploadfile']['name']);
if($newimg==''){$img=$_POST['uploadfile_old'];}
else{$img=$_FILES['uploadfile']['name'];

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






}


$query="UPDATE `config` ";
$query.="SET model='".$_POST['title']."', brandid='".$_POST['brand']."', pdflink='".$_POST['pdflink']."', pimg='".$img."', discription='".$_POST['discription']."', purl='".$_POST['purl']."' ";
$query.="WHERE `cid`=".$_POST['id'];
$result=mysql_query($query);
if($result==true){echo 'Updated Sucessfully'; } else{ echo 'Error '; }

}
else{
$query="SELECT * FROM `config`, `brand` WHERE `config`.`brandid`=`brand`.`brandid` and `config`.".$_SERVER['QUERY_STRING']." ";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div class="container"  >';
echo'<form action="" enctype="multipart/form-data" method="post" >';
echo '<table cellpadding="0" cellspacing="0" style="width: 100%; float:left">
	<tr>
		<th colspan="2">Add Product</th>
	</tr>
	<tr>
		<td>Brand</td>
		<td>';
$brandq="SELECT * FROM `brand` ORDER BY `brandname` ASC ";
$brandr=mysql_query($brandq);
echo'		<select name="brand" style="width: 200px">';
echo'		<option value="'.$row['brandid'].'"  selected="selected">'.$row['brandname'].'</option>
			<option value="0">Select</option>';
while($brow=mysql_fetch_array($brandr)){
echo'		<option value="'.$brow['brandid'].'">'.$brow['brandname'].'</option>';
}
echo'		</select> <br />
		<span style="font-size:10px;">Brand name eg. Sennheiser</span></td>
	</tr>

	</table><br />
<table cellpadding="0" cellspacing="0" style="width:100%; float:left">
	<tr>
		<td style="width: 150px;">Product Name</td>
		<td><input name="id" type="hidden" value="'.$row['cid'].'"><input name="title" type="text" style="width: 620px;" value="'.$row['model'].'" />&nbsp;<br />		<span style="font-size:10px;">Product name eg. Professional Headphones EH 150</span></td></td>
	</tr>
<!-- 	<tr>
		<td>MRP</td>
		<td><input name="mrp" type="text" style="width: 620px;" value="'.$row['mrp'].'" />&nbsp;</td>
	</tr>
	<tr>
		<td>Offer Price</td>
		<td><input name="ourprice" type="text" style="width: 620px;" value="'.$row['price'].'" />&nbsp;</td>
	</tr> -->
	<tr>
		<td>PDF Link</td>
		<td><input name="pdflink" type="text" style="width: 620px;" value="'.$row['pdflink'].'" />&nbsp;<br />
		<span style="font-size:10px;">*.PDF File Link eg. http://www.example.com/Professional_Headphones_EH_150.pdf</span></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><input name="uploadfile_old" type="hidden" value="'.$row['pimg'].'" /><input name="uploadfile" type="file" />&nbsp;<br />
		<span style="font-size:10px;">*.jpg or *.jpeg formats only. </span>
		</td>
	</tr>
	<tr>
		<td>Product Link</td>
		<td><input name="purl" type="text" style="width: 620px;" value="'.$row['purl'].'" />&nbsp;<br />
		<span style="font-size:10px;">Link eg. http://www.example.com/Professional_Headphones_EH_150.html</span></td>
	</tr>
<!-- 	<tr>
		<td valign="top">Product Discription</td>
		<td><textarea cols="20" style="width: 625px; height: 180px;" name="discription" rows="4">'.$row['discription'].'</textarea></td> -->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" /><br />
<br />
<br />
<br />
&nbsp;</td>
	</tr>
</table></form>
';
echo'</div>';}
include('includes/footer.php');
}
?>
