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

echo '<img src="images/help.jpg" />
<br />
<img src="images/faqs.jpg" />';

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

echo '</ul>';








echo '<br />
<br />
<img src="images/servicensupport.jpg" /><br />
';


$support=mysql_query("SELECT * FROM `sdp_nos` left join brand on sdp_nos.brandid =brand.brandid");

if(mysql_num_rows($support)=='0') {
echo'We are sorry, there are no records found in this category.<br />Please try next time';
}
else{
	
	$supportdata= mysql_fetch_array($support);

	echo '<div class="padl10 padr10"><table border="0" cellspacing="0" cellpadding="0" class="service" width="100%">
	 <tr>
    <th>Brand</th>
    <th>Service Type</th>
    <th>Toll Free</th>
    <th>Contact Details</th>
  </tr>';
$i=0;


$supportQuery=mysql_query("SELECT * FROM `sdp_nos` left join brand on sdp_nos.brandid =brand.brandid");



while ($srow = mysql_fetch_array($supportQuery)){

echo'<tr '; if($i==1){echo' class="hit" ';} echo '>
    <td>'.$srow['brandname'].'</td>
    <td>'.$srow['sc_name'].'</td>
    <td>'.$srow['sc_tollfree'];
	if(!empty($srow['sc_tollfree2'])){echo ', <br />
'.$srow['sc_tollfree2']; }
	echo'</td>

    <td>';
		if(!empty($srow['email'])){echo '<br /><strong>Email:</strong> <a href="mailto:'.$srow['email'].'" >'.$srow['email'].'</a><br />
'; }
		if(!empty($srow['sc_add'])){echo $srow['sc_add']; }
		if(!empty($srow['sc_add2'])){echo '<br />
'.$srow['sc_add2']; }
		if(!empty($srow['pin']) || !$srow['pin']=='0'){echo ' <strong>Pin: </strong>'.$srow['pin']; }

		if(!empty($srow['sc_tel'])){echo '<br />
<strong>Telephone: </strong>'.$srow['sc_tel']; }
		if(!empty($srow['sc_tel'])){echo ', '.$srow['sc_tel2']; }

	echo'</td>

  </tr>
';
$i++;

if ($i>='2'){ $i=0; }

}
echo '</table></div><br />
<br />
';



}

echo'
</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
