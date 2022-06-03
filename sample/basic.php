<?php

$x = 8;
$y = 8;
echo ($x === $y);



exit();
$password ='password';

$p = password_hash($password, PASSWORD_BCRYPT);

$ch = password_verify($password, $p);

echo $ch;

exit;


// sort
$numbers = [3, 6, 11, 2, 8, 9];
for ($i = 0; $i < count($numbers); $i++) {
    for ($j = 0; $j < count($numbers)-1; $j++) {
        if($numbers[$j] < $numbers[$j+1]){
            $temp = $numbers[$j];
            // swap
            $numbers[$j] = $numbers[$j+1];
            $numbers[$j+1] = $temp;
        }
    }
}
// print_r($numbers);


