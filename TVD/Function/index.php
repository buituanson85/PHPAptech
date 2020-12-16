<?php
showInfo();
$result = phep_tinh_cong (5, 27);
echo $result."<br/>";
showInfo();
$result = phep_tinh_cong (5, 71);
echo $result."<br/>";
showInfo();
$result = phep_tinh_cong (15, 7);
echo $result."<br/>";
showInfo();

function showInfo(){
    echo "Hello A<br/>";
    echo "Hello B<br/>";
    echo "Hello C<br/>";
    echo "Hello D<br/>";
    echo "Hello E<br/>";
}

function phep_tinh_cong($x, $y){
    $result = $x + $y;
    return $result;
}