<?php

require("conf.php");
include("connect.php");


$idbrowse = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));

if(mysql_query("SELECT username FROM news_cookie WHERE browsingid='$idbrowse'")){
$idbrowse = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));

$checkcookieuser = @mysql_query("SELECT username FROM news_cookie WHERE browsingid='$idbrowse'")or die("$auth");
$userchecked = @mysql_result($checkcookieuser, 0, 0)or die("$auth");

$checkcookiepass = @mysql_query("SELECT password FROM news_cookie WHERE browsingid='$idbrowse'")or die("$auth");
$passchecked = @mysql_result($checkcookiepass, 0, 0)or die("$auth");

$checkpass = @mysql_query("SELECT password FROM news_users WHERE username='$userchecked'")or die("$auth");
$check2 = @mysql_result($checkpass, 0, 0)or die("$auth");

}

else {
die("User Doesn't exist $problem");
}



if($passchecked=="$check2"){

ob_start("ob_gzhandler");
include("connect.php");
include("header.php");
print "<center>";




if(!$action){
print "<center><br><br>Welcome to EvoNews :)<br><br>$arial2";
}



if ($action=="users"){
while ( $a_rowuser = mysql_fetch_array( $userediter ) ){
echo("<table width=350 cellpadding=5 border=1><tr>
<td width=50% bgcolor=#f5ea03>
$arial2 $a_rowuser[username]</td>
<td width=50% bgcolor=#f5ea03>
<form action=\"admin.php?\" method=\"POST\">
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"dropuser\" value=\"dropuser\">
<input type='submit' class='button' value=\"Delete\"></form>
</td>
</tr>
</table>");
}
}



if ($action=="makeusers"){
print "<center>
<form method=post action=\"admin.php?\">
<table border=1 width=400 cellpadding=5>
<tr>
<td bgcolor=#f5ea03>$arial2 Username:</td>
<td bgcolor=#f5ea03><input type=text name=newuser value=username size=35></td>
</tr>
<tr>
<td bgcolor=#f5ea03>$arial2 Password:</td>
<td bgcolor=#f5ea03><input type=password name=newpass value=password size=35></td>
</tr>
<tr>
<td bgcolor=#f5ea03>$arial2 Email:</td>
<td bgcolor=#f5ea03><input type=text name=newemail value=someone@hotmial.com size=35></td>
</tr>
<tr>
<td bgcolor=#f5ea03>$arial2 Options :</td>
<td bgcolor=#f5ea03>
<input type=\"hidden\" name=\"user\" value=\"makeuser\">
<input type=submit class='button' value=\"Make User\">
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
<table width=100% cellpadding=5 border=1><tr>
<td width=30% bgcolor=#f5ea03>
$arial2 Username : </td>
<td width=70% bgcolor=#f5ea03>
<input type=\"hidden\" name=\"username\" value=\"$a_rowuser[username]\" size=35>
$arial2 $a_rowuser[username]</td>\n
</tr>\n
<tr>\n
<td width=30% bgcolor=#f5ea03>
$arial2 New Password : </td>
<td width=70% bgcolor=#f5ea03>
<input type=\"password\" name=\"newpasswd\" size=35></td>\n
</tr>\n
<tr>\n
<td width=30% bgcolor=#f5ea03>
$arial2 Old Password : </td>
<td width=70% bgcolor=#f5ea03>
<input type=\"password\" name=\"oldpasswd\" size=35></td>\n
</tr>\n
<tr>\n
<td width=30% width=100% bgcolor=#f5ea03>
$arial2 Email : </td>
<td width=70% bgcolor=#f5ea03>
<input type=\"text\" name=\"email\" value=\"$a_rowuser[email]\" size=35>
</td>\n
</tr><tr>
<td width=30% bgcolor=#f5ea03>
$arial2 Options :
</td><td width=70% bgcolor=#f5ea03>
<table border=0><tr><td>
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"userfix\" value=\"userdetails\">
<input type='submit' class='button' value=\"Edit\"></form>
</td><td>
<form action=\"admin.php?\" method=\"POST\">
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"dropuser\" value=\"dropuser\">
<input type='submit' class='button' value=\"Delete\"></form>
</td></tr></table>
</td></tr></table><br>";
}
}







if ($action=="news"){
include("news.php");
}







if ($action=="makenews"){
print "
<form action=\"admin.php?\" method=\"POST\">
<table border=1 width=100% cellpadding=5><tr>
<td align=left bgcolor=#f5ea03 width=30%>
$arial2 Post Subject :</td><td width=70% bgcolor=#f5ea03>
<input type=\"text\" name=\"subject\" size=35></td>
</tr><tr><td align=left bgcolor=#f5ea03 width=30%>
$arial2 Your news:
</td><td width=70% bgcolor=#f5ea03>
<textarea cols=\"40\" rows=\"10\" name=\"message\"></textarea>
</td></tr><tr><td align=left bgcolor=#f5ea03 width=30%>
$arial2 Options :
</td><td width=70% bgcolor=#f5ea03>
<input type=\"hidden\" name=\"post\" value=\"postit\">
<input type='submit' class='button' value=\"Make News\">
</td>
</tr>
</table>
<br>


$smiles

</form>
</center>";
}







if ($action=="editnews"){

Print "<br>
<center><form action=admin.php?>
<input type=hidden name=dropall value=true>
<input type=submit class='button' value='Delete all posts'>
</form>";

while ( $a_rowedit = mysql_fetch_array( $postresultadmin ) ){
print "<form action=\"admin.php?\" method=\"POST\">
<table width=100% cellpadding=5 border=1><tr>
<td width=30% bgcolor=#f5ea03>$arial2
Post No :</td><td width=70% bgcolor=#f5ea03>
$arial2
$a_rowedit[idposted] 
</td></tr><tr>
<td width=30% bgcolor=#f5ea03>$arial2
Subject : </td><td width=70% bgcolor=#f5ea03>
<input type=\"text\" name=\"subject\" value=\"$a_rowedit[subject]\" size=35>
</td>
</tr>
<tr>
<td width=30% bgcolor=#f5ea03>$arial2
Posted by: </td><td width=70% bgcolor=#f5ea03>$arial2
<input type=\"hidden\" name=\"poster\" value=\"$a_rowedit[poster]\" size=35>
$a_rowedit[poster] (Note: will be changed to person who is logged in)</td>
</tr>
<tr>
<td width=30% bgcolor=#f5ea03>$arial2
Posted on : </td><td width=70% bgcolor=#f5ea03>
<input type=\"text\" name=\"whattime\" value=\"$a_rowedit[whattime]\" size=35></td>
</tr>
<tr>
<td width=30% bgcolor=#f5ea03>$arial2
Message : </td><td width=70% bgcolor=#f5ea03>
<textarea cols=\"50\" rows=\"8\" name=\"message\">$a_rowedit[messages]</textarea>
</td>
</tr>
<tr>
<td width=30% bgcolor=#f5ea03>$arial2
Options :
</td><td width=70% bgcolor=#f5ea03>
<table border=0><tr><td>
<input type=\"hidden\" name=\"id\" value=\"$a_rowedit[idposted]\">
<input type=\"hidden\" name=\"editpost\" value=\"edit\">
<input type='submit' class='button' value=\"Edit\"></form></td><td>
<form action=\"admin.php?\" method=\"POST\">
<input type=\"hidden\" name=\"id\" value=\"$a_rowedit[idposted]\">
<input type=\"hidden\" name=\"drop\" value=\"droppost\">
<input type='submit' class='button' value=\"Delete\"></form>
</td></tr></table>
</td></tr></table><br>";
}
echo("$smiles");
}






if ($action=="settings"){
while ( $a_rowvar = mysql_fetch_array( $varsettings ) ){
print "</center>
$arial2 The following are the colors and widths etc for the output of your news..
I have added some extra variables which you can use in the output of your news, if your not happy with the html for the output edit the news.php</font><center>
<form action=\"admin.php?\" method=\"POST\">
<table width=100% cellpadding=2 border=1><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Title of your site :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[title]' name='title1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Bgcolor</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[bgcolor]' name='bgcolor1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 table border size :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tborder]' name='tborder123' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table width :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[twidth]' name='twidth1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table height :</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[theight]' name='theight1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table Spacing</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tspacing]' name='tspacing1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table padding</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tpadding]' name='tpadding1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 News Topics / Page</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[howmany]' name='howmany1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 ok image</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[ok]' name='ok1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 not ok image</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[notok]' name='notok1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table bgcolor 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg1]' name='tbg111' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table bgcolor 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg2]' name='tbg211' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table bgcolor 3</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg3]' name='tbg311' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table bgcolor 4</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg4]' name='tbg411' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table bgcolor 5</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg5]' name='tbg511' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Table bgcolor 6</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[tbg6]' name='tbg611' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Font face 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fface]' name='fface1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Font color 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fcolor]' name='fcolor1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Font size 1</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fsize]' name='fsize1' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Font face 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fface2]' name='fface21' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Font color 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fcolor2]' name='fcolor21' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Font size 2</td>
<td width=65% bgcolor=#f5ea03><input type='text' value='$a_rowvar[fsize2]' name='fsize21' size=35></td></tr><tr>
<td width=35% bgcolor=#f5ea03>$arial2 Style Sheet</td>
<td width=65% bgcolor=#f5ea03><textarea name='css'>$a_rowvar[css]</textarea></td>
</tr><tr><td width=25% bgcolor=#f5ea03>
$arial2 Options :
</td><td width=75% bgcolor=#f5ea03> 
<input type=\"hidden\" name=\"setvars\" value=\"vars\">
<input type='submit' class='button' value=\"Edit Style\"></font>
</td></tr></table></form><br><br></center>

