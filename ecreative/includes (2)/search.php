<?php
if (isset($_POST['email']) && $_POST['email']!==''){

// code for registration for news letter 
$result=mysql_query('INSERT INTO `newsletter` (`email`, `datentime`) VALUES (\''.$_POST['email'].'\', NULL);');

if($result== true){ echo'<script language="JavaScript" type="text/javascript">alert("Thank you!!");</script>'; }

}

echo '
				<!-- search starts here -->
				
				<div id="search">
				
				<div class="newsletter">
				<form action="search_all.php" method="post"  >
				<input type="text" size="28" onblur="if(this.value==\'\'){this.value=\'.Enter search keyword\'};" onfocus="if(this.value==\'.Enter search keyword\'){this.value=\'\'};" value=".Enter search keyword" name="search" class="nslinput" />
				<input type="image" src="images/search.jpg" name="submit" />
				</form>
				</div>
				
				<div class="newsletter">
				<form action="" method="post" name="email_check" >
				<input type="text" size="28" onblur="if(this.value==\'\'){this.value=\'.Newsletter Signup\'};" onfocus="if(this.value==\'.Newsletter Signup\'){this.value=\'\'};" value=".Newsletter Signup" name="email" class="nslinput" />
				<input type="image" src="images/newsletter.jpg" name="submit" />
				</form>
				<script language="JavaScript" type="text/javascript">new validateForm(document.forms["email_check"]);</script>
				</div>
				
				</div>
				
				<!-- search ends here -->';

?>