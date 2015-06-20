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



echo'<div class="conteint">';

echo'<h2 class="green">Select Brand</h2>

<div  class="conteint_f bgwhite"> <ul>';

$config="SELECT * FROM `config` WHERE ".$_SERVER['QUERY_STRING'];




$rconfig=mysql_query($config);

while($wconfig=mysql_fetch_array($rconfig)){
echo '

<li style="background:url(images/products/thumb/'.$wconfig['pimg'].') no-repeat; color:#1c2124; width:140px; padding-top:144px; background-position:50% 00%; height:60px; margin:10px 0 0 10px;">'.substr($wconfig['model'], 0, 40).'<br />
<a href="'.$wconfig['purl'].'" target="_blank" class="floatl mart10 txtred w100p"><strong>View Detail</strong></a>
<a href="'.$wconfig['purl'].'" target="_blank" class="mart5 txtblue floatl"><strong>Download PDF</strong><!-- <img src="images/pdf.jpg" alt="Download PDF" border="0" />--></a>
</li>
';


}

echo'</ul>
</div>
</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
