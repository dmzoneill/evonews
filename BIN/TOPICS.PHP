<?php

require("conf.php");
include("connect.inc");

?>


<?php

$result= mysql_query( "SELECT * FROM news_posted ORDER BY idposted DESC");
$num_rows = mysql_num_rows( $result );

print "<table width=100% cellpadding=5 bgcolor=aaaaff border=1>\n";
print "<tr>";
print "<td width=75%><b>Subject</b></td><td width=25%><b>Poster</b></td>";
print "</tr>";
print "</table>\n";

print "<table width=100% cellpadding=5 bgcolor=aaaaff border=1>\n";
while ( $a_row = mysql_fetch_array( $result ) )
{
print "<tr>";
print "<td width=75%>$a_row[subject]</td><td width=25%>$a_row[poster]</td>";
print "</tr>";
print "<tr>";
print "<td><b>Time</b> : $a_row[whattime]</td>";
print "</tr>";
print "<tr>";
print "<td width=75%>$a_row[messages]</td>";
print "</tr>";
}
print "</table>\n";

?>


<!------end ------>
</body>
</html>
