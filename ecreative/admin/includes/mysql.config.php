<?php
//LOCAL SERVER SETTINGS
$myServer = 'db359216365.db.12426843.hostedresource.com';
$myUser = 'db359216365';
$myPass = 'Ecreative2014#';
$myDB = 'db359216365';
//connection to the database
$dbhandle = mysql_connect($myServer, $myUser, $myPass) or die("Couldn't connect to SQL Server on $myServer");
//select a database to work with
$selected = mysql_select_db($myDB, $dbhandle)
  or die("Couldn't open database $myDB");

?>