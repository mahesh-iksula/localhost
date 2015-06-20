<?php 
	
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
$query="SELECT * FROM `department` WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">View Departments</th>
	</tr>
	<tr>
		<td style="width: 150px;">Department</td>
		<td>'.$row['departmentname'].'</td>
	</tr>
</table>
</div>
';
include('includes/footer.php');
}
?>
