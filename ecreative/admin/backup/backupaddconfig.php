<?php 
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
echo '<div class="container"  >';

if(isset($_GET['title']) && $_GET['title']!==''){

$query="INSERT INTO `config` (`model`, `short_discription`, `discription`, `mrp`, `ourprice`, `discount`,  `mcatid`,  `scatid`,  `tcatid`,  `pimg`, `brand`, `date` ) ";
$query.="VALUES ('".$_GET['title']."', '".$_GET['subtitle']."', '".$_GET['discription']."', '".$_GET['mrp']."', '".$_GET['ourprice']."', '".$_GET['discount']."', '".$_GET['mcat']."', '".$_GET['scat']."', '".$_GET['tcat']."', '$image', '".$_GET['brand']."', '$datentime' ) ";
//if(mysql_query($query)==true){echo'Successfully Recorded ';}else{mysql_error();}





}else{
$query="SELECT * FROM `mcat`,`scat` WHERE ".$_SERVER['QUERY_STRING']." ";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
echo'
<form method="get" action="checkuploadproduct.php" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<td style="width: 80px"><strong>Category</strong></td>
		<td>'.$row['mcatname'].' &raquo; '.$row['scatname'].'<input name="mcat" value="'.$row['mcatid'].'" type="hidden" /><input name="scat" value="'.$row['scatid'].'" type="hidden" />
		</td>
	</tr>

</table>


<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Product</th>
	</tr>
	<tr>
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
	</tr>
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
echo'		</select>&nbsp;</td>
	</tr>

	</table><br />
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left">
	<tr>
		<td style="width: 150px;">Product Name</td>
		<td><input name="title" type="text" style="width: 620px;" />&nbsp;</td>
	</tr>
	<tr>
		<td>Sub Title</td>
		<td><input name="subtitle" type="text" style="width: 620px;" />&nbsp;</td>
	</tr>
	<tr>
		<td>MRP</td>
		<td><input name="mrp" type="text" style="width: 620px;" />&nbsp;</td>
	</tr>
	<tr>
		<td>Offer Price</td>
		<td><input name="ourprice" type="text" style="width: 620px;" />&nbsp;</td>
	</tr>
	<tr>
		<td>Image</td>
		<td><input name="file" type="file" />&nbsp;<br />
		<a href="add_more_images.php" style="font-size:10px;">Add more images</a>
		</td>
	</tr>
	<tr>
		<td valign="top">Product Discription</td>
		<td><textarea cols="20" style="width: 625px; height: 180px;" name="discription" rows="2"></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>
</table></form>
';

}
echo'</div>';
include('includes/footer.php');
}
?>
