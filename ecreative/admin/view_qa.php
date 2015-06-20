<?php 

	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');

$query="SELECT * FROM `faqs`,`faqs_cat` where `faqs`.`faqscatid`=`faqs_cat`.`faqscatid` and ".$_SERVER['QUERY_STRING']; // and ".$_SERVER['QUERY_STRING']
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div class="container"  >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Category</td>
		<td>'.$row['faqs_catname'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Question</td>
		<td>'.$row['question'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Answer</td>
		<td>'.$row['ans'].'</td>
	</tr>
</table>
</div>
';
include('includes/footer.php');
}
?>
