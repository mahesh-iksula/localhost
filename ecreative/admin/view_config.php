<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');


$query="SELECT * FROM `config`, `brand` WHERE `config`.`brandid`=`brand`.`brandid` and `config`.".$_SERVER['QUERY_STRING']." ";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div class="container"  >';
echo'<form action="" enctype="multipart/form-data" method="post" >';
echo '<table cellpadding="0" cellspacing="0" style="width: 100%; float:left">
	<tr>
		<th colspan="2">View Product</th>
	</tr>
	<tr>
		<td>Brand</td>
		<td>';
$brandq="SELECT * FROM `brand` ORDER BY `brandname` ASC ";
$brandr=mysql_query($brandq);
echo$row['brandname'].'</td>
	</tr>
	<tr>
		<td style="width: 150px;">Product Name</td>
		<td>'.$row['model'].'</td>
	</tr>
	<tr>
		<td>PDF Link</td>
		<td><a href="'.$row['pdflink'].'">'.$row['pdflink'].'</a></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><img src="../images/product/'.$row['pimg'].'" alt="" /></td>
	</tr>
	<tr>
		<td>Product Link</td>
		<td><a href="'.$row['purl'].'" >'.$row['purl'].'</a><br /></td>
	</tr>
</table></form>

';
echo'</div>';
include('includes/footer.php');
}
?>
