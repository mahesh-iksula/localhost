<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');
include_once('includes/common.class.php');
if (session_is_registered('un') && session_is_registered('aid') ){
echo'</head> <body>';

include('includes/header.php');
include('includes/leftpanel.php');
 
 $QueryResult=mysql_query('SELECT * FROM `sdp_nos` WHERE '.$_SERVER['QUERY_STRING']);
$row=mysql_fetch_assoc($QueryResult);
			$common =new common; 

echo '<div id="container" >
<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
		<tbody>
		<tr>
			<td>Service Center Name:</td>
			<td>'.$row['sc_name'].'</td>
		</tr>
		<tr>
			<td>Brand:</td>
			<td>';
			
			echo $row['brandid'];
			
			echo'</td>
		</tr>
		<tr>
			<td>Address:</td>
			<td>'.$row['sc_add'].'</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>'.$row['sc_add2'].'</td>
		</tr>
		<tr>
			<td>PIN:</td>
			<td>'.$row['pin'].'</td>
		</tr>
		<tr>
			<td>Telephone:</td>
			<td>'.$row['sc_tel'].'</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>'.$row['sc_tel2'].'</td>
		</tr>
		<tr>
			<td>FAX</td>
			<td>'.$row['sc_fax'].'</td>
		</tr>
		<tr>
			<td>Tollfree</td>
			<td>'.$row['sc_tollfree'].'</td>
		</tr>
		<tr>
			<td>Tollfree</td>
			<td>'.$row['sc_tollfree2'].'</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>'.$row['email'].'</td>
		</tr>
	</tbody>
	</table>
';
echo '</div>';
include('includes/footer.php');
}
else{
echo'</head>
<body>';
echo'				<div class="login">
							<form action="index.php" method="post">
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
include('includes/footer.php');
}


?>