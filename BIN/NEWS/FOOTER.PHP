<center>
<form method=post action="<?php echo $PHP_SELF;?>">
<table border=0 width=400>
<tr>
<td align=right>Username:</td>
<td><input type=text name=username></td>
</tr>
<tr>
<td align=right>Password:</td>
<td><input type=password name=password></td>
</tr>
<tr>
<td align=right>&nbsp;</td>
<td><input type=submit value="Login">
<input type="hidden" name="step" value="auth">
</td>
</tr>
</table>
</form>
</center>

</body>
</html>