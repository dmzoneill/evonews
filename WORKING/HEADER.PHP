<?php
require('conf.php');

//------------------------
// mysql connect
//------------------------

$connect = mysql_connect("$dbhost", $dbuser, $dbpass);
mysql_select_db( $dbname, $connect ); 
$database = mysql_select_db( $dbname, $connect );

if (!$connect) print "Connection to host : <b> $dbhost </b> unsucessfull";
if (!$database) print "Connection to database : <b>$dbname</b> unsucessfull";

$news_topics_num = mysql_query( "SELECT * FROM news_posted");
$topics_num_rows = mysql_num_rows( $news_topics_num );

$news_users_num = mysql_query( "SELECT * FROM news_users");
$users_num_rows = mysql_num_rows( $news_users_num );

//------------------------
// Header
//------------------------


echo("
<html>
<head>
<title> $title </title>
</head>
<body leftmargin=0 topmargin=0 bgcolor=#ff9944 rightmargin=0><center>

<table border=0 cellpadding=5 width=630><tr><td valign=top width=100%>
<div align=left>
<a href='admin.php?action=news'>News topics</a> : $topics_num_rows
<a href='admin.php?action=users'>User Accounts</a> : $users_num_rows
</div>
</td></tr></table>

<table border=1 cellpadding=5 width=630><tr><td valign=top width=20%>

<a href=\"admin.php?action=login\">Login</a><br><br>
<a href=\"admin.php?action=news\">News</a><br>
<a href=\"admin.php?action=makenews\">Make News</a><br>
<a href=\"admin.php?action=editnews\">Edit News</a><br><br>
<a href=\"admin.php?action=users\">Users</a><br>
<a href=\"admin.php?action=makeusers\">Make User</a><br>
<a href=\"admin.php?action=edituser\">Edit User</a><br>


</td>
<td valign=top width=80%>

");


?>