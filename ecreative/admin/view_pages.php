<?php 

include('includes/meta.php');
include_once('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');


$query="SELECT * FROM `pages` WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div id="container" >
	<table cellpadding="0" cellspacing="0" style=" float:left;">
		<tr>
			<th colspan="2">Add Pages</th>
		</tr>
		<tr>
			<td style="width: 150px;">Pages Name *</td>
			<td>'.$row['pagename'].'</td>
		</tr>
		<tr>
			<td style="width: 150px;">Page Title*</td>
			<td>'.$row['pagetitle'].'</td>
		</tr>
		<tr>
			<td style="width: 150px;">Page Discription *</td>
			<td>'.$row['page_txt'].'</td>
		</tr>
	</table>
</div>
';
include('includes/footer.php');
}
?>
