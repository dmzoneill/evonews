<?php

require("conf.php");
include("connect.inc");
include("session.inc");
include("header.php");

?>




<?php


if($doit){
    $step = "postit";
}


if ($step=="postit")
{
$whattime = time();

$query = "INSERT INTO news_posted ( subject, whattime, messages, poster ) values('$subject', '$whattime', '$message', '$news')";
mysql_query($query,$connect); 

}

else {
global $PHP_SELF;
print "<form action='$PHP_SELF' method='POST'><br>Post Subject:<input type='text' name='subject'><br><br><br><br>Your news:<textarea cols=20 rows=5 name='message'></textarea><br><input type='hidden' name='doit' value='postit'><br><input type='submit' value='Submit!'><br></form><br>";
}


?>











<?php
} else {
include('footer.php'); 
}
mysql_close( $connect );
?>