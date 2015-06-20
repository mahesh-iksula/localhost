
<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
if(isset($_GET['scatname']) && $_GET['scatname']!='' ){

$query="INSERT INTO `scat` (`scatname`) VALUES ('".$_GET['scatname']."'); ";
$result=mysql_query($query);
if($result==true){echo 'Brand "'.$_GET['scatname'].'" added sucessfully'; } else{ echo 'Error creating "'.$_GET['scatname'].'" brand'; }

}
else{
$query="SELECT * FROM `scat` WHERE ".$_SERVER['QUERY_STRING']." ";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
echo '<div class="container"  >
<form method="GET" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Name</td>
		<td><input name="scatname" type="text" value="'.$row['scatname'].'"></td>
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
