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
include("connect.inc");

// authorization script.. edit @ your own peril

if(isset($usernamelogin)){
$hty = "<br><br><br><center>User not found";
$passcheck = mysql_query("select password from news_users where username='$usernamelogin'") or die ("$hty");
$resultcheck = mysql_result($passcheck, 0, 0) or die("$hty");

if($passcheck){
$cryptpass = md5($password);

if ($cryptpass==$resultcheck){
$cookie_domain = '$domaincookie';  // your cookie domain, must edit
$goodcookie = $HTTP_COOKIE_VARS['goodcookie'];
$userpass = "$usernamelogin:$cryptpass";
      if ($userpass=="$username:$resultcheck"){      
      $cookiecontents = "yes";
      setcookie("goodcookie", $cookiecontents, time()+7*24*3600, "/", $cookie_domain);
      $goodcookie = "yes";
      }
}
else {
print "User-pass didn't match<br>";
}
}
}




if($goodcookie){
ob_start("ob_gzhandler");
include("header.php");
print "<center>";

$refresh = "<script language=javascript>
setTimeout(\"document.location.href='$HTTP_REFERER&done';\", 2500);
</script>";




if(!$action){
print "<center><br><br><br>Welcome to EvoNews :)<br><br>";
}






if ($action=="users"){
print "<table width=50% border=1 cellpadding=5>\n";
while ( $a_row2 = mysql_fetch_row( $userresult ) )
{
print " <tr>\n";
foreach ( $a_row2 as $field )
print "\t<td width=100% bgcolor=#f5ea03>$field</td>\n";
print "</tr>\n";
}
print "</table>\n";
}





if ($action=="makeusers"){
print "<center>
<form method=post action=\"admin.php?\">
<table border=1 width=400 cellpadding=5>
<tr>
<td bgcolor=#f5ea03>Username:</td>
<td bgcolor=#f5ea03><input type=text name=newuser value=username size=35></td>
</tr>
<tr>
<td bgcolor=#f5ea03>Password:</td>
<td bgcolor=#f5ea03><input type=password name=newpass value=password size=35></td>
</tr>
<tr>
<td bgcolor=#f5ea03>Email:</td>
<td bgcolor=#f5ea03><input type=text name=newemail value=someone@hotmial.com size=35></td>
</tr>
<tr>
<td bgcolor=#f5ea03>&nbsp;</td>
<td bgcolor=#f5ea03>
<input type=\"hidden\" name=\"user\" value=\"makeuser\">
<input type=submit value=\"Makeuser\">
</td>
</tr>
</table>
</form>
</center>";
}





if ($action=="edituser"){
while ( $a_rowuser = mysql_fetch_array( $userediter ) )
{
print "
<form action=\"admin.php?\" method=\"POST\">
<table width=100% cellpadding=5 border=1>
<tr>
<td width=100% bgcolor=#f5ea03>
Username : <input type=\"text\" name=\"username\" value=\"$a_rowuser[username]\" size=35></td>\n
</tr>\n
<tr>\n
<td bgcolor=#f5ea03>
New Password : <input type=\"password\" name=\"newpasswd\" size=35></td>\n
</tr>\n
<tr>\n
<td bgcolor=#f5ea03>
Old Password : <input type=\"password\" name=\"oldpasswd\" size=35></td>\n
</tr>\n
<tr>\n
<td width=100% bgcolor=#f5ea03>
Email : <input type=\"text\" name=\"email\" value=\"$a_rowuser[email]\" size=35>
</td>\n
</tr><tr><td bgcolor=#f5ea03>
<table><tr><td bgcolor=#f5ea03>
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"userfix\" value=\"userdetails\">
<input type=\"submit\" value=\"Submit!\"></form></td><td bgcolor=#f5ea03>
<form action=\"admin.php?\" method=\"POST\">
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"dropuser\" value=\"dropuser\">
<input type=\"submit\" value=\"Delete\"></form></td></tr></table>
</td></tr></table><br>";
}
}







if ($action=="news"){
include("news.php");
}







if ($action=="makenews"){
print "<center>
<form action=\"admin.php?\" method=\"POST\">
<table border=1 width=400 cellpadding=5><tr>
<td align=left bgcolor=#f5ea03>Post Subject:<br>
<input type=\"text\" name=\"subject\" size=35></td>
</tr>
<tr>
<td align=left bgcolor=#f5ea03>Your news:<br>
<textarea cols=\"40\" rows=\"10\" name=\"message\"></textarea></td>
</tr>
<tr>
<td align=left bgcolor=#f5ea03>
<input type=\"hidden\" name=\"post\" value=\"postit\">
<input type=\"submit\" value=\"Submit!\">
</td>
</tr>
</table>
<br>


<table border=1 width=400 cellpadding=5><tr>
<td width=100 bgcolor=#f5ea03>
<b>Code</b></td>
<td width=100 bgcolor=#f5ea03>
<b>Smile</b></td>
</tr><tr>
<td width=100 bgcolor=#f5ea03>
:grin:</td><td width=100 bgcolor=#f5ea03>
<img src=images/grin.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:mad: </td><td width=100 bgcolor=#f5ea03>
<img src=images/mad.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:happy: </td><td width=100 bgcolor=#f5ea03>
<img src=images/happy.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:sad: </td><td width=100 bgcolor=#f5ea03>
<img src=images/sad.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:lol: </td><td width=100 bgcolor=#f5ea03>
<img src=images/lol.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:wink : </td><td width=100 bgcolor=#f5ea03>
<img src=images/wink.gif border=0>
</td></tr></table>

</form>
</center>";
}







if ($action=="editnews"){

Print "<br><center><a href=admin.php?dropall=true>Drop all posts (Be Carefull!!!)</a><br><br>";

while ( $a_rowedit = mysql_fetch_array( $postresultadmin ) ){
print "<form action=\"admin.php?\" method=\"POST\">
<table width=100% cellpadding=5 border=1><tr>
<td width=100% bgcolor=#f5ea03><b>Subject $a_rowedit[idposted] : $a_rowedit[subject]</b></td></tr><tr>
<td width=100% bgcolor=#f5ea03>
Subject : <br><input type=\"text\" name=\"subject\" value=\"$a_rowedit[subject]\" size=35>\n
<br>
Posted by: <br><input type=\"hidden\" name=\"poster\" value=\"$a_rowedit[poster]\" size=35>$a_rowedit[poster]</td>\n
</tr>\n
<tr>\n
<td width=100% bgcolor=#f5ea03>
Posted on : <br><input type=\"text\" name=\"whattime\" value=\"$a_rowedit[whattime]\" size=35></td>\n
</tr>\n
<tr>\n
<td width=100% bgcolor=#f5ea03>
Message : <br><textarea cols=\"50\" rows=\"8\" name=\"message\">$a_rowedit[messages]</textarea>
</td>\n
</tr><tr><td bgcolor=#f5ea03>
<table><tr><td bgcolor=#f5ea03>
<input type=\"hidden\" name=\"id\" value=\"$a_rowedit[idposted]\">
<input type=\"hidden\" name=\"editpost\" value=\"edit\">
<input type=\"submit\" value=\"Edit\"></form></td><td bgcolor=#f5ea03>
<form action=\"admin.php?\" method=\"POST\">
<input type=\"hidden\" name=\"id\" value=\"$a_rowedit[idposted]\">
<input type=\"hidden\" name=\"drop\" value=\"droppost\">
<input type=\"submit\" value=\"Delete\"></form></td></tr></table>
</td></tr></table><br>";
}
echo("<br>
<table border=1 width=400 cellpadding=5><tr>
<td width=100 bgcolor=#f5ea03>
<b>Code</b></td>
<td width=100 bgcolor=#f5ea03>
<b>Smile</b></td>
</tr><tr>
<td width=100 bgcolor=#f5ea03>
:grin:</td><td width=100 bgcolor=#f5ea03>
<img src=images/grin.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:mad: </td><td width=100 bgcolor=#f5ea03>
<img src=images/mad.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:happy: </td><td width=100 bgcolor=#f5ea03>
<img src=images/happy.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:sad: </td><td width=100 bgcolor=#f5ea03>
<img src=images/sad.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:lol: </td><td width=100 bgcolor=#f5ea03>
<img src=images/lol.gif border=0>
</td></tr><tr><td width=100 bgcolor=#f5ea03>
:wink : </td><td width=100 bgcolor=#f5ea03>
<img src=images/wink.gif border=0>
</td></tr></table>");
}






if ($action=="settings"){
while ( $a_rowvar = mysql_fetch_array( $varsettings ) ){
print "</center>
<font face=verdana size=1>The following are the colors and widths etc for the output of your news..
I have added some extra variables which you can use in the output of your news, if your not happy with the html for the output edit the news.php</font><center>
<form action=\"admin.php?\" method=\"POST\">
<table width=100% cellpadding=5 border=1><tr>
<td width=35% bgcolor=#f5ea03>Cookie</td>
<td width=65% bgcolor=#f5ea03>$a_rowvar[cookie]</td></tr><tr>
<td width=35% bgcolor=#f5ea03>Title of your site :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[title]' name='title1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Bgcolor</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[bgcolor]' name='bgcolor1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>table border size :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tborder]' name='tborder123' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table width :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[twidth]' name='twidth1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table height :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[theight]' name='theight1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table Spacing</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tspacing]' name='tspacing1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table padding</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tpadding]' name='tpadding1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>News Topics / Page</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[howmany]' name='howmany1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>ok image</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[ok]' name='ok1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>not ok image</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[notok]' name='notok1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table bgcolor 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg1]' name='tbg111' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table bgcolor 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg2]' name='tbg211' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table bgcolor 3</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg3]' name='tbg311' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table bgcolor 4</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg4]' name='tbg411' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table bgcolor 5</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg5]' name='tbg511' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Table bgcolor 6</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg6]' name='tbg611' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Font face 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fface]' name='fface1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Font color 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fcolor]' name='fcolor1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Font size 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fsize]' name='fsize1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Font face 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fface2]' name='fface21' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Font color 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fcolor2]' name='fcolor21' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>Font size 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fsize2]' name='fsize21' size=35></td></tr><tr>
</tr><tr><td width=25% bgcolor=#f5ea03>
<input type=\"hidden\" name=\"setvars\" value=\"vars\">
<input type=\"submit\" value=\"Submit!\">
</td><td width=75% bgcolor=#f5ea03> &lt;= Your all done?
</td></tr></table></form><br><br></center>

<h3>News Output Html (so you can see what to change :P)</h3>
<font face=verdana size=1>
&lt;table height='table height' width='table width' border='table border size' cellpadding='table cellpadding' cellspacing='table cellspacing'&gt;<br><br>
&lt;tr&gt;&lt;td width='table width' bgcolor='table bgcolor 1'&gt;<br><br>
&lt;font color='font color 1' size='font size 1' face='font face 1'&gt;subject&lt;/font&gt;<br><br>
&lt;font color='font color 2' size='font size 2' face='font face 2'&gt;Posted by : poster on the whattime&lt;/font&gt;<br><br>
&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;<br><br>
&lt;td width='table width' bgcolor='table bgcolor 2'&gt;<br><br>
&lt;font color='font color 2' size='font size 2' face='font face 2'&gt;messages&lt;/font&gt;<br>
&lt;hr&gt;
<br>
&lt;/td&gt;&lt;/tr&gt;<br><br>
&lt;/table&gt;<br></font>";
}
}









if ($action=="falselogins"){
require("connect.inc");
$sql2 = "SELECT * FROM news_logged";
$result = mysql_query($sql2, $connect);
	
echo("<center><br><br><a href=admin.php?deleteips=true>Delete Entries</a><br><br>
<table border=1 cellpadding=5><tr><td bgcolor=#f5ea03 ><center><b><font face=verdana size=1>Ip Address</b> 
</td><td bgcolor=#f5ea03 ><center><b><font face=verdana size=1>Host Address
</b></td><td bgcolor=#f5ea03><center><b><font face=verdana size=1>Visited on the</b></td></tr>");

while($a_row = mysql_fetch_array($result)){
print "<tr><td bgcolor=#f5ea03 ><font face=arial size=1>$a_row[IP] </td>
<td bgcolor=#f5ea03><font face=arial size=1>$a_row[HOST] 
</td><td bgcolor=#f5ea03><font face=arial size=1>$a_row[WHATTIME]</td></tr>";
}
print "</table>";
}












if($user){
$step1 = "makeuser";
}
if ($step1=="makeuser"){
$md5her = md5($newpass);
$newusers = "INSERT INTO news_users ( username, password , email ) values('$newuser', '$md5her', '$newemail')";
mysql_query($newusers,$connect); 
if($newusers){
print "New user creation successfull $ok $refresh";
}
if(!$newusers){
print "New user creation unsuccessfull $notok $refresh";
}
}




if($userfix){
$step = "userdetails";
}
if ($step=="userdetails"){
$passwddb = mysql_query("select password from news_users where idusers='$id'");
$result36 = mysql_result($passwddb, 0, 0);
$usersoldpassword = md5($oldpasswd);

print "Database : $result36<br>";
print "Checked&nbsp; : $usersoldpassword<br><br>";

if($result36==$usersoldpassword) {
$password1 = md5($newpasswd);
$editstuff = "UPDATE news_users set username='$username', password='$password1', email='$email' where idusers='$id'";
mysql_query($editstuff,$connect) or die("Something went wrong");
print "successfull $ok $refresh";
} 
else {
die("passwords didn't match $refresh");
}
}





if($post){
$step = "postit";
}
if ($step=="postit"){

$message = ereg_replace(":sad:", "<img src=images/sad.gif>", $message);
$message = ereg_replace(":happy:", "<img src=images/happy.gif>", $message);
$message = eregi_replace(":grin:", "<img src=images/grin.gif>", $message);
$message = eregi_replace(":wink:", "<img src=images/wink.gif>", $message);
$message = eregi_replace(":lol:", "<img src=images/lol.gif>", $message);
$message = eregi_replace(":mad:)", "<img src=images/mad.gif>", $message);

$whattime = date("j F Y");
$postnews = "INSERT INTO news_posted ( subject, whattime, messages, poster ) 
values('$subject', '$whattime', '$message', '$usernamelogin')";
mysql_query($postnews,$connect); 
if($postnews){
print "News topic creation successfull $ok $refresh";
}
if(!$postnews){
print "News topic creation unsuccessfull $notok $refresh";
}
}





if($editpost){
$step = "edit";
}
if ($step=="edit"){

$message = ereg_replace(":sad:", "<img src=images/sad.gif>", $message);
$message = ereg_replace(":happy:", "<img src=images/happy.gif>", $message);
$message = eregi_replace(":grin:", "<img src=images/grin.gif>", $message);
$message = eregi_replace(":wink:", "<img src=images/wink.gif>", $message);
$message = eregi_replace(":lol:", "<img src=images/lol.gif>", $message);
$message = eregi_replace(":mad:)", "<img src=images/mad.gif>", $message);

$whattime = date("j F Y");
$editposts = "UPDATE news_posted set subject = '$subject', whattime = '$whattime', messages = '$message', poster = '$poster' where idposted = '$id'";
mysql_query($editposts,$connect); 
if($editposts){
print "News topic update successfull $ok $refresh";
}
if(!$editposts){
print "News topic update unsuccessfull $notok $refresh";
}
}




if($drop){
$step = "droppost";
}
if ($step=="droppost"){
$dropit = "delete from news_posted where idposted = '$id'";
mysql_query($dropit,$connect); 
if($dropit){
print "<br>News topic deletion successfull $ok $refresh";
}
if(!$dropit){
print "<br>News topic deletion unsuccessfull $notok $refresh";
}
}


if($dropall){
$step = "droppostall";
}
if ($step=="droppostall"){
$dropallposts = "DELETE FROM news_posted";
mysql_query($dropallposts,$connect); 
if($dropallposts){
print "<br>All News topics deletion successfull $ok $refresh";
}
if(!$dropallposts){
print "<br>All News topics deletion unsuccessfull $notok $refresh";
}
}




if($dropuser){
$step = "dropuser";
}
if ($step=="dropuser"){
require("connect.inc");
$dropthedood = "delete from news_users where idusers='$id'";
mysql_query($dropthedood,$connect); 
if($dropthedood){
print "<br>User deletion successfull $ok $refresh";
}
if(!$dropthedood){
print "<br>User deletion unsuccessfull $notok $refresh";
}
}







if($deleteips){
require("connect.inc");
$shit42 = mysql_query("DELETE FROM news_logged");
if($shit42){
print "<br><br><br><center>done!<br><br>$refresh";
}
else {
print "<br><br><br><center>fuck<br><br>$refresh";
}
}




if($setvars){
$step = "vars";
}
if ($step=="vars"){
include("connect.inc");
$editvars = "UPDATE news_vars set title='$title1', cookie='$domaincookie', bgcolor='$bgcolor1', tborder='$tborder123', twidth='$twidth1', theight='$theight1', tpadding='$tpadding1', tspacing='$tspacing1', howmany='$howmany1', ok='$ok1', notok='$notok1', tbg1='$tbg111', tbg2='$tbg211', tbg3='$tbg311', tbg4='$tbg411', tbg5='$tbg511', tbg6='$tbg611', fface='$fface1', fcolor='$fcolor1', fsize='$fsize1', fface2='$fface21', fcolor2='$fcolor21', fsize2='$fsize21' where idvars='1'";

mysql_query($editvars,$connect) or die("Something Went wrong");
print "successfull $ok $refresh";
} 









}

if(!$goodcookie){
require("connect.inc");
if($usernamelogin){
$ip = "$REMOTE_ADDR";
$host = "$REMOTE_HOST";
$now = date("j of  F Y \a\\t g.i a", time());
$sql = "INSERT INTO news_logged (IP, HOST, WHATTIME) VALUES ('$ip', '$host', '$now')";
mysql_query($sql, $connect) or die("couldnt query db");
echo("<center><br><br><br>Not authorized... logged.... redirecting
<script language=javascript>
setTimeout(\"document.location.href='login.php';\",1200);
</script>");
}
else{
echo("<center><br><br><br>Please Login first....
<script language=javascript>
setTimeout(\"document.location.href='login.php';\",1200);
</script>");
}
}

print "</center>";
include('footer.php');

?>
