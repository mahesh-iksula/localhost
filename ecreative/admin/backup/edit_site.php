<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
if(isset($_GET['id']) && $_GET['id']!=''){ //$_SERVER['REQUEST_METHOD']=='GET' && !$_GET==''
$mobile=$_GET['mobile'];
$query="UPDATE `site` SET `sitename` = '".$_GET['sitename']."', `title` = '".$_GET['title']."', `keyword` = '".$_GET['keyword']."', `person` = '".$_GET['person']."', `contactno` = '".$_GET['contactno']."', `contactno2` = '".$_GET['contactno2']."', `mobile` = '".$mobile."', `address` = '".$_GET['address']."', `address2` = '".$_GET['address2']."', `pin` = '".$_GET['pin']."', `city` = '".$_GET['city']."', `state` = '".$_GET['state']."', `email` = '".$_GET['email']."' ";
$query.="WHERE `sid` = '".$_GET['id']."' ";

if(mysql_query($query)==true){echo 'ID '.$_GET['id'].' Edited sucessfully';}else{mysql_error(); echo 'error';}

echo '<a href="clients.php">Back </a>';
}
else{ 
$query="SELECT * FROM `site` WHERE ".$_SERVER['QUERY_STRING']." limit 1 ";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
echo '<div id="container" >
<form method="GET" action="">
<table cellpadding="0" class="floatl" style="width: 50%; border-collapse: collapse;" >
	<tr>
		<th colspan="2">Site Details <input name="id" value="'.$row['sid'].'" type="hidden"></th>
	</tr>
	<tr>
		<td>Site URL</td>
		<td>www.<input type="text" value="'.$row['url'].'" disabled="disabled"></td>
		<td colspan="2"><img src="../images/logos/'.$row['logo'].'" alt="'.$row['url'].' LOGO" /><br /><a href="">Edit Logo</a></td>
	</tr>
	<tr>
<!--		<td>Logo</td>
		<td><input name="logo" type="file"><br />
		*.png formats only</td> -->
		<td>Site Name</td>
		<td><input name="sitename" type="text" maxlength="100" value="'.$row['sitename'].'" ></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><input name="title" type="text" maxlength="200" value="'.$row['title'].'" ></td>
		<td>Keywords</td>
		<td><input name="keyword" type="text" maxlength="200" value="'.$row['keyword'].'" ></td>
	</tr>
	<tr>
		<th colspan="2">Contact Details</th>
	</tr>
	<tr>
		<td>Owner \ Contact person name</td>
		<td><input name="person" type="text" maxlength="50" value="'.$row['person'].'" ></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><input name="address" type="text" maxlength="100" value="'.$row['address'].'" ></td>
		<td>Pin</td>
		<td><input name="pin" type="text" maxlength="6" value="'.$row['pin'].'" ></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="address2" type="text" maxlength="100" value="'.$row['address2'].'" ></td>
		<td>City</td>
		<td><input name="city" type="text" maxlength="20" value="'.$row['city'].'" ></td>

	</tr>
	<tr>
		<td>State</td>
		<td><input name="state" type="text" maxlength="20" value="'.$row['state'].'" ></td>
	</tr>
	<tr>
		<td>Contact No</td>
		<td><input name="contactno" type="text" maxlength="20" value="'.$row['contactno'].'" ></td>
		<td>&nbsp;</td>
		<td><input name="contactno2" type="text" maxlength="20" value="'.$row['contactno2'].'" ></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td><input name="mobile" type="text" maxlength="12" value="91'.$row['mobile'].'" ></td>
		<td>Email</td>
		<td><input name="email" type="text" maxlength="50" value="'.$row['email'].'" ></td>
	</tr>
	<tr>
		<td></td>
		<td><input name="Submit1" type="submit" value="submit" /><input name="Reset1" type="reset" value="reset"></td>
		<td></td>
		<td></td>
	</tr>
</table>
</form></div>'; }
include('includes/footer.php');
}
?>