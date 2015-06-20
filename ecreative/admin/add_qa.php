<?php 
	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['faqs_cat']) && $_POST['faqs_cat']!='' ){
$query="INSERT INTO `faqs` (`faqscatid`, `question`, `ans`, `datentime`) ";
$query.="VALUES ('".$_POST['faqs_cat']."', '".$_POST['ques']."', '".$_POST['ans']."', '$datentime' ) ";
if(mysql_query($query)==true){echo'Successfully Recorded <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Add Banner</a> ';}else{mysql_error();}
}
else{

$query="SELECT * FROM `faqs_cat` ";
$result=mysql_query($query);

echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Category</td>
		<td><select name="faqs_cat" style="width: 200px; padding:5px;">
		<option value="" selected="true">Select</option>';
while($row=mysql_fetch_array($result)){
echo '<option value="'.$row['faqscatid'].'">'.$row['faqs_catname'].'</option>';
		}
echo '</select></td>
	</tr>
	<tr>
		<td style="width: 150px;">Question</td>
		<td><input name="ques" type="text"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Answer</td>
		<td><textarea cols="20" name="ans" rows="2" ></textarea></td>
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
