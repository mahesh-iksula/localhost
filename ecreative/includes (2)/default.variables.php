<?php 


// DEFAULT SITE VARIABLES
// use for images location, 
$url='http://localhost/';

$_SERVER['QUERY_STRING']=str_replace("%27","'",$_SERVER['QUERY_STRING']);
//$_SERVER['QUERY_STRING']=str_replace("&"," AND ",$_SERVER['QUERY_STRING']);
//$_SERVER['QUERY_STRING']=str_replace("_"," ",$_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace("+"," ",$_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace("&amp;"," AND ",$_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace("&"," AND ",$_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace("%60","`",$_SERVER['QUERY_STRING']);







//LEFT PANEL 

function leftpanel($one){

if($_SERVER['PHP_SELF']=='/index.php' || $_SERVER['PHP_SELF']=='/pdetails.php' ){ 
echo '<div class="quicklink">
<ul>
<li class="header">SUB CATEGORY</li>
<li><a href="scat_landing.php?~mcatid=1">Laptops</a></li>
<li><a href="scat_landing.php?~mcatid=2">Desktops</a></li>
<li><a href="scat_landing.php?~mcatid=3">Components</a></li>
</ul>
</div>'; 
}

}






?>