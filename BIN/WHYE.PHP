<?php


require("conf.php");
include("connect.inc");

$idbrowse = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));
$get = mysql_query("SELECT * FROM news_cookie WHERE browsingid='$idbrowse'")or die("fuck no id match<br>");
$getit = mysql_result($get, 0, 0)or die("fuck no id match<br>");


if($getit){
include("connect.inc");

$idbrowse = md5(getenv('REMOTE_ADDR').getenv('USER_AGENT'));

$user1 = mysql_query("SELECT username FROM news_cookie WHERE browsingid='$idbrowse'")or die("browsing id/username<br>");
$pass1 = mysql_query("SELECT password FROM news_cookie WHERE browsingid='$idbrowse'")or die("browsing id/password<br>");
$passcheck = mysql_query("SELECT password FROM news_users WHERE username='$userchecked'")or die("fuck no password<br>");

$userchecked = mysql_result($user1, 0, 0)or die("browsing id/username<br>");
$passchecked = mysql_result($pass1, 0, 0)or die("browsing id/password<br>");
$resultcheck = mysql_result($passcheck, 0, 0)or die("fuck no password<br>");


if($resultcheck=="$passchecked"){
$hello = "yes";
}
else{
$hello = "false";
}
}


if ($hello=="false"){
require("conf.php");
include("connect.inc");

print "shi shit shit<br><br>";

$ip = "$REMOTE_ADDR";
$host = "$REMOTE_HOST";
$now = date("j of  F Y \a\\t g.i a", time());
$sql = "INSERT INTO news_logged (IP, HOST, WHATTIME) VALUES ('$ip', '$host', '$now')";
mysql_query($sql, $connect) or die("couldnt query db");
echo("<center><br><br><br>Not authorized... logged.... redirecting
<script language=javascript>
setTimeout(\"document.location.href='login.php??';\",1200);
</script>");

}








if ($passchecked==$resultcheck){
if ($hello=="true"){

print "hahah";

}
}


?>