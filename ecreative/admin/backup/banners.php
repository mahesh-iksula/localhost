<?php 
include_once('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');

if (!$_SESSION['sucdel']==''){
echo '<div align="center">'.$_SESSION['sucdel'].'</div>';
unset($_SESSION['sucdel']);
}
echo '<div id="container" >

<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
	<tr>
		<th colspan="4">Category</th>
	</tr>
	<tr>
		<td colspan="4"><a href="add_banners.php">Add Banners</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Banners Name</th>
		<th class="w60">Actions</th>
	</tr>
';
$query = "SELECT * FROM `banners` ";
$result=mysql_query($query);
while($rs = mysql_fetch_array($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 25);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';

foreach($sonyPages as $row){echo'<tr>
		<td>'.$row['bannersid'].'</td>
		<td>'.$row['bannername'].'</td>
		<td><a href="" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`banners`+WHERE+`bannersid`=\''.$row['bannersid'].'\'" class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}

echo '</table>'.$pageNumbers.'
</div>';
include('includes/footer.php');
}
?>