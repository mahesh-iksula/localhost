<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');
if (session_is_registered('un') && session_is_registered('aid') ){
echo'</head> <body>';
include('includes/header.php');
include('includes/leftpanel.php');


if (!$_SESSION['sucdel']==''){
echo '<div align="center">'.$_SESSION['sucdel'].'</div>';
unset($_SESSION['sucdel']);
}

echo '<div id="container" >

';
$query = "SELECT * FROM `sdp_nos` ORDER BY `id` ASC ";


//execute the SQL query and return records
	$result = mysql_query($query);
	$numRows = mysql_num_rows($result);
	while($rs = mysql_fetch_assoc($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 12);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';


	echo'
	<a href="add_service_center.php" class="pink mart10 floatl">Add Service Center</a>
	<a href="'.$_SERVER['HTTP_REFERER'].'" class="gray mart10 floatr">Back</a>
	<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
	<tr>
		<td colspan="3">'.$numRows.' Records '.$pageNumbers.'</td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Service Center Name</th>
		<th class="w60">Actions</th>
	</tr>';
foreach($sonyPages as $row) {
echo'<tr>
		<td>'.$row['id'].'</td>
		<td>'.$row['sc_name'].'</td>
		<td><a href="view_service_center.php?id='.$row['id'].'" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="edit_service_center.php?id='.$row['id'].'" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`sdp_nos`+WHERE+`id`=\''.$row['id'].'\'" class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}
echo'<tr>
		<td colspan="3">'.$pageNumbers.'</td>
	</tr>';

echo '</table></div>';
}else{
								echo'</head>
<body><div class="login">
							<form action="checklogin.php" method="post">
							<table cellpadding="0" cellspacing="0" class="floatl" >
								<tr>
									<td><label>Username:</label></td>
									<td><input name="username" class="login" type="text" /></td>
								</tr>
								<tr>
									<td><label>Password:</label></td>
									<td><input name="password" class="login" type="password" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><input name="submit" src="images/sprites/source/signin.gif" type="image" value="login" class="loginbtn" /></td>
								</tr>
							</table>
							</form>
							</div>
							';
}
include('includes/footer.php');
?>