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
	include('includes/laft_panel.php');
echo'<div class="conteint">';
echo '<h2 class="green">Announcement</h2>

<div  class="conteint_f bgwhite">

<ul>
';

$query="SELECT * FROM `announcement` where ".$_SERVER['QUERY_STRING'];
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
echo '<h1 class="padt10 padl10 padr10">'.$row['a_title'].'</h1>


<p>'.$row['a_detail'].'</p>';








echo'</ul>
</div>

</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
