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


print "</td></tr></table>
<table border=1 cellpadding=5 width=630><tr><td bgcolor=#000084 valign=top width=100%>
<div align=right>
<a href='admin.php?action=news'><font face=verdana size=2 color=white>News topics</a> : $topics_num_rows
<a href='admin.php?action=users'><font face=verdana size=2 color=white>User Accounts</a> : $users_num_rows
</div>
</td></tr></table>
";

mysql_close( $connect );

?>