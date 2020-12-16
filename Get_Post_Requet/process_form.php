<?php
//var_dump($_POST); //đọc thông tin post lên
//var_dump($_GET);
// cách lấy dữ liệu từ post
// request lưu trữ thông tin post và get chung một chỗ
if (isset($_REQUEST['fullName'])){
    $fullName = $_REQUEST['fullName'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];

    echo 'Fullname: ';
    echo $fullName;
    echo '<br/>';

    echo 'Address: ';
    echo $address;
    echo '<br/>';

    echo 'Email: ';
    echo $email;
    echo '<br/>';
}


//if (isset($_POST['fullName'])){
//    $fullName = $_POST['fullName'];
//    $address = $_POST['address'];
//    $email = $_POST['email'];
//
//    echo 'Fullname: ';
//    echo $fullName;
//    echo '<br/>';
//
//    echo 'Address: ';
//    echo $address;
//    echo '<br/>';
//
//    echo 'Email: ';
//    echo $email;
//    echo '<br/>';
//}
////cách lấy dữ liệu từ get
//if (isset($_GET['fullName'])){
//    $fullName = $_GET['fullName'];
//    $address = $_GET['address'];
//    $email = $_GET['email'];
//
//    echo 'Fullname: ';
//    echo $fullName;
//    echo '<br/>';
//
//    echo 'Address: ';
//    echo $address;
//    echo '<br/>';
//
//    echo 'Email: ';
//    echo $email;
//    echo '<br/>';
//}



