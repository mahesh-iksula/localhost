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


echo'<div class="conteint">';

if(!$_SERVER['QUERY_STRING']==''){ $query="SELECT * FROM `faqs` WHERE ".$_SERVER['QUERY_STRING'];}
else {echo 'No direct access to this page';}
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<h2 class="green">'.$row['question'].'?</h2>
<sapn class="w100p padl10 mart10 floatl;"><strong>Ans.</strong> </span>'.$row['ans'].'
<br />
<br />
</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
