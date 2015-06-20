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
	include('includes/laft_panel_aboutus.php');



echo'<div class="conteint">';

echo '<img src="images/company_overview.jpg" />
';

$query="SELECT * FROM `pages` WHERE pagename='company_overview' ";

$result=mysql_query($query);

$row=mysql_fetch_assoc($result);
echo $row['page_txt'];


echo '
</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
