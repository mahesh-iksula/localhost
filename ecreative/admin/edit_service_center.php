<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');
include_once('includes/common.class.php');
if (session_is_registered('un') && session_is_registered('aid') ){
echo'</head> <body>';

include('includes/header.php');
include('includes/leftpanel.php');

if(isset($_POST['brand'])){
				$query = "UPDATE `sdp_nos` SET `sc_name` = '".$_POST['name']."', `brandid` = '".$_POST['brand']."', `sc_add` = '".$_POST['add']."', `sc_add2` = '".$_POST['add2']."', `pin` = '".$_POST['pin']."', `sc_tel` = '".$_POST['tel']."', `sc_tel2` = '".$_POST['tel2']."', `sc_fax` = '".$_POST['fax']."', `sc_tollfree` = '".$_POST['tollfree']."', `sc_tollfree2` = '".$_POST['tollfree2']."', `email` = '".$_POST['email']."'  WHERE ".$_SERVER['QUERY_STRING'];

				echo '<div class="mart10 flaotl txtac">';
					if(mysql_query($query)==true) echo'Save Sucessfully'; else print'Error Saving Record, Please Try Again.';
				echo '</div>';

}
else{ 

$QueryResult=mysql_query('SELECT * FROM `sdp_nos` WHERE '.$_SERVER['QUERY_STRING']);
$row=mysql_fetch_assoc($QueryResult);
			$common =new common; 

echo '<div id="container" >

<form action="" method="post" >
<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
		<tbody>
		<tr>
			<td>Service Center Name:</td>
			<td><input name="name" type="text" maxlength="30" value="'.$row['sc_name'].'" /></td>
		</tr>
		<tr>
			<td>Brand:</td>
			<td>';
			
			echo $common->Select_Brands($row['brandid']);
			
			echo'</td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><input name="add" type="text" maxlength="30" value="'.$row['sc_add'].'" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input name="add2" type="text" maxlength="30" value="'.$row['sc_add2'].'" /></td>
		</tr>
		<tr>
			<td>PIN:</td>
			<td><input name="pin" type="text" maxlength="30" value="'.$row['pin'].'" /></td>
		</tr>
		<tr>
			<td>Telephone:</td>
			<td><input name="tel" type="text" maxlength="30" value="'.$row['sc_tel'].'" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input name="tel2" type="text" maxlength="30" value="'.$row['sc_tel2'].'" /></td>
		</tr>
		<tr>
			<td>FAX</td>
			<td><input name="fax" type="text" maxlength="30" value="'.$row['sc_fax'].'" /></td>
		</tr>
		<tr>
			<td>Tollfree</td>
			<td><input name="tollfree" type="text" maxlength="30" value="'.$row['sc_tollfree'].'" /></td>
		</tr>
		<tr>
			<td>Tollfree</td>
			<td><input name="tollfree2" type="text" maxlength="30" value="'.$row['sc_tollfree2'].'" /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input name="email" type="text" maxlength="30" value="'.$row['email'].'" /></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			<input type="submit" name="submit" value="Save" /></td>
		</tr>
	</tbody>
	</table>
</form>';
}




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