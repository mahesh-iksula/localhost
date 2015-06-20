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

$query="SELECT * FROM `announcement` ORDER BY `a_id` DESC";

$result=mysql_query($query);
$i=1;
while($row=mysql_fetch_assoc($result)){
echo '<li class="w100p"><strong>'.$i.'</strong>. <a href="announcement_detailed.php?a_id='.$row['a_id'].'">'.$row['a_title'].'</a></li>';
$i++;
}






echo'</ul>
</div>

</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
