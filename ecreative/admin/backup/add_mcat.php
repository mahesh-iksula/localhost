<?php 

	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_GET['scatname']) && $_GET['scatname']!=''){

$query="INSERT INTO `mcat` (`mcatname`, `datentime`) VALUES ('".$_GET['scatname']."', '$datentime'); ";
$result=mysql_query($query);
if($result==true){echo 'Brand "'.$_GET['scatname'].'" added sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> '; } else{ echo 'Error creating "'.$_GET['scatname'].'" brand'; }

}
else{
$query="SELECT * FROM `scat` "; //WHERE ".$_SERVER['QUERY_STRING']." 
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >

<form method="GET" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Master Category</th>
	</tr>
	<tr>
		<td style="width: 150px;">Master Category *</td>
		<td><input name="scatname" type="text" /></td>
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
