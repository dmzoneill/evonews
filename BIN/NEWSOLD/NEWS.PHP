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


require("conf.php");
require ('connect.inc');

echo "$title"; 

while($a_row = mysql_fetch_array($mes)){
echo("<table height='$theight' width='$twidth' border='$tborder' cellpadding='$tpadding' cellspacing='$tspacing'>
<tr><td width='$twidth' bgcolor='$tbg1'>
<font color='$fcolor' size='$fsize' face='$fface'>$a_row[subject]</font><br>
<font color='$fcolor2' size='$fsize2' face='$fface2'>Posted by : $a_row[poster] on the $a_row[whattime]</font>
</td></tr><tr><td width='$twidth' bgcolor='$tbg2'>
<font color='$fcolor2' size='$fsize2' face='$fface2'>$a_row[messages]</font>
<hr>
</td></tr></table><br>");
}



?>

