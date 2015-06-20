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



echo'<div class="conteint">
<img src="images/contactus.jpg" />
<p>Creative have multiple store offices all over India please use our store locator to find nearest store in your city. </p>';







echo'<form action="" method="post" class="" >
<p><strong>Select Location:&nbsp; <img src="images/tspacer.gif" width="360" height="10" ></strong> <select name="st_id" size="1" class="w145" onchange=\'this.form.submit()\'>';
		$result = mysql_query('SELECT *  FROM st_lc ORDER BY `st_loc` ASC');
		echo'<option value="0">Select</option>';
			while($row = mysql_fetch_array($result)) {
			echo '<option value="'.$row['st_id'].'">'.$row['st_loc'].'</option>';
			}
	echo '</select></p>
</form>';




if (isset($_POST['st_id']) && !empty($_POST['st_id'])){
	$stadd = 'SELECT * FROM st_lc WHERE st_id='.$_POST['st_id']; 
	
$st_result = mysql_query($stadd);
while($row = mysql_fetch_array($st_result)) {
echo'
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>';

if(empty($row['st_map'])){ ?><img src="images/no-maps.jpg" class="padl10" alt="No Map" > <?php } else {?> <img src="images/maps/<?php echo $row['st_map']; ?>" class="padl10" > <?php }
	
?>
</td>
    <td class="padl20"><strong>Creative Peripherals &amp; <br />
Distribution Pvt. Ltd.</strong><br /><br />

<?php echo $row['st_add'] ?><br />
<?php echo $row['st_add2'] ?><br />
<?php echo $row['st_city']; if ($st_pin  != '') {echo $row['st_loc'].', Pin: '.$row['st_pin']; } ?><br />
<?php echo $row['st_state'] ?><br />
India.<br /><br />

<strong>Tel.:</strong> +91 <?php echo $row['st_tel']; if (!empty($row['st_tel2'])) { echo ', '.$row['st_tel2'];}?><br />
<?php if (!empty($row['st_mobile'])) { echo '<strong>Mobile:</strong> +91 '.$row['st_mobile'];} ?><br />
<?php if (!empty($row['st_fax'])) { echo '<strong>Fax:</strong> +91 '.$row['st_fax'];} ?><br /><br />

<?php if (!empty($row['st_email'])) { echo '<strong>Email:</strong>  <a href="mailto:'.$row['st_email'].'" >'.$row['st_email'].'</a>';} ?><br />
</td>
  </tr>
</table>

<?php 
}
}
else {
	echo'
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<img src="images/maps.jpg" class="padl10" >
	
</td>
    <td class="padl20"><strong>Creative Peripherals &amp; <br />
Distribution Pvt. Ltd.</strong><br /><br />

375/377, Babu Bldg., <br />
Office. No. 20, 2nd Floor,<br />
Lamington Road,<br />
Grant road (E),<br />
Mumbai - 400 007. India<br /><br />

<strong>Tel.:</strong> +91 22 40811234<br />
<strong>Mobile:</strong> +91 9987784009<br /><br />
<strong>Fax:</strong> +91 22 28903558 Ext 113.<br /><br />
<strong>Email:</strong> <a href="mailto:e-mail : sales@ecreativeindia.com" >sales@ecreativeindia.com</a><br />
</td>
  </tr>
</table>';

}
?>

</div>

</div>
<!-- container ends here -->

<?php include('includes/footer.php');
?>
