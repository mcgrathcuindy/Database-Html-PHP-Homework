<!DOCTYPE html>
<html>
<body>

 
<?php
echo "Hello World!";
$x = 5;
$y = 4;
echo " ";
echo $x + $y;

$txt = "What's up man...";
echo "<br>";
echo $txt;
echo "<br>";
echo strrev($txt);
echo "<br>";
echo str_replace("man", "dude", $txt);
echo "<br>";
echo strlen($txt);
echo "<br>";
echo strpos($txt, "man");
echo "<br>";
echo $txt;
echo "<br>";
echo "<br>";
echo "<br>";

define("GREETING", "Welcome to
W3Schools.com!");
function myTest() {
echo GREETING;
}
myTest();
echo "<br>";
echo "<br>";

define("cars", [
"Alfa Romeo",
"BMW",
"Toyota"
]);
echo cars[0];
echo "<br>";
$x = 6;

do {
echo "The number is: $x <br>";
$x++;
} while ($x <= 5);
echo "<br>";
$age
= array("Peter"=>"35", "Ben"=>"37"
, "Joe"=>"43");
foreach($age as $x => $val) {
echo "$x = $val<br>";
}

?>

</body>
</html>
