
<?php

require("conf.php");
require ('connect.inc');

echo "$title"; 


print "<table height='$theight' width='$twidth' border='$tborder' cellpadding='$tpadding' cellspacing='$tspacing'>";
while($a_row = mysql_fetch_array($mes)){
echo("
<tr><td width='$twidth' bgcolor='$tbg1'>
<font color='$fcolor' size='$fsize' face='$fface'>$a_row[subject]</font><br>
<font color='$fcolor2' size='$fsize2' face='$fface2'>Posted by : $a_row[poster] on the $a_row[whattime]</font>
</td></tr><tr>
<td width='$twidth' bgcolor='$tbg1'>
<font color='$fcolor2' size='$fsize2' face='$fface2'>$a_row[messages]</font>
</td></tr>");
}
print "</table>";


?>

