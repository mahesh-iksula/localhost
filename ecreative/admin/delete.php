<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
include('includes/leftpanel.php');
echo '<div id="container" >';

$query=$_SERVER['QUERY_STRING'];


if(mysql_query($query)==true){

//$_SERVER['HTTP_REFERER'];

$_SESSION['sucdel']='Sucessfully deleted';

}else{

echo '';

}



echo '</div>'; 


echo '<script type="text/javascript">
<!--
function delayer(){
    window.location = "'.$_SERVER['HTTP_REFERER'].'"
}
setTimeout(\'delayer()\', 10)
//-->
</script>';

include('includes/footer.php');
}
?>