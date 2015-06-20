<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
echo '<div class="container"  >';

echo'<form action="checkuploadproduct.php" enctype="multipart/form-data" method="post" >';

echo '<table cellpadding="0" cellspacing="0" style="width: 80%; float:left">
	<tr>
		<th colspan="2">Add Product</th>
	</tr>
<!--	<tr>
		<td  style="width: 150px">Third Category</td>
		<td>';
$tcatq="SELECT * FROM `tcat` WHERE scatid=".$row['scatid']." AND mcatid=".$row['mcatid']."  ";
$tcatqr=mysql_query($tcatq);
echo'		<select name="tcat" style="width: 200px">
			<option value="0" selected="selected">Select</option>';
while($row=mysql_fetch_array($tcatqr)){
echo'		<option value="'.$row['tcatid'].'">'.$row['tcatname'].'</option>';
}
echo'		</select>&nbsp;</td>
	</tr> -->
	<tr>
		<td>Brand</td>
		<td>';
$brandq="SELECT * FROM `brand` ORDER BY `brandname` ASC ";
$brandr=mysql_query($brandq);
echo'		<select name="brand" style="width: 200px">
			<option value="0" selected="selected">Select</option>';
while($row=mysql_fetch_array($brandr)){
echo'		<option value="'.$row['brandid'].'">'.$row['brandname'].'</option>';
}
echo'		</select>&nbsp;
&nbsp;<br />
		<span style="font-size:10px;">Brand name eg. Sennheiser</span></td>
	</tr>

	</table><br />
<table cellpadding="0" cellspacing="0" style="width:80%; float:left">
	<tr>
		<td style="width: 150px;">Product Name</td>
		<td><input name="title" type="text" style="width: 620px;" />&nbsp;<br />		<span style="font-size:10px;">Product name eg. Professional Headphones EH 150</span></td>
	</tr>
<!--	<tr>
		<td>Sub Title</td>
		<td><input name="subtitle" type="text" style="width: 620px;" />&nbsp;</td>
	</tr>
	<tr>
		<td>MRP</td>
		<td><input name="mrp" type="text" style="width: 620px;" />&nbsp;</td>
	</tr>
	<tr>
		<td>Offer Price</td>
		<td><input name="ourprice" type="text" style="width: 620px;" /></td>
	</tr> -->
	<tr>
		<td>PDF Link</td>
		<td><input name="pdflink" type="text" style="width: 620px;" />&nbsp;<br />
		<span style="font-size:10px;">*.PDF File Link eg. http://www.example.com/Professional_Headphones_EH_150.pdf</span></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><input name="uploadfile" type="file" />&nbsp;<br />
<span style="font-size:10px;">*.jpg or *.jpeg formats only. </span>
<!-- 		<a href="add_more_images.php" style="font-size:10px;">Add more images</a> -->
		</td>
	</tr>
	<tr>
		<td>Product Link</td>
		<td><input name="purl" type="text" style="width: 620px;" />&nbsp;<br />
		<span style="font-size:10px;">Link eg. http://www.example.com/Professional_Headphones_EH_150.html</span></td>
	</tr>
<!--	<tr>
		<td valign="top">Product Discription</td>
		<td><textarea cols="20" style="width: 625px; height: 180px;" name="discription" rows="4"></textarea></td>
	</tr> -->
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" /><br />
&nbsp;</td>
	</tr>
</table></form>
';
echo'</div>';
include('includes/footer.php');
}
?>
