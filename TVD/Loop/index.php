<?php
echo "For<br/>";
$arr = [ 1, 2, 3, 4, 5, 6];

for ($i = 0; $i < count($arr); $i++){
    echo  $arr[$i];
    echo "<br/>";
}
echo "while<br/>";
$i = 0;
while ($i < count($arr)){
    echo $arr[$i];
    echo "<br/>";
    $i++;
}
echo "dowhile<br/>";
$i = 0;
do{
    echo $arr[$i];
    echo "<br/>";
    $i++;
}while($i < count($arr));

echo "foreach<br/>";

foreach ($arr as $value) {
    echo $value;
    echo "<br/>";
}