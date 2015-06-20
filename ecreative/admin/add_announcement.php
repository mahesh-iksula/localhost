<?php 
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['a_title']) && $_POST['a_title']!='' ){
$query="INSERT INTO `announcement` (`a_title`, `a_detail`, `datentime`) ";
$query.="VALUES ('".$_POST['a_title']."', '".$_POST['a_detail']."', '$datentime' ) ";
if(mysql_query($query)==true){echo'Successfully Recorded <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> ';}else{mysql_error();}
}
else{

$query="SELECT * FROM `faqs_cat` ";
$result=mysql_query($query);

echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Announcement</th>
	</tr>
	<tr>
		<td style="width: 150px;">Announcement Title</td>
		<td><input name="a_title" type="text" style="width: 620px;" ></td>
	</tr>
	<tr>
		<td style="width: 150px;">Answer</td>
		<td><textarea cols="20" name="a_detail" rows="2" ></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>

</form></div>
';}
include('includes/footer.php');

}?>
