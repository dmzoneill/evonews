<?php

/* 
EvoNews written by neiller at evobb dot com (neiller@evobb.com)

Also available EvoBB co-producer with Xavic and fod 
available for download @ http://www.evobb.com...

Note: you can edit below this but its not advised, 
once you have installed please make sure to delete install.php or at least chmod it to 111..
If stuff is editable it will say it next to the code in the comments..

Make sure to edit the conf.php before you start installing your EvoNews :)

NB : once logged in change your password :)
*/



require('conf.php');

// Initial Administrator Details
$news = "webmaster";  // you can edit :username:
$poster = "5f4dcc3b5aa765d61d8327deb882cf99";  // dont edit, but change later in admin panel :password:
$email = "webmaster@yoursite.com"; // you can edit :email address:
$posted = "This is your first news message"; // you can edit :first message:
$postedtime = "31 December 2000"; // you can edit :install date:

// images
$ok ="<img src='images/ok.gif' border='0'>";
$notok ="<img src='images/notok.gif' border='0'>";


// start of the install
echo("<h3><font face=verdana color=green>Host Connection</font></h3>");

$connect = mysql_connect("$dbhost", $dbuser, $dbpasswd);
if ($connect) print "Connection to host : <b> $dbhost </b> successful $ok<br><br>";
if (!$connect) print "Connection to host : <b> $dbhost </b> unsucessfull $notok<br><br>";

echo("<h3><font face=verdana color=green>Database Connection</font></h3>");

mysql_select_db( $dbname, $connect ) or die ("Connection to database : <b>$dbname</b> unsucessfull $notok<br><br>");
$database = mysql_select_db( $dbname, $connect );
if ($database) print "Connection to database : <b> $dbname </b> successful $ok<br><br>";

// table creation
$query = "CREATE TABLE news_users ( idusers INT NOT NULL AUTO_INCREMENT,
									PRIMARY KEY( idusers ),
									username VARCHAR ( 50 ),
									password VARCHAR( 255 ),
									email VARCHAR ( 50 ))";
									
$query0 = "CREATE TABLE news_vars ( idvars INT NOT NULL AUTO_INCREMENT,
									PRIMARY KEY( idvars ),
									title VARCHAR ( 255 ),
									bgcolor VARCHAR( 255 ),
									tborder VARCHAR( 255 ),
									twidth VARCHAR( 255 ),
									theight VARCHAR( 255 ),
									tpadding VARCHAR( 255 ),
									tspacing VARCHAR( 255 ),
									howmany VARCHAR ( 255 ),
									ok VARCHAR ( 255 ),
									notok VARCHAR ( 255 ),
									tbg1 VARCHAR( 255 ),
									tbg2 VARCHAR ( 255 ),
									tbg3 VARCHAR( 255 ),
									tbg4 VARCHAR( 255 ),
									tbg5 VARCHAR ( 255 ),
									tbg6 VARCHAR( 255 ),
									fface VARCHAR( 255 ),
									fcolor VARCHAR ( 255 ),
									fsize VARCHAR( 255 ),
									fface2 VARCHAR( 255 ),
									fcolor2 VARCHAR ( 255 ),
									fsize2 VARCHAR( 255 ),
									css blob)";
									
$query1 = "CREATE TABLE news_logged ( idlogged INT NOT NULL AUTO_INCREMENT,
									PRIMARY KEY( idlogged ),
									IP VARCHAR ( 100 ),
									HOST VARCHAR( 100 ),
									WHATTIME VARCHAR ( 100 ))";									
									
$query2 = "CREATE TABLE news_posted ( idposted INT NOT NULL AUTO_INCREMENT,
									PRIMARY KEY( idposted ),
									subject VARCHAR ( 100 ),
									whattime VARCHAR ( 100 ),
									messages BLOB,
									poster VARCHAR ( 100 ))";
									
$query3 = "CREATE TABLE news_cookie ( idlog INT NOT NULL AUTO_INCREMENT,
									PRIMARY KEY( idlog ),
									browsingid VARCHAR ( 100 ),
									username VARCHAR ( 100 ),
									password VARCHAR ( 100 ),
									timeout VARCHAR ( 100 ))";

					
									
									
									
									
// data insertion									
$query4 = "INSERT INTO news_users ( username, password , email ) values('$news','$poster','$email')";

$query5 = "INSERT INTO news_vars ( title, bgcolor, tborder, twidth, theight, tpadding, tspacing, howmany, ok, notok, tbg1, tbg2, tbg3, tbg4, tbg5, tbg6, fface, fcolor, fsize, fface2, fcolor2, fsize2, css ) values('Current News','ff9944','0','100%','*','5','0','10','<img src=images/ok.gif border=0>','<img src=images/notok.gif border=0>','dddddd','ffffff','dddddd','ffffff','dddddd','ffffff','verdana','black','2','arial','black','1','<style></style>')";

$query6 = "INSERT INTO news_posted ( subject, whattime, messages, poster ) values('Introduction','$postedtime','$posted','$news')";

// the queries
$squery = mysql_query($query,$connect);	
$squery0 = mysql_query($query0,$connect);	
$squery1 = mysql_query($query1,$connect);	
$squery2 = mysql_query($query2,$connect);	
$squery3 = mysql_query($query3,$connect);	
$squery4 = mysql_query($query4,$connect);	
$squery5 = mysql_query($query5,$connect);	
$squery6 = mysql_query($query6,$connect);	

echo("<h3><font face=verdana color=green>Table Creation</font></h3>");
if ($squery) print "Creation of news_users table successfull $ok<br>";
if (!$squery) print "Creation of news_users table unsuccessfull $notok<br>";
if ($squery0) print "Creation of news_vars table successfull $ok<br>";
if (!$squery0) print "Creation of news_vars table unsuccessfull $notok<br>";
if ($squery1) print "Creation of news_logged table successfull $ok<br>";
if (!$squery1) print "Creation of news_logged table unsuccessfull $notok<br>";
if ($squery2) print "Creation of news_posted table successfull $ok<br>";
if (!$squery2) print "Creation of news_posted table unsuccessfull $notok<br>";
if ($squery3) print "Creation of news_cookie table successfull $ok<br>";
if (!$squery3) print "Creation of news_cookie table unsuccessfull $notok<br>";

echo("<h3><font face=verdana color=green>Data Insertion</font></h3>");
if ($squery4) print "Insertion of data in news_users table successfull $ok<br>";
if (!$squery4) print "Insertion of data in news_users table unsuccessfull $notok<br>";
if ($squery5) print "Insertion of data in news_vars table successfull $ok<br>";
if (!$squery5) print "Insertion of data in news_vars table unsuccessfull $notok<br>";
if ($squery6) print "Insertion of data in news_posted table successfull $ok<br>";
if (!$squery6) print "Insertion of data in news_posted table unsuccessfull $notok<br>";

mysql_close( $connect );

?>