<?php 



echo '
<!-- LEFTPANEL STARTS HERE -->
<div class="leftpanel">

<!-- PANEL CONT ANNOUNCEMENTS STARTS HERE -->
<div class="panelcont">
	<h3 class="green">ANNOUNCEMENTS</h3>
		<div class="marl10 marr10 floatl"><ul>
<!--		<marquee behavior="slide" onmouseover="this.stop();" onmouseout="this.start();"  scrolldelay="220"  direction="up" style="height:50px"> -->
		';
		$result=mysql_query('SELECT * FROM `announcement` ORDER BY a_id DESC LIMIT 0, 3');
		while($row=mysql_fetch_array($result)){echo '
		<li><a href="announcement_detailed.php?a_id='.$row['a_id'].'" >'.substr($row['a_title'], 0, 80).'.. </a></li>';
		}
		echo ' <!-- </marquee> -->
				<li><a href="announcement.php" >read more...</a></li></ul>
		</div>
</div>
<!-- PANEL CONT ANNOUNCEMENTS ENDS HERE -->




<!-- PANEL CONT NEW ARRIVALS STARTS HERE -->
<div class="panelcont">
	<h3 class="green">NEW ARRIVALS</h3>
		<div class="mart10 floatl">';
		$result=mysql_query('SELECT * FROM `config` ORDER BY CID DESC LIMIT 0, 2' );
		while($row=mysql_fetch_array($result)){echo '
		<div class="marl10 marr10 txtal marb10 floatl">
		<span class="w190 floatl padt5"><a href="'.$row['purl'].'" class="txtgray" target="_blank" >'.substr($row['model'], 0, 50).' </a>
		<br />
		<a href="'.$row['purl'].'" target="_blank" class="padt10 floatl txtgreen2 txtb">View Details</a></span>
		<img src="images/products/thumb/'.$row['pimg'].'" alt="'.$row['model'].'" title="'.$row['model'].'" width="70" />
		</div>		
		';
		}
		echo '
</div>
</div>
<!-- PANEL CONT NEW ARRIVALS ENDS HERE -->





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




<!-- LEFTPANEL ENDS HERE -->
</div>
';





?>