<?php
require_once ('config.php');

//thực hiện cho hàm insert update delete
function execute($sql){
    // tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    // $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE); như trên
    //viết câu truy vấn

    mysqli_query ($conn, $sql);
    //đóng connection
    mysqli_close ($conn);
}

//chạy cho câu lệnh select => trả về kết quả
function executeResult($sql){
    // tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    // $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE); như trên
    //viết câu truy vấn

    $result = mysqli_query ($conn, $sql);
    $list = [];

    if ($result != null){
        while ($row = mysqli_fetch_array ($result, 1)){
            $list[] = $row;
        }
    }
    //đóng connection
    mysqli_close ($conn);
    return $list;
}

//Sửa
function executeSingleResult($sql){
    // tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    // $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE); như trên
    //viết câu truy vấn

    $result = mysqli_query ($conn, $sql);
    $row = null;
    if ($result != null){
        $row = mysqli_fetch_array ($result, 1);
    }

    //đóng connection
    mysqli_close ($conn);
    return $row;
}
