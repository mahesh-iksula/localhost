<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['departmentname']) && $_POST['departmentname']!=''){

$query="INSERT INTO `department` (`departmentname`, `datentime`) VALUES ('".$_POST['departmentname']."', '$datentime'); ";
$result=mysql_query($query);
if($result==true){echo 'Brand "'.$_POST['departmentname'].'" added sucessfully<br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> '; } else{ echo 'Error creating "'.$_POST['departmentname'].'" brand'; }

}
else{
echo '<div id="container" >

<form method="POST" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Department</th>
	</tr>
	<tr>
		<td style="width: 150px;">Department Name</td>
		<td><input name="departmentname" type="text" /></td>
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
