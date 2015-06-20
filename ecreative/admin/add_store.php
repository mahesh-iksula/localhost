<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');
if (session_is_registered('un') && session_is_registered('aid') ){
echo'</head> <body>';

include('includes/header.php');
include('includes/leftpanel.php');

if(isset($_POST['st_name']) && !$_POST['st_name']==''){




if(!empty($_FILES['uploadfile']['name'])){

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
$newwidthb=420;
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
$filenameb = "../images/maps/". $_FILES['uploadfile']['name'];
$filename = "../images/maps/thumb/". $_FILES['uploadfile']['name'];
imagejpeg($tmpb,$filenameb,100);
imagejpeg($tmp,$filename,90);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.


}

else{ echo 'Image Not Attached <br />' ;   }


$query= 'INSERT INTO `st_lc` (`st_loc`, `st_name`, `st_add`, `st_add2`, `st_city`, `st_state`, `st_pin`, `st_tel`, `st_mobile`, `st_tel2`, `st_mobile2`,`st_fax`,`st_email`,`st_map`) VALUES (\''.$_POST['st_loc'].'\', \''.$_POST['st_name'].'\', \''.$_POST['st_add'].'\', \''.$_POST['st_add2'].'\', \''.$_POST['st_city'].'\', \''.$_POST['st_state'].'\', \''.$_POST['st_pin'].'\', \''.$_POST['st_tel'].'\', \''.$_POST['st_mobile'].'\', \''.$_POST['st_tel2'].'\', \''.$_POST['st_mobile2'].'\', \''.$_POST['st_fax'].'\',  \''.$_POST['st_email'].'\', \''.$pic.'\')';


echo '<div class="mart10 flaotl txtac">';
if(mysql_query($query)==true) echo'Save Sucessfully'; else print'Error Saving Record, Please Try Again.';
echo '</div>';

}
else{ 
echo '<div id="container" >

<form action="" method="post" enctype="multipart/form-data"  >
<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
		<tbody>
		<tr>
			<td>Store Name:</td>
			<td><input name="st_name" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Store Location:</td>
			<td><input name="st_loc" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><input name="st_add" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input name="st_add2" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input name="st_city" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>State:</td>
			<td><input name="st_state" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>PIN:</td>
			<td><input name="st_pin" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Telephone:</td>
			<td><input name="st_tel" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input name="st_tel2" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td><input name="st_mobile" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>&ensp;</td>
			<td><input name="st_mobile2" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Fax:</td>
			<td><input name="st_fax" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input name="st_email" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input name="uploadfile" type="file" /></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			<input type="submit" name="submit" value="Save" /></td>
		</tr>
	</tbody>
	</table>
</form>';
}




echo '</div>';

}else{
								echo'</head>
<body><div class="login">
							<form action="checklogin.php" method="post">
							<table cellpadding="0" cellspacing="0" class="floatl" >
								<tr>
									<td><label>Username:</label></td>
									<td><input name="username" class="login" type="text" /></td>
								</tr>
								<tr>
									<td><label>Password:</label></td>
									<td><input name="password" class="login" type="password" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><input name="submit" src="images/sprites/source/signin.gif" type="image" value="login" class="loginbtn" /></td>
								</tr>
							</table>
							</form>
							</div>
							';
}
include('includes/footer.php');
?>