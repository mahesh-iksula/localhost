<?php 
	
	include('includes/meta.php');
include_once('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['pagename']) && $_POST['pagename']!=''){

$query="UPDATE `pages` ";
$query.="SET pagename= '".$_POST['pagename']."', pagetitle= '".$_POST['pagetitle']."', `page_txt` = '".$_POST['page_txt']."', `datentime`='$datentime' ";
$query.=" WHERE pageid='".$_POST['id']."'";

if(mysql_query($query)==true){echo 'Record updated sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> '; } else{ echo 'Error '; }
}
else{
$query="SELECT * FROM `pages` WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >

<form method="POST" action="">
<table cellpadding="0" cellspacing="0" style=" float:left;">
	<tr>
		<th colspan="2">Add Pages</th>
	</tr>
	<tr>
		<td style="width: 150px;">Pages Name *</td>
		<td><input name="id" type="hidden" value="'.$row['pageid'].'" /><input name="pagename" type="text" value="'.$row['pagename'].'" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Page Title*</td>
		<td><input name="pagetitle" type="text" value="'.$row['pagetitle'].'"  /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Page Discription *</td>
		<td><textarea cols="20" name="page_txt" rows="2" >'.$row['page_txt'].'</textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>

</form>

</div>
';}
include('includes/footer.php');
}
?>
