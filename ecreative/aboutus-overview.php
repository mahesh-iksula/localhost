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
echo'<div class="conteint bgwhite"> <img src="images/company_overview.jpg" />

<p>Incorporated in 1992 with just 3 people Creative Peripherals &  Distribution Pvt. Ltd. has successfully achieved the status of being a focused  player in Distribution of I.T. as well as non I.T. products like telecom and CE products with a significant reach across India. </p>
<p>Currently having a family of more than 100 employees, more than 2000 channel partners. </p>
<p>Within a small span of 18 years the Company has successfully transformed itself from a Trading Organization to value added distribution firm with a leading integrated Supply Chain Solution Provider for IT, Telecom and CE products as well . </p>
<p><p><strong>Our  Strength</strong></p>
<ul>
  <li>We have direct access to retailers/resellers and can do direct  breadth billing across cities of various regions in west zone of India. </li>
  <li>Ability to import, distribute and retail products. Efficiently able  to reach to each level in the value chain.</li>
  <li>Have unique facility of small feeder warehouse in retail areas, like  for e.g.: Warehouse at lamington road where almost 350 retailers are present in  a region of 1 km. </li>
  <li>Extremely flexible business terms which suits every fragmented  retail partner / system integrator.</li>
</ul></p><br><br><p><center><img src="images/aboutus2.gif" /></center></p>';

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
