<?php
function showMenu($param1, $param2, $param3){
    echo $param1."<br/>";
    echo $param2."<br/>";
    echo $param3."<br/>";
}

showMenu(1, "Bùi Tuấn sơn", "Hà Nội");
echo "<br/>";

function showMenu2($param1, $param2, $param3){
    echo $param1."<br/>";
    echo $param2."<br/>";
    echo $param3."<br/>";
    return $param1.$param2.$param3;
}

$result = showMenu2(1, "Bùi Tuấn sơn", "Hà Nội");
echo $result;