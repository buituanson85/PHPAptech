<?php
//const URL_BASE = "https://www.youtube.com/playlist?list=PLMPBVRu4TjAw0uDNojnQkOFEocCulmngQ";//khai báo hằng ko cần $
//define("welcome", "Hello");//khai báo hằng
//
//$x = 5;//đc hiểu là số nguyên
//$y = 5.6;//tự hiểu là float
//$str = "Bùi Tuấn Sơn";//chuỗi
//
//echo URL_BASE;
//echo "<br/>";
//echo welcome;
//echo "<br/>";
//echo $x."-".$y."<br/>".$str;

//khai  báo mảng --> là biến chứa tập hợp các dữ liệu với nhau
//length 5 phần tử , max- index: 4 , index 0--> 4
//$arr = array(
//    1, 5 ,7 ,8 ,10 // mảng số nguyên
//);

//echo sizeof($arr); //ra độ dài mảng
//echo count($arr); //ra độ dài mảng
//echo $arr[0];
//echo $arr[4];

$arr2 = array(
    array(
        "fullName" => "Bùi Tuấn Sơn",
        "gender" => "Nam",
        "address" => "Hoà Bình",
        "age" => 35
    ),array(
        "fullName" => "Bùi Tuấn Sơn",
        "gender" => "Nam",
        "address" => "Hoà Bình",
        "age" => 35
    ),array(
        "fullName" => "Bùi Tuấn Sơn",
        "gender" => "Nam",
        "address" => "Hoà Bình",
        "age" => 35
    )
);
echo $arr2['fullName'];

$arr3 = [
    "fullName" => "Bùi Tuấn Sơn",
    "gender" => "Nam",
    "address" => "Hoà Bình",
    "age" => 35
];
$arr4 = [
    [
        "fullName" => "Bùi Tuấn Sơn",
        "gender" => "Nam",
        "address" => "Hoà Bình",
        "age" => 35
    ],[
        "fullName" => "Bùi Tuấn Sơn",
        "gender" => "Nam",
        "address" => "Hoà Bình",
        "age" => 35
    ],[
        "fullName" => "Bùi Tuấn Sơn",
        "gender" => "Nam",
        "address" => "Hoà Bình",
        "age" => 35
    ]
];
//echo $arr4[0]['fullName'];



