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


$edituserPasswordInclude = dirname(__FILE__) . "/forneiller_password_fields.inc";
require dirname(dirname(__FILE__)) . "/includes/edituser_form.inc";

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
