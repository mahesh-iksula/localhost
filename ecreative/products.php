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

echo'<img src="images/brand.jpg" >

<div  class="conteint_f bgwhite">
<ul>';

$query="SELECT * FROM `brand` ORDER BY `brandname` ASC";

$result=mysql_query($query);

while($row=mysql_fetch_array($result)){
echo '<li style="background:url(images/brands/thumb/'.$row['brandimg'].') no-repeat; background-position:50%; width:120px; height:80px" ><a href="branddetail.php?brandid='.$row['brandid'].'" style=" width:120px; height:80px"><img src="images/tspacer.gif" alt="" width="120" height="80"  border="0" /></a></li>';
}


echo'</ul>
</div>
</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
