<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title><?php echo "$title"; ?></title>
</head>

<body>

<center>
<br>

Php News Poster

<br>
<?php

require("conf.php");
require ('connect.inc');

$postresult= mysql_query( "SELECT * FROM news_posted ORDER BY idposted DESC");

print "<table width=100% cellpadding=5 bgcolor=aaaaff border=1>\n";
while ( $a_row = mysql_fetch_array( $postresult ) ){
print "<tr>
<td width=100%><font color=white size=2 face=verdana>$a_row[subject] </font><font color=red size=1 face=arial><b> Posted by</b> :$a_row[poster] <b>on the</b> $a_row[whattime]</font></td>\n
</tr>
<tr>\n
<td width=75%><font color=black size=2 face=arial>$a_row[messages]</font></td>\n
</tr>";
}
print "</table>\n";


?>

</body>
</html>
