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
include("connect.php");
include("style.css");





if($page){
$topic = "$page";
}
else {
$topic = "login";
}


print "<title> $title - $page </title><br><br><br><center>
<table border=0 cellpadding=0 width=630  bgcolor=#106090><tr>
<td valign=top width=100% bgcolor=#106090><center><font color=white size=4 face=verdana>
$topic</td></tr><tr><td valign=top width=100% bgcolor=ffffff>";







if(!$page){
print "<form method=post action=\"login.php?page=loggingin\">

<table border=0 width=98%  bgcolor=#ffffff>
<tr>
<td align=right>$arial2 Username:</td>
<td><input type=text name=userlogin></td>
</tr>
<tr>
<td align=right>$arial2 Password:</td>
<td><input type=password name=passlogin></td>
</tr>
<tr>
<td align=right>$arial2 &nbsp;</td>
<td><input type=submit value=\"Login\" class=\"button\">
<input type=button value='Lost Password' class=\"button\" onClick=\"javascript:document.location.href='login.php?page=lostpassword'\">
<input type=\"hidden\" name=\"step\" value=\"auth\"></form>
</td>
</tr>
</table>";

}







if($page=="loggingin"){

$idbrowse = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));
$howmanyrows = mysql_query("SELECT * FROM news_cookie");
$get = mysql_num_rows($howmanyrows);
$exist = "SELECT * FROM news_cookie WHERE browsingid='$idbrowse'";

if(mysql_query($exist,$connect)){
mysql_query("DELETE FROM news_cookie");
}


$whattime = time();
$timer = $whattime-300;
$delete = "DELETE from news_cookie where timeout>=$timer";
mysql_query($delete,$connect);


$dothepass = md5($passlogin);
print "<br><center>$arial2 Authorization steps in process ....<br><br>";
$sql = "INSERT INTO news_cookie (browsingid, username, password, timeout) values ('$idbrowse', '$userlogin', '$dothepass','$whattime')";
mysql_query($sql, $connect);
print "<body onLoad=\"javascript:document.location.href='admin.php?'\">";

}







if($page=="lostpassword"){

if (!$do=="it"){
echo("<center><br>
<form method=post action=\"login.php?page=lostpassword&do=it\">
$arial2 Enter E-Mail Address :<br>
<input type=text name=lostpassemail><br>
<input type=submit value=\"Get New Password\" class=button><br>
</form>");
}


if ($do=="it"){
print "<center><br><br><br>";
$from = "EvoNews@yoursite.com";
$newpass = substr(uniqid(0),3,5);

if(mysql_query("select * from news_users where email='$lostpassemail'")){
$name = mysql_query("select username from news_users where email='$lostpassemail'");
$lost = mysql_result($name, 0, 0);

$changed = md5($newpass);
$updatepass="UPDATE news_users set password='$changed', username='$lost', email='$lostpassemail' where email='$lostpassemail'";
mysql_query($updatepass,$connect);


$subject = "Your New Password from Evo News";
$message  = "Hello, Your New Password is: $newpass\n if you have not requested this then please change your password!";

mail($lostpassemail, $subject, $message, $from);
print "<br><br>$arial2 Your New Password has been mailed to you.<br><br>
<script language=javascript>
setTimeout(\"document.location.href='login.php?type=yes';\", 2500);
</script>";

}
}


}


print "</td></tr><tr><td>
<center><br></center>
</td></tr></table>
</center>";





?>

</body
</html>