<?php
 
echo ("<br><center>
<a href='files.php?action=showfiles'>show files</a> | 
<a href='files.php?action=uploadfiles'>Upload a File?</a> |
<a href='files.php?action=renamefiles'>rename a File?</a>
</center>");




// show files

if (isset($action) && $action=="showfiles"){
$Open = opendir ("users");
while ($Files = readdir ($Open)) {
$Filename = "users/" . $Files;
if (is_file ($Filename)) {
$Size = filesize ("users/$Files");
echo("$Files &nbsp;&nbsp;&nbsp; $Size &nbsp;&nbsp;&nbsp;&nbsp;<form action=files.php>
<input type=hidden name=\"$files\" size=20>\n<br>
<input type=\"hidden\" name=\"delete\" value=\"doit\">
<input type=Submit name=\"Submit\" value=\"Delete >>\"></form>
\n<br>");
}
}
closedir ($Open);
}






if (isset($action) && $action=="uploadfiles"){
echo ("<br><br><br>
<form action=\"files.php\" method=post enctype=\"multipart/form-data\">\n
(Enter the New Name in the box)\n<br>
<input type=checkbox name=\"Upload\" value=\"Yes\">
<b><br>Upload a file to the server: </b><br>
<input type=\"file\" name=\"File\" size=20>\n<br>
<input type=\"hidden\" name=\"uploader\" value=\"true\">
<input type=Submit name=\"Submit\" value=\"Upload >>\"></form>\n");
}






if (isset($action) && $action=="renamefiles"){

$dirname ="users";
$dh = opendir($dirname);
while (gettype($file = readdir($dh)) !=boolean){
if(is_dir("$dirname/$file"))
print "(Directory)";
echo (" <form action=\"files.php\" method=post enctype=\"multipart/form-data\">\n
old name :<input type=text name=\"old\" value=\"$file\" size=20>\n<br>
new name :<input type=text name=\"new\" value=\"\" size=20>\n<br>
<input type=\"hidden\" name=\"rename\" value=\"doit\">
<input type=Submit name=\"Submit\" value=\"Upload >>\"></form>");
}
closedir($dh);
}











if($rename){
$step1 = "doit";
}
if ($step1=="doit"){
rename ("$old", "$new");
print "file name changed";
}




if($delete){
$step1 = "doit";
}
if ($step1=="doit"){
delete("$filename");
print "file deleted";
}







if($uploader){
$step1 = "true";
}
if ($step1=="true"){

	echo ("Uploaded file name: <b>$File_name</b><br>Upload file size: <b>$File_size\n");
if (copy ($File, "users/$File_name")) {
	echo ("Your file,<i>$File_name</i>, was sucessfully uploaded!\n");
} else {
	echo ("Your file <b>$File_name</b> could not be copied to the server.\n");
}unlink ($File);
	echo("\n");


}
?>
