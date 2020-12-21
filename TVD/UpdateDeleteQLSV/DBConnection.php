<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'fromqlsv';

function execute($sql){
    $connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset ($connection, 'utf8');

    mysqli_query ($connection, $sql);
    mysqli_close ($connection);
}
//lấy dữ liệu từ hê thông
function executeResult($sql){
//connection
    $connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset ($connection, 'utf8');

    //tạo truy vấn
    $data = [];
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array ($result, 1)){
        $data[] = $row;
    }
    //close
    mysqli_close ($connection);
    return $data;
}


