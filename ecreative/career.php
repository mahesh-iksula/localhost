<?php include('includes/meta.php'); ?>
<script type="text/javascript" src="jscripts/validations.js">

</script>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>


<?php echo'
</head>

<body>

';
include('includes/header.php');




echo '
<!-- container starts here -->
<div id="container" >';
	include('includes/laft_panel.php');

echo'<div class="conteint">';

echo '<img src="images/careers.jpg" />
<p class="w70p">A career with Creative is more than just a day job. It\'s an opportunity to join a company who give working a challenging experience within a familiar atmosphere.<br />
<br />
Joining Creative means getting more out of your working life than you thought possible.</
<p></p>
<form action="careersmail.php" enctype="multipart/form-data" method="post" onsubmit="return validateFormOnSubmit(this)">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="careers" >
  <tr>
    <td>Name:*</td>
    <td><input type="text" maxlength="20" name="name" /></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><input type="text" maxlength="10" name="dob" /></td>
  </tr>
  <tr>
    <td>Cell Phone*</td>
    <td><input type="text" maxlength="10" name="cell" /></td>
  </tr>
  <tr>
    <td>Email*</td>
    <td><input type="text" maxlength="50" name="candidateemail" /></td>
  </tr>
  <tr>
    <td>Apply for position</td>
    <td><select name="designation">
    <option value="NULL">Select</option>
    <option>Purchase</option>  
    <option>Sales</option>  
    <option>Administration</option>  
    <option>Other</option>  
    </select></td>
  </tr>
  <tr>
    <td>Year of Experience</td>
    <td><input type="text" maxlength="10" name="yexp" /></td>
  </tr>
  <tr>
    <td>Brief Profile</td>
    <td><textarea name="profile" maxlength="1000" ></textarea><br />
	<span>Please copy past your profile here in 1000 chars.</span>
	</td>
  </tr>
<!-- <tr>
    <td>Attache your cv</td>
    <td><input type="file" name="attachcv" />
	<span class="txtgray">*.doc or *.docx file only.</span></td>
  </tr> -->
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Send"  /></td>
  </tr>
</table>


</form>







</div>

</div>
<!-- container ends here -->
';
include('includes/footer.php');
?>
