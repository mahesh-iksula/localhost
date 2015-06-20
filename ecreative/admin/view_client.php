<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
$query="SELECT * FROM client WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);


echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">View Client</th>
	</tr>
	<tr>
		<td style="width: 150px;">Company Name</td>
		<td>'.$row['clientname'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Company Logo</td>
		<td><img src="../images/clientel/'.$row['clientlogo'].'" alt=""></td>
	</tr>
</table>

</form></div>
';
include('includes/footer.php');
}
?>
