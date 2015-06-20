<?php 
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
$query="SELECT * FROM announcement WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div class="container"  >

<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Announcement</th>
	</tr>
	<tr>
		<td style="width: 150px;">Announcement Title</td>
		<td>'.$row['a_title'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Answer</td>
		<td>'.$row['a_detail'].'</td>
	</tr>
</table>
</div>
';
include('includes/footer.php');
}
?>
