<html>
<head>
<title> Login </title>
</head>
<body leftmargin=0 topmargin=0 bgcolor=#ff9944 rightmargin=0><center>

<?php

print "<table border=0 cellpadding=5 width=630><tr><td valign=top width=100%>
<center><form method=post action=\"admin.php?\">
<table border=0 width=400>
<tr>
<td align=right>Username:</td>
<td><input type=text name=usernamelogin></td>
</tr>
<tr>
<td align=right>Password:</td>
<td><input type=password name=passwordlogin></td>
</tr>
<tr>
<td align=right>&nbsp;</td>
<td><input type=submit value=\"Login\">
<input type=\"hidden\" name=\"step\" value=\"auth\">
</td>
</tr>
</table>
</form>
</center>";





?>

</body
</html>