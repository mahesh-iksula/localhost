<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');

echo'</head> <body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');


if (!$_SESSION['sucdel']==''){
echo '<div align="center">'.$_SESSION['sucdel'].'</div>';
unset($_SESSION['sucdel']);
}


echo '<div id="container" >

';
$query = "SELECT * FROM `newsletter` ORDER BY `nid` DESC ";


//execute the SQL query and return records
	$result = mysql_query($query);
	$numRows = mysql_num_rows($result);
	while($rs = mysql_fetch_assoc($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 12);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';


	echo'	<a href="'.$_SERVER['HTTP_REFERER'].'" class="gray mart10 floatr">Back</a>
	<table cellpadding="0" class="floatl" style="width: 100%; border-collapse: collapse;" >
	<tr>
		<td colspan="3">'.$numRows.' Records'.$pageNumbers.' <a href="Mailing_List_download.php" >Download Newsletter List</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Email List</th>

	</tr>';
foreach($sonyPages as $row) {
echo'<tr>
		<td>'.$row['nid'].'</td>
		<td>'.$row['email'].'</td>
	</tr>';
}
echo'<tr>
		<td colspan="3">'.$pageNumbers.'</td>
	</tr>';

echo '</table></div>';
include('includes/footer.php');
}
?>