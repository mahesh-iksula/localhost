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
		<th colspan="4">Category</th>
	</tr>
	<tr>
		<td colspan="4"><a href="add_faq_cat.php">Add FAQ Category</a> | <a href="add_qa.php">Add QA</a> | <a href="view_faq_cat.php">View FAQ Category</a></td>
	</tr>
	<tr>
		<th class="w40">ID</th>
		<th>Banners Name</th>
		<th class="w60">Actions</th>
	</tr>
';
$query = "SELECT * FROM `faqs` ORDER BY faqid DESC ";
$result=mysql_query($query);
while($rs = mysql_fetch_assoc($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 25);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';

foreach($sonyPages as $row){
	echo'<tr>
		<td>'.$row['faqid'].'</td>
		<td>'.$row['question'].'?</td>
		<td><a href="view_qa.php?faqid='.$row['faqid'].'" class="floatl" ><img src="images/view.png" alt="" border="0" ></a><a href="edit_qa.php?faqid='.$row['faqid'].'" class="floatl" ><img src="images/edit.png" alt="" border="0" ></a><a href="delete.php?DELETE+FROM+`faqs`+WHERE+`faqid`=\''.$row['faqid'].'\'" class="floatl" onclick="return confirm(\'Are you sure you want to delete?\')"  ><img src="images/delete.png" alt="" border="0" ></a></td>
	</tr>';
}
echo'<tr>
		<td colspan="3">'.$pageNumbers.'</td>
	</tr>';

echo '</table>
</div>';
include('includes/footer.php');
}
?>