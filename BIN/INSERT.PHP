<?php

print "<br><br>";
if($post){
$step = "postit";
}
if ($step=="postit"){
require("connect.php");
$insertinto = "INSERT into $selected ( page, contents, sub) values( '$page', '$contents', '$sub')";
mysql_query($insertinto,$connect); 
if($insertinto){
print "News topic creation successfull $ok $refresh";
}
if(!$insertinto){
print "News topic creation unsuccessfull $notok $refresh";
}
}

echo("
<form action=\"insert.php\">
<input type=text value=selected name=selected>
<input type=text value=page name=page>
<textarea value=contents name=contents></textarea>
<input type=text value=sub name=sub>
<input type=\"hidden\" name=\"post\" value=\"postit\">
<input type=\"submit\" value=\"Post!\">
</form>
");

?>