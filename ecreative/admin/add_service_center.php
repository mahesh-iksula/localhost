<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');
include_once('includes/common.class.php');
if (session_is_registered('un') && session_is_registered('aid') ){
echo'</head> <body>';

include('includes/header.php');
include('includes/leftpanel.php');

if(isset($_POST['name']) && !$_POST['name']==''){

$query= 'INSERT INTO `sdp_nos` (`sc_name`, `brandid`, `sc_add`, `sc_add2`, `pin`, `sc_tel`, `sc_tel2`, `sc_fax`, `sc_tollfree`, `sc_tollfree2`, `email`, `datentime`) VALUES (\''.$_POST['name'].'\', \''.$_POST['brand'].'\', \''.$_POST['add'].'\', \''.$_POST['add2'].'\', \''.$_POST['pin'].'\', \''.$_POST['tel'].'\', \''.$_POST['tel2'].'\', \''.$_POST['fax'].'\', \''.$_POST['tollfree'].'\', \''.$_POST['tollfree2'].'\', \''.$_POST['email'].'\', \''.$datentime.'\')';


echo '<div class="mart10 flaotl txtac">';if(mysql_query($query)==true) echo'Save Sucessfully'; else print'Error Saving Record, Please Try Again.';
echo '</div>';

}
else{
			$common =new common; 
echo '<div id="container" >

<form action="" method="post" >
<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
		<tbody>
		<tr>
			<td>Service Center Name:</td>
			<td><input name="name" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Brand:</td>
			<td>';
			
			echo $common->Select_Brands(0);
			
			echo'</td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><input name="add" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input name="add2" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>PIN:</td>
			<td><input name="pin" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Telephone:</td>
			<td><input name="tel" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input name="tel2" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>FAX</td>
			<td><input name="fax" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>Tollfree</td>
			<td><input name="tollfree" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input name="tollfree2" type="text" maxlength="30" /></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input name="email" type="text" maxlength="30" /></td>
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