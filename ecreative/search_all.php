<?php 
include('includes/meta.php');

echo'
</head>

<body>';
include('includes/header.php');

echo '
<!-- container starts here -->
<div id="container" >';
	include('includes/laft_panel.php');





$search =$_POST['search'];
$searcha = array();
$searcha = explode(" ", $search); 
$query = "SELECT * FROM search WHERE `cid` = '$search' ";
reset($searcha);  
while (list($key, $val) = each($searcha))  
{ 
 $query.= " OR `model` LIKE '%".$val."%' "; 
}

$result=mysql_query($query);
$num=mysql_num_rows($result);
echo'<div class="conteint"><h2 class="green">Search Result</h2>

';
if($num=='0'){echo '<div  class="conteint_f bgwhite">
<ul>
    <li class="w100p">We don\'t find any search result.</li>
    <li class="w100p">Make sure all words are spelled correctly.<br />
Try different keywords.<br />
						Try more general keywords.<br />
Try fewer keywords.</li>
';}else{echo '<div class="w100p padl10 padt10 "><h4>We found '.$num.' results for your search '.$search.' </h4></div>
<div  class="conteint_f bgwhite">
<ul>';}
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
echo '
<li style="background:url(images/products/thumb/'.$row['pimg'].') no-repeat; color:#1c2124; width:140px; padding-top:144px; background-position:50% 00%; height:60px; margin:10px 0 0 10px;">'.substr($row['model'], 0, 40).'<br />
<a href="'.$row['purl'].'" target="_blank" class="floatl mart10 txtred w100p"><strong>View Detail</strong></a>
<a href="'.$row['purl'].'" target="_blank" class="mart5 txtblue floatl"><strong>Download PDF</strong><!-- <img src="images/pdf.jpg" alt="Download PDF" border="0" />--></a>
</li>';}


echo'</ul>
</div>

</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>