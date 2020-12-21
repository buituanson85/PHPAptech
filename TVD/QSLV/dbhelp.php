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
/*Khung viết khác câu truy vấn
 * // tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    // $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE); như trên
    //viết câu truy vấn

    mysqli_query ($conn, $sql);
    //đóng connection
    mysqli_close ($conn);
 * */

//chạy cho câu lệnh select => trả về kết quả
function executeResult($sql){
    // tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    // $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE); như trên
    //viết câu truy vấn

    $result = mysqli_query ($conn, $sql);
    $list = [];
    while ($row = mysqli_fetch_array ($result, 1)){
        $list[] = $row;
    }
    //đóng connection
    mysqli_close ($conn);
    return $list;
}
