<?php
require_once("define.php");
//tạo kết nối tới database
$connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
//lưu tiếng việt
mysqli_set_charset ($connect, "utf8");
//kiểm tra kết nối
if ($connect -> connect_error){
    var_dump ($connect -> connect_error);
    die();
}

