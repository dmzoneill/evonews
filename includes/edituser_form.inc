<?php
// Shared edit-user form included by BIN/editusers.php and BIN/forneiller.php.
// Password rows differ per page and are printed by $edituserPasswordInclude.

// -------------------------
// cell contents alignment
// -------------------------

print "<center>";


if (isset($action) && $action=="edituser"){

while ( $a_rowuser = mysql_fetch_array( $userediter ) )
{
print "
<form action=\"$PHP_SELF\" method=\"POST\">
<table width=100% cellpadding=5 bgcolor=aaaaff border=1>
<tr>
<td width=100%>
Username : <input type=\"text\" name=\"username\" value=\"$a_rowuser[username]\"></td>\n
</tr>\n
<tr>\n
<td>
";
include $edituserPasswordInclude;
print "</tr>\n
<tr>\n
<td width=100%>
Email : <input type=\"text\" name=\"email\" value=\"$a_rowuser[email]\">
</td>\n
</tr><tr><td>
<input type=\"hidden\" name=\"id\" value=\"$a_rowuser[idusers]\">
<input type=\"hidden\" name=\"userfix\" value=\"userdetails\">
<input type=\"submit\" value=\"Submit!\">
</td></tr></form></table><br>";
}
}
