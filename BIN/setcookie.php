<?php


require("conf.php");
include("connect.inc");

$hty = "<br><br><br><center>User not found";
$passcheck = mysql_query("select password from news_users where username='$usernamelogin'") or die ("$hty");
$resultcheck = mysql_result($passcheck, 0, 0) or die("$hty");

if($passcheck){
$cryptpass = md5($passwordlogin);

if ($cryptpass==$resultcheck){
$cookie_domain = '$domaincookie';  // your cookie domain, must edit
$goodcookie = $HTTP_COOKIE_VARS['goodcookie'];
$userpass = "$usernamelogin:$cryptpass";
      if ($userpass=="$usernamelogin:$resultcheck"){      
      $cookiecontents = "yes";
      setcookie("goodcookie", $cookiecontents, time()+7*24*3600, "/", $cookie_domain);
      $goodcookie = "yes";
      }
}
else {
print "User-pass didn't match<br>";
}
}


?>

<html><body>

<script language=javascript>
setTimeout("document.location.href='admin.php?'",2500);
</script>