<?php
/* 
EvoNews written by neiller at evobb dot com (neiller@evobb.com)

Also available EvoBB co-producer with Xavic and fod 
available for donwload @ http://www.evobb.com...

Note: you can edit below this but its not advised, 
once you have installed please make sure to delete this script or at least chmod it to 111..
If stuff is editable it will say it next to the code in the comments..

Make sure to edit the conf.php before you start installing your EvoNews :)
*/



require('conf.php');
require('connect.inc');


//------------------------
// Header
//------------------------


echo("
<html>
<head>
<title> $title </title>
</head>
<body leftmargin=0 topmargin=20 bgcolor=#ffffff rightmargin=0 text=black alink=#f5ea03 vlink=#444484><center>

<table border=1 cellpadding=5 width=630><tr><td bgcolor=#000084 valign=top width=100%>
<div align=right>
<a href='admin.php?action=news'><font face=verdana size=2 color=white>News topics</a> : $topics_num_rows
<a href='admin.php?action=users'><font face=verdana size=2 color=white>User Accounts</a> : $users_num_rows
</div>
</td></tr></table>

<table border=1 cellpadding=5 width=630><tr><td bgcolor=#f5ea03 valign=top width=20%>
<font face=verdana size=2>
<a href=\"admin.php?action=news\">News</a><br>
<a href=\"admin.php?action=makenews\">Make News</a><br>
<a href=\"admin.php?action=editnews\">Edit News</a><br><br>
<a href=\"admin.php?action=users\">Users</a><br>
<a href=\"admin.php?action=makeusers\">Make User</a><br>
<a href=\"admin.php?action=edituser\">Edit User</a><br><br>

<a href=\"admin.php?action=settings\">Settings</a><br>
<a href=\"admin.php?action=falselogins\">False Logins</a><br>
</font>


</td>
<td valign=top width=80%>

");


?>