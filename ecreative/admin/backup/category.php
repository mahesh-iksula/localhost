<?php 

include('includes/meta.php');
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
		<th colspan="5">Category</th>
	</tr>
	<tr>
		<td colspan="4"><a href="add_mcat.php">Add Master Category</a> | <a href="add_sub.php">Add Category</a> | <a href="add_tcat.php">Add Sub Category</a> | <a href="mcat.php">View Master Category</a> | <a href="category.php">View Category</a> | <a href="tcategory.php">View Sub Category</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Master Category</th>
		<th>Category</th>
		<th class="w60">Actions</th>
	</tr>
';
$query = "SELECT * FROM `scat`,`mcat` WHERE scat.mcatid=mcat.mcatid ";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
echo'<tr>
		<td>'.$row['scatid'].'</td>
		<td>'.$row['mcatname'].'</td>
		<td><strong>'.$row['scatname'].'</strong></td>
		<td><a href="" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="edit_sub.php?scatid=\''.$row['scatid'].'\'" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`scat`+WHERE+`scatid`=\''.$row['scatid'].'\'"  class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}

echo '</table></div>';
include('includes/footer.php');
}
?>