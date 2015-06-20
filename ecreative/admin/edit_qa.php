<?php 

	include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
if(isset($_POST['ques']) && $_POST['ques']!='' ){

$query="UPDATE `faqs` ";
$query.="SET faqscatid= '".$_POST['faqs_cat']."', `question` = '".$_POST['ques']."', `ans` = '".$_POST['ans']."', `datentime`='$datentime' ";
$query.="WHERE faqid='".$_POST['id']."'";
if(mysql_query($query)==true){echo 'Record updated sucessfully <br /><a href="'.$_SERVER['HTTP_REFERER'].'">Back</a> '; } else{ echo 'Error creating "'.$_POST['scatname'].'" brand'; }
}
else{

$query="SELECT * FROM `faqs`,`faqs_cat` where `faqs`.`faqscatid`=`faqs_cat`.`faqscatid` and ".$_SERVER['QUERY_STRING']; // and ".$_SERVER['QUERY_STRING']
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

echo '<div class="container"  >
<form method="post" action="" enctype="multipart/form-data" >
<table cellpadding="0" cellspacing="0" style="width: 80%; float:left;">
	<tr>
		<th colspan="2">Add Brand</th>
	</tr>
	<tr>
		<td style="width: 150px;">Category</td>
		<td><select name="faqs_cat" style="width: 200px; padding:5px;">
		<option value="'.$row['faqscatid'].'">'.$row['faqs_catname'].'</option>
				<option value="'.$row['faqscatid'].'">=========================</option>';

$mcat="SELECT * FROM faqs_cat ";
$mcatres=mysql_query($mcat);


while($mcatrow=mysql_fetch_array($mcatres)){
echo '<option value="'.$mcatrow['faqscatid'].'">'.$mcatrow['faqs_catname'].'</option>';
		}
echo '</select></td>
	</tr>
	<tr>
		<td style="width: 150px;">Question</td>
		<td><input name="id" type="hidden" value="'.$row['faqid'].'"><input name="ques" type="text" value="'.$row['question'].'"></td>
	</tr>
	<tr>
		<td style="width: 150px;">Answer</td>
		<td><textarea cols="20" name="ans" rows="2" >'.$row['ans'].'</textarea></td>
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
