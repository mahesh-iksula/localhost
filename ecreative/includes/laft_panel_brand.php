<?php 



echo '
<!-- LEFTPANEL STARTS HERE -->
<div class="leftpanel">

<!-- PANEL CONT ANNOUNCEMENTS STARTS HERE -->
<div class="panelcont">
	<h3 class="green">BRAND DETAILS</h3>
		<div class="marl10 marr10 floatl">';
		
		$result=mysql_query('SELECT * FROM `'.$myDB.'`.`brand`,`'.$myDB.'`.`employees` where `brand`.`employee_id`=`employees`.`employee_id` AND `brand`.'.$_SERVER['QUERY_STRING']);

		$row=mysql_fetch_assoc($result);
		echo '<img src="images/brands/thumb/'.$row['brandimg'].'" alt="'.$row['brandname'].'" title="'.$row['brandname'].'" border="0" class="floatr padt5" width="80" />

		<span><br /><strong>Brand: </strong>'.$row['brandname'].'<br /><br />
		<strong>URL: </strong><a href="'.$row['url'].'" target="_blank" class="txtgray">'.$row['url'].'</a>
		</span>
<span class="w100p padt10 floatl">
<strong>About us: </strong>'.$row['title_txt'].'</span>
<span class="w100p floatl mart10"><strong>About Brand: </strong>'.$row['brand_txt'].'</span>
<span class="w100p mart10 floatl"><strong>Brand Manager: </strong>'.$row['emp_name'].' '.$row['emp_lastname'].'</span>
<span class="w100p mart10 floatl"><strong>Email: </strong><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></span>
<span class="w100p mart10 floatl"><strong>Cell: </strong>'.$row['cellno'].'<br />&nbsp;</span>
		
		
		</div>
</div>
<!-- PANEL CONT ANNOUNCEMENTS ENDS HERE -->


<!-- PANEL CONT OTHER BRANDS WE DO STARTS HERE -->
<div class="panelcont">
	<h3 class="green">Brands we do</h3>
		<div class="marl10 marr10"><ul>';
		$result=mysql_query('SELECT * FROM `brand`');
		while($row=mysql_fetch_array($result)){
echo '<li style="width:80px; height:80px; " class="floatl"><a href="branddetail.php?brandid='.$row['brandid'].'" ><img src="images/brands/thumb/'.$row['brandimg'].'" width="80" alt="" border="0" class="floatl" /></a></li>';
}
		echo '</ul>
		</div>
</div>
<!-- PANEL CONT OTHER BRANDS WE DO ENDS HERE -->




<!-- LEFTPANEL ENDS HERE -->
</div>
';





?>