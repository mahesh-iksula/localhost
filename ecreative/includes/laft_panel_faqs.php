<?php 



$query="SELECT * FROM `faqs_cat`  ";
$result=mysql_query($query);
echo '
<div class="leftpanel">
<div class="panelcont">
	<h3 class="green">FAQs Category</h3>';

while($row=mysql_fetch_array($result)){echo '
<span><a href="faqs.php?faqscatid='.$row['faqscatid'].' " >'.$row['faqs_catname'].' </a></span> <br /> ';
}

echo'</div>





<!-- PANEL CONT NEW ARRIVALS STARTS HERE -->
<div class="panelcont">
	<h3 class="green">Partners and Customers</h3>
		<div class="marl10 marr10">
		<marquee behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();"  scrolldelay="120" style="width:100%">';
		$result=mysql_query('SELECT * FROM `client` order by clid desc ');
		while($row=mysql_fetch_array($result)) {echo '
<img src="images/clientel/thumb/'.$row['clientlogo'].'" alt="'.$row['clientname'].'" class="marl10 mart10" width="120" >';
		}
		echo '</marquee>
		</div>
</div>
<!-- PANEL CONT NEW ARRIVALS ENDS HERE -->

<!-- PANEL CONT DEALER REG FORM STARTS HERE -->
<div class="panelcont">
<a href="Dealer_Registration_form.pdf"><img src="images/customer_eveluation_form.jpg" alt="Dealer Registration Form" border="0" class="mart10 floatl" /></a>
</div>
<!-- PANEL CONT DEALER REG FORM ENDS HERE -->




</div>';

?>