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
	include('includes/laft_panel_faqs.php');



echo'<div class="conteint"><img src="images/faq.jpg" />';


if(!$_SERVER['QUERY_STRING']==''){$query="SELECT * FROM `faqs` WHERE ".$_SERVER['QUERY_STRING'];}
else {$query="SELECT * FROM `faqs` ";}

$result=mysql_query($query);
echo '<ul>';
$numRows = mysql_num_rows($result);
while($rs = mysql_fetch_assoc($result)){
	$data[] = $rs;
	}

	// create pagination object 
	$pagination = new pagination;
	$sonyPages = $pagination->generate($data, 12);
	$pageNumbers = '<div class="numbers">'.$pagination->links().'</div>';

foreach($sonyPages as $row){
echo '<li><a href="answer.php?faqid='.$row['faqid'].'">'.$row['question'].'? </a></li>';
}
echo '</ul>

<br />
<br />
</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
