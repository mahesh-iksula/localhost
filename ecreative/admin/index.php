<?php 
include('includes/meta.php');
include('includes/meta.php');
include_once('includes/pagination.class.php');
echo'</head>
<body>';
include('includes/header.php');
//echo '<div id="container" >';
if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/leftpanel.php');
echo '<div id="container" >';



echo '';




echo '</div>';


}else{

if(isset($_POST["username"]) && isset($_POST["password"]) && sizeof($_POST) > 0){ // !$_post["abc"]=='' && 
	$user=trim($_POST["username"]);
	$pass=trim($_POST["password"]);

$query="SELECT * FROM `admin` WHERE `admin`='$user' AND `password`='$pass' ";

$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
	if($row!="" && sizeof($row) > 0){
		$_SESSION['un']=$row['admin'];
		$_SESSION['aid']=$row['aid'];
echo'</head>
<body>';
include('includes/leftpanel.php');
echo '<div id="container" >';



echo '';




echo '</div>';

	}else{
	echo 'Wrong Username & Password';
	}
}else{
echo'
<div class="floatl w100p">
<div class="login">
<form action="" method="post">
<table cellpadding="0" cellspacing="0"  >
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
</div>
';
}

}
//echo '</div>';
include('includes/footer.php');
?>