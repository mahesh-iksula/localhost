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
		<td colspan="4"><a href="add_announcement.php">Add Announcement</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Announcement Title</th>
		<th class="w60">Actions</th>
	</tr>
';
$query = "SELECT * FROM announcement ";
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
		<td>'.$row['a_id'].'</td>
		<td>'.$row['a_title'].'</td>
		<td><a href="view_announcement.php?a_id=\''.$row['a_id'].'\'" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="edit_announcement.php?a_id=\''.$row['a_id'].'\'" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`announcement`+WHERE+`a_id`=\''.$row['a_id'].'\'"  class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}
echo'<tr>
		<td colspan="3">'.$pageNumbers.'</td>
	</tr>';

echo '</table></div>';
include('includes/footer.php');
}
?>