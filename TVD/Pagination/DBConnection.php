<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'banhang';

function createDatabase(){
    //connection
    $connection = new mysqli(HOST, USERNAME, PASSWORD);
    mysqli_set_charset ($connection, 'utf8');

    //tạo truy vấn
    $sql = 'create database if not exists '.DATABASE;
    mysqli_query ($connection, $sql);

    //close
    mysqli_close ($connection);
}

function createTable(){
    //connection
    $connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset ($connection, 'utf8');

    //tạo truy vấn
    $sql = 'create table if not exists sanpham (
        id int primary key auto_increment,
        thumbnail varchar (200),
        title varchar (150) not null ,
        price int default 0,
        discount int default 0
    )';
    mysqli_query ($connection, $sql);

    //close
    mysqli_close ($connection);
}
function initData(){
    //connection
    $connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset ($connection, 'utf8');

    //tạo truy vấn
    for ($i = 0; $i < 20; $i++){
        $sql = 'insert into sanpham ( thumbnail, title, price, discount) values ( "https://nuotvl.com/wp-content/uploads/2020/06/gai-xinh-74.jpg",
                                  "Áo khoác Du Pilot - '.$i.'", "'.(200000 + 20*$i).'", "'.(100000 + 20*$i).'")';
        mysqli_query ($connection, $sql);
    }

    //close
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

//init data - gọi một lần duy nhất

createDatabase ();
createTable ();
//initData ();
