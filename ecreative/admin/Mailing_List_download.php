<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');

echo'</head> <body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');


include_once('includes/ImportExport.class.php');

echo '<div id="container" >

';

	$array=	array();

	$query = "SELECT * FROM `newsletter` ";

	$result=mysql_query($query);
	$array[]="Email Id; ";
	while($row=mysql_fetch_array($result)){
	$array[]=$row[email]."; ";
	}


	$ImportExport = new ImportExport;
	$Export=$ImportExport->Export(date('Y-m-d_H-i-s').".csv", $array);







	echo '<br /><strong>Please wait,</strong> Your download will begin in a moment...<br />
	 If it doesn\'t, click here to try again...<br />
	 <a href="'.$Export.'">'.$Export.'</a>';
	
	

	
	echo '<script type="text/javascript">
<!--
function delayer(){
    window.location = "Mailing_List.php"
}
setTimeout(\'delayer()\', 5000)
//-->
</script>';









echo'</div>';
include('includes/footer.php');
}
?>