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




$dbhost = "localhost";
$dbuser = "username";
$dbpasswd = "password";
$dbname = "database name";























// ---------------------------------
// no need to edit below this point
// ---------------------------------


$arial1 = "<font face=arial size=1>";
$arial2 = "<font face=arial size=2>";


$auth = "<br><br><br><br><center><h3>Not authorizied</h3></center><script language=javascript>
setTimeout(\"document.location.href='login.php?type=yes';\", 1500);
</script>";

$problem = "<br><br><center><h3>failed / not authorized</h3><script language=javascript>
setTimeout(\"document.location.href='login.php?type=yes';\", 10);
</script>";

$refresh = "<script language=javascript>
setTimeout(\"document.location.href='$HTTP_REFERER&done';\", 2000);
</script>";

$smiles = "<br>
<table border=1 width=400 cellpadding=5><tr>
<td width=100 bgcolor=#f5ea03>
<b>$arial2 Code</b></td>
<td width=100 bgcolor=#f5ea03>
<b>$arial2 Smile</b></td>
</tr><tr>
<td width=100 bgcolor=#f5ea03>
$arial2 :grin:</td><td width=100 bgcolor=#f5ea03>
<img src=images/grin.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
$arial2 :mad: </td><td width=100 bgcolor=#f5ea03>
<img src=images/mad.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
$arial2 :happy: </td><td width=100 bgcolor=#f5ea03>
<img src=images/happy.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
$arial2 :sad: </td><td width=100 bgcolor=#f5ea03>
<img src=images/sad.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
$arial2 :lol: </td><td width=100 bgcolor=#f5ea03>
<img src=images/lol.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
$arial2 :wink : </td><td width=100 bgcolor=#f5ea03>
<img src=images/wink.gif border=0>
</td></tr></table>";





?>