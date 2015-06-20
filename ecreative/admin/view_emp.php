<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');

$query="SELECT * FROM `employees`,department WHERE employees.department=department.department_id and ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Department</th>
	</tr>
	<tr>
		<td style="width: 150px;">Employee Name</td>
		<td>'.$row['emp_name'].' '.$row['emp_px'].' '.$row['emp_lastname'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Employee ID</td>
		<td>'.$row['employeeid'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Email</td>
		<td>'.$row['email'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Cell No</td>
		<td>'.$row['cellno'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Select Department</td>
		<td>'.$row['departmentname'].'</td>
	</tr>
</table>
</div>
';
include('includes/footer.php');
}
?>
