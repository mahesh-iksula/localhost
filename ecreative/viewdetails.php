<?php 
include('includes/meta.php');

echo'
</head>

<body>

';
include('includes/header.php');

echo '
<!-- container starts here -->
<div id="container" >';

include('includes/laft_panel_brands_related.php');


echo '<div class="conteint">
';


$query="SELECT * FROM `config` WHERE ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);

$row=mysql_fetch_array($result);

echo '

<table style="width: 100%;">
	<tr>
		<td rowspan="2" width="230" ><a href="viewdetails.php?cid='.$row['cid'].'">
		<img src="images/products/'.$row['pimg'].'" alt="'.$row['model'].'" title="'.$row['model'].'" border="0" width="220" height="220" /> 
		</a></td>
		<td valign="top"><h1>'.$row['model'].'</h1>
		<span class="txtb txtred">MRP: </span><span>'.number_format($row['mrp'],2).'/-</span><br />
		<span class="txtb txtred">OUR PRICE: </span><span>'.number_format($row['price'], 2).'/- </span></td>
	</tr>
	<tr>
		<td><a href="" onClick="window.print()">Print</a> | <img src="images/pdf.jpg" border="0" /> <a href="">Download PDF</a></td>
	</tr>
	<tr>
		<td>';
		if(!$row['pimg']=='') echo '<img src="images/products/thumb/'.$row['pimg'].'" alt="" width="50" height="50" />';
		if(!$row['pimg2']=='') echo '<img src="images/products/thumb/'.$row['pimg2'].'" alt="" width="50" height="50" />';
		if(!$row['pimg3']=='') echo '<img src="images/products/thumb/'.$row['pimg3'].'" alt="" width="50" height="50" />';
		if(!$row['pimg4']=='') echo '<img src="images/products/thumb/'.$row['pimg4'].'" alt="" width="50" height="50" />';		
		if(!$row['pimg5']=='') echo '<img src="images/products/thumb/'.$row['pimg5'].'" alt="" width="50" height="50" />';
echo'		</td>
		<td>&nbsp;</td>
	</tr>
</table>
';
echo '

<table cellpadding="0" class="auto-style1" style="width: 100%">
	<tr>
		<td cellpad="2">
		<h3>Specification</h3>
		'.$row['discription'].'</td>
	</tr>
</table>';

echo'
</div>
</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>