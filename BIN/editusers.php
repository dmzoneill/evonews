<?php

require("conf.php");
include("connect.inc");
include("session.inc");
include("header.php");


// --------------
// mysql queries  
// --------------

$userediter = mysql_query("SELECT * FROM news_users");
$dbpasswd = mysql_query("SELECT password FROM news_users WHERE idusers=$id");
$editusername = mysql_query("UPDATE news_users set username='$username', password='$password1', email='$email' where idusers='$id'");




// -------------------------
// cell contents alignment
// -------------------------

print "<center>";


if (isset($action) && $action=="edituser"){

while ( $a_rowuser = mysql_fetch_array( $userediter ) )
{
print "
<form action=\"$PHP_SELF\" method=\"POST\">
<table width=100% cellpadding=5 bgcolor=aaaaff border=1>
<tr>
<td width=100%>
Username : <input type=\"text\" name=\"username\" value=\"$a_rowuser[username]\"></td>\n
</tr>\n
<tr>\n
<td>
Password new : <input type=\"password\" name=\"password1\" value=\"$a_rowuser[password]\"></td>\n
</tr>\n
<tr>\n
<td>
Password old : <input type=\"password\" name=\"password2\"></td>\n
</tr>\n
<tr>\n
<td width=100%>
Email : <input type=\"text\" name=\"email\" value=\"$a_rowuser[email]\">
</td>\n
</tr><tr><td>
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"userfix\" value=\"userdetails\">
<input type=\"submit\" value=\"Submit!\">
</td></tr></form></table><br>";
}
}


if($userfix & $password2===$dbpasswd){
$step = "userdetails";
}

if ($step=="userdetails"){
mysql_query($editusername,$connect);

if ($password2==$dbpasswd){
print "yes";
}

if (!$password2==$dbpasswd){
print "no";
}
}







print "</center>";
include('footer.php');

?>
