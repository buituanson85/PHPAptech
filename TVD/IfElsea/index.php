<?php
$i = 100;

if ($i % 2 == 0){
    echo  "$i is even";
}else{
    echo "$i is odd";
}
echo "<br/>";
// kiểm tra i có chia hết cho 2 và 3 ko
if ($i % 2 == 0){
    echo "$i chia hết cho 2";
}else if ($i % 3 == 0){
    echo "$i chia hết cho 4";
}else{
    echo "$i không chia hết cho 2 or 3 ";
}
$value = 1;
if ($value == 1){
    echo  "hello 1";
}else if ($value == 2){
    echo  "hello 2";
}else if ($value == 3){
    echo  "hello 3";
}else if ($value == 4){
    echo  "hello 4";
}else if ($value == 5){
    echo  "hello 5";
}else if ($value == 6){
    echo  "hello 6";
}else{
    echo "ok";
}

switch ($value){
    case 1:
        echo "helo 1";
        break;
    case 2:
        echo "helo 2";
        break;
    case 3:
        echo "helo 3";
        break;
    case 4:
        echo "helo 4";
        break;
    default:
        echo "ok";
        break;
}
