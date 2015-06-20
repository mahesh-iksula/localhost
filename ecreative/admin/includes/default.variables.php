<?php 

// DATE AND TIME INDIAN TIME ZONE
//date_default_timezone_set('India');
$datentime= date("Y-m-d H:i:s");

// QUERYSTRING REPLACE
$_SERVER['QUERY_STRING']=str_replace('&', ' AND ', $_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace('_', '_', $_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace('+', ' ', $_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace("%27", "'", $_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace('%22', '"', $_SERVER['QUERY_STRING']);
$_SERVER['QUERY_STRING']=str_replace('%60', '`', $_SERVER['QUERY_STRING']);



// LOG OUT 
if($_GET['logout']=='y'){
unset($_SESSION['un']);
unset($_SESSION['aid']);
session_destroy();
echo'<script type="text/javascript">
<!--
function delayer(){
    window.location = "index.php"
}
setTimeout(\'delayer()\', 10)
//-->
</script>';
}



?>