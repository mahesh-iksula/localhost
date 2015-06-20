<?php 
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['a_title']) && $_POST['a_title']!='' ){
$query="UPDATE `$myDB`.`announcement` SET `a_title` = '".$_POST['a_title']."', `a_detail`='".$_POST['a_detail']."', `datentime` ='$datentime' WHERE a_id=".$_POST['id'];

if(mysql_query($query)==true){echo'Successfully Recorded <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> ';}else{mysql_error();}
}
else{

$query="SELECT * FROM announcement WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Announcement</th>
	</tr>
	<tr>
		<td style="width: 150px;">Announcement Title</td>
		<td><input name="id" type="hidden" value="'.$row['a_id'].'"><input name="a_title" value="'.$row['a_title'].'" type="text" style="width: 620px;" ></td>
	</tr>
	<tr>
		<td style="width: 150px;">Answer</td>
		<td><textarea cols="20" name="a_detail" rows="2" >'.$row['a_detail'].'</textarea></td>
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
