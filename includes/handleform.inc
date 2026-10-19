<?php

if($doit){
    $step = "doit";
}

if ($step=="doit")
{


?>


<?php


print gettype($number1);
print "<br>your first number : $number1<br><br>";

print gettype($number2);
print "<br>your second number :$number2<br><br>";

print "<br>your first number multiplied by second number : "; 

print $number1 * $number2;




?>







<?php
} else {
echo ("
<form action='handleform.php' method=post>
num 1 <input type=text name='number1' size=20><BR>
num 2 <input type=text name='number2' size=20><BR>
<input type='hidden' name='step' value='doit'>
<input type='Submit' value='Submit'>
</form>
");
};
?>

</body>
</html>