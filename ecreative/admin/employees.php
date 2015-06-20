<?php 

	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');


if (!$_SESSION['sucdel']==''){
echo '<div align="center">'.$_SESSION['sucdel'].'</div>';
unset($_SESSION['sucdel']);
}

echo '<div id="container" >

<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
	<tr>
		<th colspan="4">Category</th>
	</tr>
	<tr>
		<td colspan="4"><a href="add_emp.php">Add Employee</a> | <a href="add_department.php">Add Department</a> | <a href="view_departments.php">View Department</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Banners Name</th>
		<th class="w60">Actions</th>
	</tr>
';
$query = "SELECT employee_id, emp_name,emp_px, emp_lastname,email,employeeid, joing_date,cellno,departmentname FROM `employees` left join `department` on employees.department=department.department_id ";


$result=mysql_query($query);
while($rs = mysql_fetch_assoc($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 25);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';

foreach($sonyPages as $row){echo'<tr>
		<td>'.$row['employee_id'].'</td>
		<td>'.$row['emp_name'].' '.$row['emp_lastname'].' <br />
		<span class="txtgray">'.$row['departmentname'].'</span></td>
		<td><a href="view_emp.php?employee_id='.$row['employee_id'].'" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="edit_emp.php?employee_id='.$row['employee_id'].'" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`employees`+WHERE+`employee_id`=\''.$row['employee_id'].'\'" value="'.$row['bannersid'].'" class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}
echo'<tr>
		<td colspan="3">'.$pageNumbers.'</td>
	</tr>';


echo '</table>
</div>';
include('includes/footer.php');
}
?>