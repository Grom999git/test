<?php
$limit = 1000;
$num1 = 3;
$num2 = 5;
$array = array();
$sum = 0;
for ($i=0; $i < $limit; $i++) { 
	if(($i % $num1 == 0) || ($i % $num2 == 0)){
		array_push ( $array , $i);
	}
}
// foreach ($array as $value) {
// 	echo($value . "<br>");
// }
$sum = array_sum($array);
echo($sum);
?>

