<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');

include('includes/leftpanel.php');
if(isset($_POST['pagename']) && $_POST['pagename']!=''){

$query="INSERT INTO `pages` (`pagename`, `pagetitle`, `page_txt`, `datentime`) VALUES ('".$_POST['pagename']."', '".$_POST['pagetitle']."', '".$_POST['page_txt']."', '$datentime'); ";
$result=mysql_query($query);
if($result==true){echo 'Brand "'.$_GET['scatname'].'" added sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> '; } else{ echo 'Error creating "'.$_GET['scatname'].'" brand'; }

}
else{
echo '<div id="container" >

<form method="POST" action="">
<table cellpadding="0" cellspacing="0" style="width: 850px; float:left;">
	<tr>
		<th colspan="2">Add Pages</th>
	</tr>
	<tr>
		<td style="width: 150px;">Pages Name *</td>
		<td><input name="pagename" type="text" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Page Title*</td>
		<td><input name="pagetitle" type="text" /></td>
	</tr>
	<tr>
		<td style="width: 150px;">Page Discription *</td>
		<td><textarea cols="20" name="page_txt" rows="2" ></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="Submit" type="submit" value="submit" />&nbsp;</td>
	</tr>

</table>

</form></div>
';}
include('includes/footer.php');
}
?>
