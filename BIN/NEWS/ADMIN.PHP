<?php
require('conf.php');
$goodcookie = $HTTP_COOKIE_VARS['goodcookie'];

if(!$step){
    $step = "auth";
}

if ($step=="auth"){
$security = "$news:$poster";
$userpass = "$username:$password";
      if ($userpass==$security){      
      $cookiecontents = "yes";
      setcookie("goodcookie", $cookiecontents, time()+7*24*3600, "/", $cookie_domain);
      $goodcookie = "yes";
      }
}
include('header.php'); 
if ($goodcookie){
?>


<center><br><br><br><br>
<table bgcolor='#000000' cellspacing='0' cellpadding='0' width='550' height='100' border='1'><tr>
<td valign=middle bgcolor='#eeee00'>
<center><font color='ff000' size='2' face='arial'>Welcome to <?php echo($title); ?>.</font></center>
</td></tr><tr><td valign=top bgcolor='#eeeeee'>

<table width=100%><tr><td valign=top width=100><br>

<center><font color='ff000' size='2' face='arial'>M E N U </font>
<br><br>
Add News<br>
Edit news<br>
Edit Style<br>




</center>

</td><td valign=top width=300>

<br><center><font color='0000ff' size='1' face='arial'><br><center><form method=post action="write.php">
<table border=0 width=400><tr><td align=right>
Subject:
</td><td>
<input type="text" name="subject">
</td></tr><tr><td align=right>
Post:
</td><td>
<textarea cols="20" rows="5" name="post"></textarea><br>
<input type=submit value="Add News">
<input type=hidden name=step value="auth">
</td></tr></table>
</form></center></font></center>
</td></tr></table>
</center></body></html>
</td></tr></table>



<?php
} else {
include('footer.php'); 
}
?>




