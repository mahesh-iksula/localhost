<?php 

	include('includes/meta.php');

include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['emp_name']) && $_POST['emp_name']!=''){

$query="INSERT INTO `employees` (`emp_name`, `emp_px`, `emp_lastname`, `employeeid`, `email`, `password`, `joing_date`, `cellno`, `department`, `birthdate`, `datentime`) ";
$query.="VALUES ('".$_POST['emp_name']."', '".$_POST['emp_px']."', '".$_POST['emp_lastname']."', '".$_POST['employeeid']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['joing_date']."',  '".$_POST['cellno']."', '".$_POST['department']."', '".$_POST['birthdate']."', '$datentime') ";
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
		<td style="width: 150px;">Employee Name</td>
		<td><input name="emp_name" type="text" /> <input name="emp_px" type="text" size="1"/> <input name="emp_lastname" type="text" /></td>
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
		<td><input name="employeeid" type="text" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Email</td>
		<td><input name="email" type="text" /></td>
	</tr>
<!-- 	<tr>
		<td style="width: 150px;">Password</td>
		<td><input name="password" type="text" /></td>
	</tr> -->
	<tr>
		<td style="width: 150px;">Cell No</td>
		<td><input name="cellno" type="text" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Select Department</td>
		<td><select name="department"> 
		<option value="" selected="selected">Select</option>';
		$query="SELECT * FROM department";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
echo '<option value="'.$row['department_id'].'">'.$row['departmentname'].'</option>';
		}
		echo'</select></td>
	</tr>
<!-- 		<tr>
		<td style="width: 150px;">Joining Date</td>
		<td><input name="joing_date" type="text" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Birth Date</td>
		<td><input name="birthdate" type="text" /></td>
	</tr>
 -->
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

