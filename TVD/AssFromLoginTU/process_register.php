<?php
$fullName = $password = $userName = "";
//kiểm tra xem dữ liệu có được đẩy lên hay không
if (isset($_POST['name'])){
    $fullName = $_POST['name'];
}
if (isset($_POST['userName'])){
    $userName = $_POST['userName'];
}
if (isset($_POST['pwd'])){
    $password = $_POST['pwd'];
}

if ($password != "" && $userName != ""){
    header ('Location: login.php?userName='.$userName.'&pwd='.$password);
    die();//lấy dữ liệu song dừng luôn ko trả về html
}
