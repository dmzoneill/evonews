<?php

/* 
EvoNews written by neiller at evobb dot com (neiller@evobb.com)

Also available EvoBB co-producer with Xavic and fod 
available for download @ http://www.evobb.com...

Note: you can edit below this but its not advised, 
once you have installed please make sure to delete install.php or at least chmod it to 111..
If stuff is editable it will say it next to the code in the comments..

Make sure to edit the conf.php before you start installing your EvoNews :)

NB : once logged in change your password :)
*/



require("conf.php");

$connect = @mysql_connect($dbhost, $dbuser, $dbpasswd) or die("<br><br><br><br><center><h4>Were Down</h4></center>");
$database = @mysql_select_db( $dbname, $connect );

if($connect){


$news_topics_num = mysql_query( "SELECT * FROM news_posted");
$topics_num_rows = mysql_num_rows( $news_topics_num );
$news_users_num = mysql_query( "SELECT * FROM news_users");
$users_num_rows = mysql_num_rows( $news_users_num );
$postresult = mysql_query( "SELECT * FROM news_posted ORDER BY idposted DESC");
$post_num_rows = mysql_num_rows( $postresult );
$userresult= mysql_query( "SELECT username FROM news_users" );
$users_num_rows = mysql_num_rows( $userresult );
$userediter = mysql_query( "SELECT * FROM news_users" );
$varsettings = mysql_query( "SELECT * FROM news_vars" );
$many = mysql_query("select howmany from news_vars where idvars='1'");
$howmany = mysql_result($many, 0, 0);
$mes = mysql_query( "select * from news_posted order by idposted DESC LIMIT $howmany");
$messy = mysql_query("SELECT * FROM news_posted WHERE idposted BETWEEN $start AND $stop ORDER BY idposted DESC");
$postresultadmin = mysql_query( "SELECT * FROM news_posted ORDER BY idposted");
$title2 = mysql_query("select title from news_vars where idvars='1'");
$title = mysql_result($title2, 0, 0);
$bgcolor2 = mysql_query("select bgcolor from news_vars where idvars='1'");
$bgcolor = mysql_result($bgcolor2, 0, 0);
$tborder2 = mysql_query("select tborder from news_vars where idvars='1'");
$tborder = mysql_result($tborder2, 0, 0);
$twidth2 = mysql_query("select twidth from news_vars where idvars='1'");
$twidth = mysql_result($twidth2, 0, 0);
$theight2 = mysql_query("select theight from news_vars where idvars='1'");
$theight = mysql_result($theight2, 0, 0);
$tpadding2 = mysql_query("select tpadding from news_vars where idvars='1'");
$tpadding = mysql_result($tpadding2, 0, 0);
$tspacing2 = mysql_query("select tspacing from news_vars where idvars='1'");
$tspacing = mysql_result($tspacing2, 0, 0);
$ok2 = mysql_query("select ok from news_vars where idvars='1'");
$ok = mysql_result($ok2, 0, 0);
$notok2 = mysql_query("select notok from news_vars where idvars='1'");
$notok = mysql_result($notok2, 0, 0);
$tbg11 = mysql_query("select tbg1 from news_vars where idvars='1'");
$tbg1 = mysql_result($tbg11, 0, 0);
$tbg22 = mysql_query("select tbg2 from news_vars where idvars='1'");
$tbg2 = mysql_result($tbg22, 0, 0);
$tbg33 = mysql_query("select tbg3 from news_vars where idvars='1'");
$tbg3 = mysql_result($tbg33, 0, 0);
$tbg44 = mysql_query("select tbg4 from news_vars where idvars='1'");
$tbg4 = mysql_result($tbg44, 0, 0);
$tbg55 = mysql_query("select tbg5 from news_vars where idvars='1'");
$tbg5 = mysql_result($tbg55, 0, 0);
$tbg66 = mysql_query("select tbg6 from news_vars where idvars='1'");
$tbg6 = mysql_result($tbg66, 0, 0);
$fface11 = mysql_query("select fface from news_vars where idvars='1'");
$fface = mysql_result($fface11, 0, 0);
$fcolor11 = mysql_query("select fcolor from news_vars where idvars='1'");
$fcolor = mysql_result($fcolor11, 0, 0);
$fsize11 = mysql_query("select fsize from news_vars where idvars='1'");
$fsize = mysql_result($fsize11, 0, 0);
$fface22 = mysql_query("select fface2 from news_vars where idvars='1'");
$fface2 = mysql_result($fface22, 0, 0);
$fcolor22 = mysql_query("select fcolor2 from news_vars where idvars='1'");
$fcolor2 = mysql_result($fcolor22, 0, 0);
$fsize22 = mysql_query("select fsize2 from news_vars where idvars='1'");
$fsize2 = mysql_result($fsize22, 0, 0);
$$style2 = mysql_query("select css from news_vars where idvars='1'");
$style = mysql_result($$style2, 0, 0);
}


?>