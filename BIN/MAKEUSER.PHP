<?php

require("conf.php");
include("connect.inc");
include("session.inc");

$message="";
if (isset($actionflag) && $actionflag=="makeuser")
{
if (empty ($form[login] ) ||
empty ($form[password] ) ||
empty ($form[password] ))
$message.= "You must fill in the fields to make a user bumbass<br>";


if ($form[password] != $form[password2] )
$message .= "You fucking with em again fill in the damn password fields correctly they dont match less than 8 characters";

if( strlen ($form[password] ) > 8 )
$message .= "less than 8 characters for the pass";

if( strlen ($form[login] ) > 8 )
$message .= "less than 8 characters for the user";

if ( getRow ("news_users", "login", $form[login]))
$message .= "login \"$form[login]\" already exists. Try another<br>";

if ( $message ==" " ) //we found errors
{
$idusers = newUser ( $form[login], $form[password] );
cleanMemberSession( $idusers, $form[login], $form[password] );
header ( "location : updateuser.php?" .SID );
exit;
}
}
?>
<html>
<head>
<title> <?php print $title; ?> > Make users </title>

</head>
<body>
<?php
If (message != " ")
{
print "<b> message </b><p>";
}
?>


<p>
<form action"<?php print $PHP_SELF; ?>">
<input type="hidden" name="actionflag" value="makeuser">
<input type="hidden" name="<?php print session_name() ?>" value="<?php print session_id() ?>">
login <br>
<input type="text" name="form[login]" value="<?php print $form[login] ?>" maxlenght="8">
</p>
<p>
password: <br> 
<input type="password" name="form[password]" value="" maxlenght="8">
</p>
<p>
confirm password: <br> 
<input type="password" name="form[password2]" value="" maxlenght="8">
</p>
<p>
<input type="submit" value="update">
</p>
</form>

</body></html>


