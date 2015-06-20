<?php 
 include('includes/meta.php');
include_once('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_GET['mcat']) && $_GET['mcat']!='' && isset($_GET['scatname']) && $_GET['scatname']!='' ){

$query="INSERT INTO `scat` (`mcatid`, `scatname`) VALUES ('".$_GET['mcat']."', '".$_GET['scatname']."'); ";
$result=mysql_query($query);
if($result==true){echo 'Brand "'.$_GET['scatname'].'" added sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> '; } else{ echo 'Error creating "'.$_GET['scatname'].'" brand'; }

}
else{
$query="SELECT * FROM `mcat` "; //WHERE ".$_SERVER['QUERY_STRING']." 
$result=mysql_query($query);

echo '<div id="container" >

<form method="GET" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Category *</td>
		<td><select name="mcat" style="width: 200px; padding:5px;">
		<option value="" selected="true">Select</option>';
while($row=mysql_fetch_array($result)){
echo '<option value="'.$row['mcatid'].'">'.$row['mcatname'].'</option>';
		}
echo '</select></td>
	</tr>
	<tr>
		<td style="width: 150px;">Name *</td>
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
