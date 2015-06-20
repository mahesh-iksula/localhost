<?php 
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_GET['mcat']) && $_GET['mcat']!='' ){
$query="SELECT * FROM `scat` WHERE `mcatid` = ".$_GET['mcat']." ";
$result=mysql_query($query);
echo '<form method="post" action="add_config.php"> 
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Select Sub Category</th>
	</tr>
	<tr>
		<td style="width: 150px;">Select Sub Category</td>
		<td><select name="scat" style="width: 200px; padding:5px;">
		<option value="" selected="true">Select</option>';
while($row=mysql_fetch_array($result)){
echo'		<option value="'.$row['scatid'].'">'.$row['scatname'].'</option>';
}
echo'
</select>&nbsp;<input name="mcathid" type="hidden" value="'.$_GET['mcat'].'" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>';
//}




}
else{
echo '<div class="container"  >
<form method="GET" action="">

<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Select Category first</th>
	</tr>
	<tr>
		<td style="width: 150px;">Select Category</td>
		<td>
		<select name="mcat" style="width: 200px; padding:5px;" onchange=\'this.form.submit()\'>
		<option value="" selected="true">Select</option>
		<option value="1">Laptops</option>
		<option value="2">Desktop</option>
		<option value="3">Component</option>';
echo'		</select>&nbsp;</td>
	</tr>
</table>
</form></div>
';}
include('includes/footer.php');

}
?>