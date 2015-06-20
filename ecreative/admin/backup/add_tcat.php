<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_GET['mcat']) && $_GET['mcat']!='' ){


if(isset($_GET['tcatname']) && $_GET['tcatname']!='' && isset($_GET['scat']) && $_GET['scat']!='' ){ 


$query="INSERT INTO `tcat` (`scatid`, `mcatid`, `tcatname`) VALUES ('".$_GET['scat']."', '".$_GET['mcat']."', '".$_GET['tcatname']."'); ";
$result=mysql_query($query);
if($result==true){echo 'Brand "'.$_GET['tcatname'].'" added sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> '; } else{ echo 'Error creating "'.$_GET['tcatname'].'" brand'; }




}else{$query="SELECT * FROM `scat` WHERE `mcatid` = ".$_GET['mcat']." ";
$result=mysql_query($query);
echo '<div id="container" >
<form method="GET" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add t-Sub Category</th>
	</tr>
	<tr>
		<td style="width: 150px;">Select Category</td>
		<td><select name="scat" style="width: 200px; padding:5px;">
		<option value="" selected="true">Select</option>';
while($row=mysql_fetch_array($result)){
echo'		<option value="'.$row['scatid'].'">'.$row['scatname'].'</option>';
}
echo'
</select><input name="mcat" type="hidden" value="'.$_GET['mcat'].'" /></td>
	</tr>
	<tr>
		<td>t-Sub Category Name&nbsp;</td>
		<td><input name="tcatname" type="text" />&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>';
}




}
else{
$query="SELECT * FROM `mcat` "; //WHERE ".$_SERVER['QUERY_STRING']." 
$result=mysql_query($query);

echo '<div id="container"  >
<form method="GET" action="">

<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add t-Sub Category</th>
	</tr>
	<tr>
		<td style="width: 150px;">Select Product</td>
		<td>
<select name="mcat" style="width: 200px; padding:5px;" onchange=\'this.form.submit()\'>
		<option value="" selected="true">Select</option>';
while($row=mysql_fetch_array($result)){
echo '<option value="'.$row['mcatid'].'">'.$row['mcatname'].'</option>';
		}
echo '</select></td>
	</tr>
</table>

</form></div>
';}
include('includes/footer.php');
}
?>