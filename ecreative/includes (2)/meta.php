<?php
//ERROR REPORTING OFF
error_reporting(E_ALL);

ini_set("display_errors", 0);

//START SESSTION
session_start();

//MYSQL CONFIG
include('mysql.config.php');

// DEFAULT VARIABLES
include('default.variables.php');

// PAGGINATION CLASS
include('pagination.class.php');


echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>

<!-- meta tags starts here -->
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
			<meta content="Laptops, Desktops, Distributions " name="keywords" />
			<meta content="Creative Peripherals &amp; Distributions Pvt. Ltd. a company incorporated in 1992 with just three people is a Rs. 540 Millions organization today employing over 80 people and having total of 3 group companies. " name="description" />

			<meta content="english" name="Language" />
			<meta name="robots" content="index,follow"/>
<!-- meta tags ends here -->


<!-- js starts here -->
<script type="text/javascript" src="js/validation.js"></script>
<!-- js ends here -->

<!-- div slide starts here -->
<link rel="stylesheet" type="text/css" href="css/style-slide.css" />
<script type="text/javascript" src="js/crossfade.js"></script>		
<!-- <script type="text/javascript" src="js/jquery_004.js"></script>		
<script type="text/javascript" src="js/script.js"></script>  -->
<!-- div slide ends here -->

<!-- style sheet starts here -->
			<link rel="shortcut icon"  href="fevicon.ico"  />
			<link href="css/media-print.css" rel="stylesheet" type="text/css" media="print" />
			<link href="css/media-screen.css" rel="stylesheet" type="text/css" media="screen" />
<!-- style sheet ends here -->

			<title>Creative Peripherals &amp; Distribution Pvt. Ltd.</title>

';

?>