<center>
<h3>News Output Html (so you can see what to change :P)</h3>
<textarea>
&lt;table height='table height' width='table width' border='table border size' cellpadding='table cellpadding' cellspacing='table cellspacing'&gt;\n
&lt;tr&gt;&lt;td width='table width' bgcolor='table bgcolor 1'&gt;\n
&lt;font color='font color 1' size='font size 1' face='font face 1'&gt;subject&lt;/font&gt;\n
&lt;font color='font color 2' size='font size 2' face='font face 2'&gt;Posted by : poster on the whattime&lt;/font&gt;\n
&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;\n\n
&lt;td width='table width' bgcolor='table bgcolor 2'&gt;\n
&lt;font color='font color 2' size='font size 2' face='font face 2'&gt;messages&lt;/font&gt;\n
&lt;hr&gt;\n
&lt;/td&gt;&lt;/tr&gt;\n
&lt;/table&gt;\n
</textarea>
";
}
}









if ($action=="falselogins"){
require("connect.php");
$sql2 = "SELECT * FROM news_logged";
$result = @mysql_query($sql2, $connect);
	
echo("
<br>
<center><form action=admin.php?>
<input type=hidden name=deleteips value=true>
<input type=submit class='button' value='Delete all'>
</form>

<table border=1 cellpadding=5><tr><td bgcolor=#f5ea03 ><center><b>$arial1 Ip Address</b> 
</td><td bgcolor=#f5ea03 ><center><b>$arial1 Host Address
</b></td><td bgcolor=#f5ea03><center><b>$arial1 Visited on the</b></td></tr>");

while($a_row = mysql_fetch_array($result)){
print "<tr><td bgcolor=#f5ea03 >$arial1 $a_row[IP] </td>
<td bgcolor=#f5ea03>$arial1 $a_row[HOST] 
</td><td bgcolor=#f5ea03>$arial1 $a_row[WHATTIME]</td></tr>";
}
print "</table>";
}












if($user){
$step1 = "makeuser";
}
if ($step1=="makeuser"){
$confirm = @mysql_query("SELECT username FROM news_users WHERE username='$newuser'");
$resultconfirm = @mysql_result($confirm, 0, 0);
if(!$resultconfirm=="$newuser"){
$md5her = md5($newpass);
$newusers = "INSERT INTO news_users ( username, password , email ) values('$newuser', '$md5her', '$newemail')";
$good = mysql_query($newusers,$connect) or die("failed");
if($good){
print "New user creation successfull $ok $refresh";
}
}
if($resultconfirm=="$newuser"){
print "<br>Sorry user already exists. Please try again! $refresh";
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

$message = eregi_replace(":sad:", "<img src=images/sad.gif>", $message);
$message = eregi_replace(":happy:", "<img src=images/happy.gif>", $message);
$message = eregi_replace(":grin:", "<img src=images/grin.gif>", $message);
$message = eregi_replace(":wink:", "<img src=images/wink.gif>", $message);
$message = eregi_replace(":lol:", "<img src=images/lol.gif>", $message);
$message = eregi_replace(":mad:", "<img src=images/mad.gif>", $message);


$whattime = date("j of F Y, \a\\t g.i a", time());
$postnews = "INSERT INTO news_posted ( subject, whattime, messages, poster ) 
values('$subject', '$whattime', '$message', '$userchecked')";
$good2 = @mysql_query($postnews,$connect)or die("Failed");
if($good2){
print "News topic creation successfull $ok $refresh";
}
if(!$good2){
print "News topic creation unsuccessfull $notok $refresh";
}
}





if($editpost){
$step = "edit";
}
if ($step=="edit"){

$messages = eregi_replace(":sad:", "<img src=images/sad.gif>", $message);
$messages = eregi_replace(":happy:", "<img src=images/happy.gif>", $message);
$messages = eregi_replace(":grin:", "<img src=images/grin.gif>", $message);
$messages = eregi_replace(":wink:", "<img src=images/wink.gif>", $message);
$messages = eregi_replace(":lol:", "<img src=images/lol.gif>", $message);
$messages = eregi_replace(":mad:", "<img src=images/mad.gif>", $message);

$whattime = date("j F Y");
$editposts = "UPDATE news_posted set subject='$subject', whattime='$whattime', messages='$messages', poster='$userchecked' where idposted='$id'";
$editpost = @mysql_query($editposts,$connect); 
if($editpost){
print "News topic update successfull $ok $refresh";
}
if(!$editpost){
print "News topic update unsuccessfull $notok $refresh";
}
}




if($drop){
$step = "droppost";
}
if ($step=="droppost"){
$dropit = "delete from news_posted where idposted = '$id'";
$dropi = @mysql_query($dropit,$connect) or die("failed");
if($dropi){
print "<br>News topic deletion successfull $ok $refresh";
}
if(!$dropi){
print "<br>News topic deletion unsuccessfull $notok $refresh";
}
}


if($dropall){
$step = "droppostall";
}
if ($step=="droppostall"){
$dropallposts = "DELETE FROM news_posted";
$dropallpost = @mysql_query($dropallposts,$connect); 
if($dropallpost){
print "<br>All News topics deletion successfull $ok $refresh";
}
if(!$dropallpost){
print "<br>All News topics deletion unsuccessfull $notok $refresh";
}
}




if($dropuser){
$step = "dropuser";
}
if ($step=="dropuser"){
require("connect.php");
if($users_num_rows>1){
$dropthedood = "delete from news_users where idusers='$id'";
$dropthedoo = @mysql_query($dropthedood,$connect); 
if($dropthedoo){
print "<br>User deletion successfull $ok $refresh";
}
if(!$dropthedoo){
print "<br>User deletion unsuccessfull $notok $refresh";
}
}
if($users_num_rows<=1){
print "Sorry but you cannot delete this user<br> because the there would be no more users! $refresh";
}

}







if($deleteips){
require("connect.php");
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
include("connect.php");
$editvars = "UPDATE news_vars set title='$title1', bgcolor='$bgcolor1', tborder='$tborder123', twidth='$twidth1', theight='$theight1', tpadding='$tpadding1', tspacing='$tspacing1', howmany='$howmany1', ok='$ok1', notok='$notok1', tbg1='$tbg111', tbg2='$tbg211', tbg3='$tbg311', tbg4='$tbg411', tbg5='$tbg511', tbg6='$tbg611', fface='$fface1', fcolor='$fcolor1', fsize='$fsize1', fface2='$fface21', fcolor2='$fcolor21', fsize2='$fsize21', css='$css' where idvars='1'";
mysql_query($editvars,$connect) or die("Something Went wrong");
print "successfull $ok $refresh";
} 





if ($action=="logout"){
$idbrowse = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));
$logoutplease = "delete from news_cookie where browsingid='$idbrowse'";
mysql_query($logoutplease,$connect);
print "$problem";
}




include('footer.php');

}

else{

$ip = "$REMOTE_ADDR";
$host = "$REMOTE_HOST";
$now = date("j of  F Y \a\\t g.i a", time());
$sql = "INSERT INTO news_logged (IP, HOST, WHATTIME) VALUES ('$ip', '$host', '$now')";
mysql_query($sql, $connect) or die("couldnt query db");
echo("<center><br><br><br>Not authorized... logged.... redirecting<br>
$problem");

}



?>
