<?php

require("conf.php");
include("connect.inc");
include("session.inc");
include("header.php");

?>



<?php

$userresult= mysql_query( "SELECT username FROM news_users");
$num_rows = mysql_num_rows( $userresult );

print "<table>\n";
while ( $a_row = mysql_fetch_row( $userresult ) )
{
print " <tr>\n";
foreach ( $a_row as $field )
print "\t<td>$field</td>\n";
print "</tr>\n";
}
print "</table>\n";

?>


<?php

mysql_close( $connect );
?>