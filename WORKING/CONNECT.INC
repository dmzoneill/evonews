<?php

$connect;
connectToDB();
function connectToDB(){

require('conf.php');

global $connect;

$connect = mysql_connect("$dbhost", $dbuser, $dbpass);
if (!$connect) die ("Connection to host : <b> $dbhost </b> unsucessfull");

mysql_select_db( $dbname, $connect ); 
$database = mysql_select_db( $dbname, $connect );


}

?>