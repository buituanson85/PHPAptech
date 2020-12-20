<?php
//lấy dữ liệu từ from đăng ký register gửi sang
$register_username = $register_password = "";
if (isset($_GET['userName'])){
    $register_username = $_GET['userName'];
}
if (isset($_GET['pwd'])){
    $register_password = $_GET['pwd'];
}
//lấy dữ liệu từ from đăng nhập login gửi sang
$userName = $password = "";
if (isset($_POST['userName'])){
    $userName = $_POST['userName'];
    $password = $_POST['pwd'];
}
//kiêm tra dữ liệu đăng ký với dữ liệu nhập từ form login có trùng nhau không,
if ($register_username == $userName && $register_password == $password){
    header ('Location: welcome.php');
    die();
}else if ($userName != ""){
    echo '<h1><font color="red">login failde!!!!</font></h1>';
}
