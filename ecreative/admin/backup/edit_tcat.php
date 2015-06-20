<?php 

	include('includes/meta.php');
include_once('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['tcatname']) && $_POST['tcatname']!=''){

$query="UPDATE `tcat` ";
$query.="SET scatid= '".$_POST['scat']."', mcatid= '".$_POST['mcat']."', `tcatname` = '".$_POST['tcatname']."', `datentime`='$datentime' ";
$query.="WHERE tcatid='".$_POST['id']."'";
if(mysql_query($query)==true){echo 'Record updated sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> '; } else{ echo 'Error creating "'.$_POST['scatname'].'" brand'; }
}
else{
$query="SELECT * FROM `tcat`,`mcat`, `scat` WHERE `tcat`.`scatid`=`scat`.`scatid` and `tcat`.`mcatid`=`mcat`.`mcatid` and ".$_SERVER['QUERY_STRING'];
echo $query;
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

$mcat="SELECT * FROM mcat ";
$mcatres=mysql_query($mcat);

echo '<div id="container" >

<form method="POST" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Update Category</th>
	</tr>
	<tr>
		<td style="width: 150px;">Master Category *</td>
		<td><select name="mcat" style="width: 200px; padding:5px;">';
		echo '<option value="'.$row['mcatid'].'">'.$row['mcatname'].'</option>
		<option value="'.$row['mcatid'].'">========================</option>';
		while($mcatsrow=mysql_fetch_array($mcatres)){
		echo '<option value="'.$mcatsrow['mcatid'].'">'.$mcatsrow['mcatname'].'</option>';
				} 
		echo '</select></td>
	</tr>
	<tr>
		<td style="width: 150px;">Category *</td>
		<td><select name="scat" style="width: 200px; padding:5px;">';
		echo '<option value="'.$row['scatid'].'">'.$row['scatname'].'</option>
		<option value="'.$row['mcatid'].'">========================</option>';
$scat="SELECT * FROM scat ";
$scatres=mysql_query($scat);

		while($scatsrow=mysql_fetch_array($scatres)){
		echo '<option value="'.$scatsrow['mcatid'].'">'.$scatsrow['scatname'].'</option>';
				} 
		echo '</select></td>
	</tr>
	<tr>
		<td style="width: 150px;">Name *</td>
		<td><input name="id" type="hidden" value="'.$row['tcatid'].'" /><input name="tcatname" type="text" value="'.$row['tcatname'].'" /></td>
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
