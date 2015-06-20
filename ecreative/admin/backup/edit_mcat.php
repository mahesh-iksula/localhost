<?php 

	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['mcatname']) && $_POST['mcatname']!=''){

$query="UPDATE `mcat` ";
$query.="SET `mcatname` = '".$_POST['mcatname']."', `datentime`='$datentime' ";
$query.="WHERE mcatid='".$_POST['id']."'";
if(mysql_query($query)==true){echo 'Record updated sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> '; } else{ echo 'Error creating "'.$_POST['scatname'].'" brand'; }
}
else{
$query="SELECT * FROM `mcat` WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >

<form method="POST" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Master Category</th>
	</tr>
	<tr>
		<td style="width: 150px;">Master Category *</td>
		<td><input name="id" type="hidden" value="'.$row['mcatid'].'" /><input name="mcatname" type="text" value="'.$row['mcatname'].'" /></td>
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
