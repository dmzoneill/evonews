<?php

require ('connect.inc');


$db_res = mysql_list_dbs($connect);
while ( $db_rows = mysql_fetch_row ($db_res ))
{
print "<b>$db_rows[0]</b>\n";
if (!@mysql_select_db( $db_rows[0], $connect))
{
print "blah" . mysql_error() . "</dl>";
continue;
}
$tab_res = mysql_list_tables($db_rows[0], $connect);
print "\t<dl><dd>\n";
while ($tab_rows = mysql_fetch_row($tab_res))
{
print "<b>$tab_rows[0]</b>\n";
$query_res = mysql_query( "SELECT * from $tab_rows[0]" );
$num_fields = mysql_num_fields($query_res);
print "\t<dl><dd>\n";
for ($x=0; $x<$num_fields; $x++)
{
print "\t\t<i>";
print mysql_field_type($query_res, $x);
print "</i> <i>";
print mysql_field_len($query_res, $x);
print "</i> <b>";
print mysql_field_name($query_res, $x);
print "</b> <i>";
print mysql_field_flags($query_res, $x);
print "</i><br>\n";
}
print "\t\t</dl>\n";
}
print "\t</dl>\n";
}
mysql_close($connect);
?>






