
<?php

require("conf.php");
include("connect.inc");
include("session.inc");

print "<center>";


function getRow ($fnm, $fval){
global $connect;
$result = mysql_query("SELECT * FROM news_users WHERE $fnm='$fval'",$connect);
if (!result) die ("getRow fatal error: ".mysql_error() );
return mysql_fetch_array($result);
}

function newUser ($login,$pass){
global $connect;
$result =mysql_query("INSERT INTO news_users (username, password) VALUES('$login', '$pass')", $connect);
return mysql_insert_id($connect);
}


function cleanMemberSession($id, $login, $pass){
global $session;
$session[id] = $id;
$session[login] = $login;
$session[password] = $pass;
$session[logged_in] = true;
}


function checkUser( ){
global $session, $logged_in;
$session[logged_in] = false;
$row = getRow("news_users","id", $session[id]);
if(!$row || $row[login] != $session[login] || $row[password] != $session[password] )
{
header("Location: login.php");
exit;
}
$session[logged_in] = true;
return $row;
}




//------------------------
// MySQl
//------------------------


$postresult= mysql_query( "SELECT * FROM news_posted ORDER BY idposted DESC");
$post_num_rows = mysql_num_rows( $postresult );

$userresult= mysql_query( "SELECT username FROM news_users" );
$users_num_rows = mysql_num_rows( $userresult );

$userediter = mysql_query( "SELECT * FROM news_users" );

$news_topics_num = mysql_query( "SELECT * FROM news_posted");
$topics_num_rows = mysql_num_rows( $news_topics_num );

$news_users_num = mysql_query( "SELECT * FROM news_users");
$users_num_rows = mysql_num_rows( $news_users_num );


// steps

if($user){
$step1 = "makeuser";
}
if ($step1=="makeuser"){
$md5her = md5($newpass);
$newusers = "INSERT INTO news_users ( username, password , email ) values('$newuser', '$md5her', '$newemail')";
mysql_query($newusers,$connect); 
if($newusers){
$message= "yeah !";
header("Location: admin.php");
exit;
}
if(!$newusers){
$message= "crap";
header("Location: admin.php");
exit;
}
}




if($userfix){
$step = "userdetails";
}
if ($step==userdetails){
$passwddb = "select password from news_users where id='$id'";
$result = @mysql_query($passwddb, $db);
$usersoldpassword = md5($oldpasswd);

if($result==$usersoldpassword) {
$password1 = md5($newpasswd);
$editstuff = "UPDATE news_users set username='$username', password='$password1', email='$email' where idusers='$id'";
mysql_query($editstuff,$connect) or die("crap");
} 
else {
die("passwords didn't match");
}
}





if($post){
$step = "postit";
}
if ($step=="postit"){
$whattime = date("j F Y");
$postnews = "INSERT INTO news_posted ( subject, whattime, messages, poster ) 
values('$subject', '$whattime', '$message', '$news')";
mysql_query($postnews,$connect); 
if($postnews){
print "News topic creation successfull $ok";
}
if(!$postnews){
print "News topic creation unsuccessfull $notok";
}
}



if($editpost){
$step = "edit";
}
if ($step=="edit"){
$whattime = date("j F Y");
$editposts = "UPDATE news_posted set subject = '$subject', whattime = '$whattime', messages = '$message', poster = '$news' where idposted = '$id'";
mysql_query($editposts,$connect); 
if($editposts){
print "News topic update successfull $ok";
}
if(!$editposts){
print "News topic update unsuccessfull $notok";
}
}



?>
