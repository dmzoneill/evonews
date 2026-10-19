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




$edituserPasswordInclude = dirname(__FILE__) . "/editusers_password_fields.inc";
require dirname(dirname(__FILE__)) . "/includes/edituser_form.inc";

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
