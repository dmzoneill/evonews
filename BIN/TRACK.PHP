<?php

if($userpass

$browsingid = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));
require("connect.inc");


$result = mysql_query("select * from news_sessions where browsingid = '$browsingid'");
if (mysql_num_rows($result)<1){
mysql_query("insert into news_sessions (browsingid, username, loggedin) values ('$browsingid', 'guest', '0')");
}

$result = mysql_query("select * from news_sessions where browsingid = '$browsingid' && loggedin = '1'", $connect);
$result2 = mysql_query("select * from news_sessions");


if (mysql_num_rows($result2)>0){
$loggedin = "yes";
$username = mysql_result($result, 0, 1);
} else {
unset($loggedin);
}





?>