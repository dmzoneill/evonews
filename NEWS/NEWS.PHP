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
require ('connect.php');

echo "$style"; 
echo "<center>$title"; 


if (!$topics){

while($a_row = mysql_fetch_array($mes)){
echo("<center><table height='$theight' width='$twidth' border='$tborder' cellpadding='$tpadding' cellspacing='$tspacing'>
<tr><td width='$twidth' bgcolor='$tbg1'>
<font color='$fcolor' size='$fsize' face='$fface'>$a_row[subject]</font><br>
<font color='$fcolor2' size='$fsize2' face='$fface2'>Posted by : $a_row[poster] on the $a_row[whattime]</font>
</td></tr><tr><td width='$twidth' bgcolor='$tbg2'>
<font color='$fcolor2' size='$fsize2' face='$fface2'>$a_row[messages]</font>
<hr>
</td></tr></table><br>");
}

}








if($topics){

while($a_row = mysql_fetch_array($messy)){
echo("<center><table height='$theight' width='$twidth' border='$tborder' cellpadding='$tpadding' cellspacing='$tspacing'>
<tr><td width='$twidth' bgcolor='$tbg1'>
<font color='$fcolor' size='$fsize' face='$fface'>$a_row[subject]</font><br>
<font color='$fcolor2' size='$fsize2' face='$fface2'>Posted by : $a_row[poster] on the $a_row[whattime]</font>
</td></tr><tr><td width='$twidth' bgcolor='$tbg2'>
<font color='$fcolor2' size='$fsize2' face='$fface2'>$a_row[messages]</font>
<hr>
</td></tr></table><br>");
}

}







if($topics_num_rows>$mes){
print "<center><table><tr><td><form action=$PHP_SELF><br>
<input type=hidden name=topics value=true>
From : </td><td><input type=text name=start value=10></td></tr><tr><td>
To : </td><td><input type=text name=stop value=20><br></td></tr><tr><td>
</td><td><input type=submit class='button' value='Show Topics'><br></form></td></tr></table>";
}

?>

