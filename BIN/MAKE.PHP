<?php

include("session.inc");
include("connect.inc");

$message="";
if (isset($action) && $action=="makeuser"){

if (empty($form[login]) ||
	empty($form[password]) ||
	empty($form[password]))
$message .= "You must fill in all fields<br>\n";

if ($form[password] != $form[password2] )
$message .= "Password didn't match<br>\n";

if(strlen($form[password] ) > 8 )
$message .= "your password  msut be less than 8 characters<br>\n";

if(strlen($form[login] ) > 8 )
$message .= "your login  must be less than 8 characters<br>\n";

if( getRow("username", $form[login] ))
$message .= "login \"$form[login]\" already exists. try another<br>\n";

if ( $message =="")
{
$id = newUser($form[login], $form[password] );
cleanMemberSession($id, $form[login], $form[password] );
exit;
}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $title; ?></title>
</head>
<body>

<?php
include("header.php");
?>

<h3>join</h3>

<?php
if ($message != "")
{print "<b>$mesage</b><p>";
}
?>



<p>
<form action="<?php print $PHP_SELF; ?>">
<input type="hidden" name="action" value="makeuser">
<input type="hidden" name="<?php print session_name() ?>" value="<?php print session_id() ?>">
login : <br>

<input type="text" name="form[login]" value="<?php print $form[login] ?>" maxlenght=8>
</p>
<P>
Password : <br>
<input type="password" name="form[password]" value="" maxlenght=8>
</p><p>
confirm Password : <br>
<input type="password" name="form[password2]" value="" maxlenght=8>
</p><p>
<input type="submit" value="update">
</p>
</form>




<?php

print "</center>";
include('footer.php');

?>







</body>
</html>
