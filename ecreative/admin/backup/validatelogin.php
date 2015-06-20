<?php 
include('includes/meta.php');
include_once('includes/pagination.class.php');


echo'</head>
<body>';if (session_is_registered('un') && session_is_registered('aid') ){
include('includes/header.php');
echo '<div id="container" >';



echo '';




echo '</div>';
include('includes/footer.php');
}
?>