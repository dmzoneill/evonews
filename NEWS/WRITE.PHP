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


<?php

$name = $news;
$posted = $post;
$about = $subject;
$filename = 'news.php';
print "<center><br><br><br><br><table bgcolor='#000000' cellspacing='0' cellpadding='0' width='400' height='100' border='1'><tr><td valign=middle bgcolor='#eeee00'><center><font color='ff000' size='2' face='arial'> S t a t u s </font></center></td></tr><tr><td valign=top bgcolor='#eeeeee'><br><center><font color='0000ff' size='1' face='arial'> Writing your news to $filename<br><br>We will now direct you back to the Administrator Panel </font></center><script language='javascript'>function go(){document.location.href='admin.php';}window.setTimeout('go()',2500);</script></td></tr></table></center>";
$fp = fopen( $filename, 'a' ) or die("Couldn't open $filename");
fputs( $fp, "
<center><table background='$table_background' bgcolor='$table_bgcolor' cellpadding='$table_cellpadding' cellspacing='$table_cellspacing' width='$table_width' height='$table_height' border='$table_border'><tr><td valign='&td_header_valign' width='$td_width' bgcolor='$td_header_color' height='10'><font color='$post_header_color' face='$post_header_face' size='$post_header_size'>Subject : $about</font></td><td valign='&td_header_valign'  bgcolor='$td_header_color' height='10'><div align=right><font color='$post_header_color' face='$post_header_face' size='$post_header_size'>By : <a href='mailto:$email'><font color='$post_header_color' face='$post_header_face' size='$post_header_size'>$name</font></font></a></div></td></tr></table><table background='$table_background' bgcolor='$table_bgcolor' cellpadding='$table_cellpadding' cellspacing='$table_cellspacing' width='$table_width' height='$table_height' border='$table_border'><tr><td valign='$td_valign_message' bgcolor='$table_message_color' width=100%><font color='$post_text_color' face='$post_text_face' size='$post_text_size'> $posted</font></td></tr></table></center><br>");
fclose( $fp );

?>




<?php
} else {
include('footer.php'); 
}
?>