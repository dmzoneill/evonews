<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php

require("conf.php");
include("connect.inc");

$browsingid = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));
$result = mysql_query("select * from news_sessions where browsingid='$browsingid'");
mysql_query($result,$connect);

$sql = "insert into news_sessions (browsingid, username, password) values ('$browsingid', 'webmaster', 'password')";
$result = mysql_query($sql, $database);
echo $sql;

?>

</body>
</html>
