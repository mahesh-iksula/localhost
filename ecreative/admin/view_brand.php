<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');

$query="SELECT * FROM brand WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);


echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">View Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Name</td>
		<td>'.$row['brandname'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Brand Logo</td>
		<td><img src="../images/brands/'.$row['brandimg'].'" alt=""></td>
	</tr>
	<tr>
		<td style="width: 150px;">Creative Text</td>
		<td>'.$row['title_txt'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">About Brand</td>
		<td>'.$row['brand_txt'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">URL</td>
		<td><a href="'.$row['url'].'" >'.$row['url'].'</a></td>
	</tr>
	<tr>
		<td style="width: 150px;">Manager Name</td>
		<td>';
$tcatqr=mysql_query('SELECT * FROM `employees` where employee_id = '.$row['employee_id']);
$emprow=mysql_fetch_assoc($tcatqr);
echo $emprow['emp_name'];

echo'	</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>

</form></div>
';
include('includes/footer.php');
}
?>
