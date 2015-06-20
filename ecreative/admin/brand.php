<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';
if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');


if (!$_SESSION['sucdel']==''){
echo '<div align="center">'.$_SESSION['sucdel'].'</div>';
unset($_SESSION['sucdel']);
}

echo '<div id="container" >

<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
	<tr>
		<td colspan="3"><a href="add_brand.php">Add Brand</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Brand Name</th>
		<th class="w60">Actions</th>
	</tr>
';
$query = "SELECT * FROM `brand` ";


//execute the SQL query and return records
	$result = mysql_query($query);
	$numRows = mysql_num_rows($result);
	while($rs = mysql_fetch_assoc($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 20);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';

foreach($sonyPages as $row) {
echo'<tr>
		<td>'.$row['brandid'].'</td>
		<td>'.$row['brandname'].'</td>
		<td><a href="view_brand.php?brandid='.$row['brandid'].'" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="edit_brand.php?brandid='.$row['brandid'].'" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`brand`+WHERE+`brandid`=\''.$row['brandid'].'\'" class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}
echo'<tr>
		<td colspan="3">'.$pageNumbers.'</td>
	</tr>';

echo '</table></div>';
include('includes/footer.php');
}
?>