<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['emp_name']) && $_POST['emp_name']!=''){
$query="UPDATE `employees` ";
$query.="SET `emp_name` = '".$_POST['emp_name']."', `emp_px` = '".$_POST['emp_px']."', `emp_lastname` = '".$_POST['emp_lastname']."', `email` = '".$_POST['email']."', `employeeid` = '".$_POST['employeeid']."', `cellno` = '".$_POST['cellno']."', `department` = '".$_POST['department']."', `datentime`='$datentime' ";
$query.="WHERE employee_id='".$_POST['id']."'";
if(mysql_query($query)==true){echo 'Record updated sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> '; } else{ echo 'Error creating "'.$_POST['scatname'].'" brand'; }
}
else{
$query="SELECT * FROM `employees` WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >

<form method="POST" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Department</th>
	</tr>
	<tr>
		<td style="width: 150px;">Employee Name</td>
		<td><input name="id" type="hidden" value="'.$row['employee_id'].'"><input name="emp_name" type="text" value="'.$row['emp_name'].'" /> <input name="emp_px" type="text" size="1" value="'.$row['emp_px'].'" /> <input name="emp_lastname" type="text" value="'.$row['emp_lastname'].'" /></td>
	</tr>
<!-- 	<tr>
		<td style="width: 150px;">Initial</td>
		<td></td>
	</tr>
	<tr>
		<td style="width: 150px;">Last Name</td>
		<td></td>
	</tr> -->
	<tr>
		<td style="width: 150px;">Employee ID</td>
		<td><input name="employeeid" type="text" value="'.$row['employeeid'].'" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Email</td>
		<td><input name="email" type="text" value="'.$row['email'].'" /></td>
	</tr>
<!-- 	<tr>
		<td style="width: 150px;">Password</td>
		<td><input name="password" type="text" /></td>
	</tr> -->
	<tr>
		<td style="width: 150px;">Cell No</td>
		<td><input name="cellno" type="text" value="'.$row['cellno'].'" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Select Department</td>
		<td><select name="department"> 
		<option value="'.$row['department'].'" selected="selected">Change</option>';
		$query="SELECT * FROM department";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
echo '<option value="'.$row['department_id'].'">'.$row['departmentname'].'</option>';
		}
		echo'</select></td>
	</tr>

<!-- 	<tr>
		<td style="width: 150px;">Joining Date</td>
		<td><input name="joing_date" type="text" value="'.$row[''].'" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Birth Date</td>
		<td><input name="birthdate" type="text" value="'.$row[''].'" /></td>
	</tr> -->
<!-- 	<tr>
		<td style="width: 150px;">Hobbis</td>
		<td><input name="birthdate" type="text" /></td>
	</tr> -->
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
