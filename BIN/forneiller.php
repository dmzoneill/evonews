<?php

require("conf.php");
include("connect.inc");
include("session.inc");
include("header.php");


// --------------
// mysql queries  
// --------------

$postresult= mysql_query( "SELECT * FROM news_posted ORDER BY idposted DESC");
$post_num_rows = mysql_num_rows( $postresult );

$userresult= mysql_query( "SELECT username FROM news_users" );
$users_num_rows = mysql_num_rows( $userresult );

$userediter = mysql_query( "SELECT * FROM news_users" );


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
New Password : <input type=\"text\" name=\"newpasswd\"></td>\n
</tr>\n
<tr>\n
<td>
Old Password : <input type=\"text\" name=\"oldpasswd\"></td>\n
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




if($userfix){
$step = "userdetails";
}
if ($step==userdetails){

$passwddb = "select password from news_users where id = '$id'";
$result = @mysql_query($passwddb, $db);

$usersoldpassword = md5($oldpasswd);
$password1 = md5($newpasswd);

if($result==$usersoldpassword) {
$sql2 = "update news_users set password = '$password1' where id = '$id'";
$resultup = @mysql_query($sql2, $db) or die("crap");
} 
else {
die("passwords didn't match");
}



print "password changed";


}

?>
