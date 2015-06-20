<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');
if (session_is_registered('un') && session_is_registered('aid') ){
echo'</head> <body>';

include('includes/header.php');
include('includes/leftpanel.php');

$result = mysql_query('SELECT * FROM `st_lc` WHERE '.$_SERVER['QUERY_STRING']);
$row = mysql_fetch_assoc($result);
echo '<div id="container" >
<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
		<tbody>
		<tr>
			<td>Store Name:</td>
			<td>'.$row['st_name'].'</td>
		</tr>
		<tr>
			<td>Store Location:</td>
			<td>'.$row['st_loc'].'</td>
		</tr>
		<tr>
			<td>Address:</td>
			<td>'.$row['st_add'].'</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>'.$row['st_add2'].'</td>
		</tr>
		<tr>
			<td>City</td>
			<td>'.$row['st_city'].'</td>
		</tr>
		<tr>
			<td>State:</td>
			<td>'.$row['st_state'].'</td>
		</tr>
		<tr>
			<td>PIN:</td>
			<td>'.$row['st_pin'].'</td>
		</tr>
		<tr>
			<td>Telephone:</td>
			<td>'.$row['st_tel'].'</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>'.$row['st_tel2'].'</td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td>'.$row['st_mobile'].'</td>
		</tr>
		<tr>
			<td>&ensp;</td>
			<td>'.$row['st_mobile2'].'</td>
		</tr>
		<tr>
			<td>Fax:</td>
			<td>'.$row['st_fax'].'</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>'.$row['st_email'].'</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><img src="../images/maps/'.$row['st_map'].'" alt="" ></td>
		</tr>
		<tr>
	</tbody>
	</table>';

echo '</div>';
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