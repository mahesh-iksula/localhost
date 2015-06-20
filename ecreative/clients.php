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

include('includes/laft_panel_brand.php');

echo '<div class="conteint">';



$query="SELECT * FROM `client` ";

$result=mysql_query($query);
echo '<ul>';
while($row=mysql_fetch_array($result)){
echo '<li><img src="images/client/'.$row['clientlogo'].'" alt="'.$row['clientname'].'" title="'.$row['clientname'].'"></li>';
}
echo '</ul>';
echo'
</div>
</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>