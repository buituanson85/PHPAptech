<?php
function register(){
    if(!empty($_POST)){
        $userName = $_POST['userName'];
        $fullName = $_POST['name'];
        $password = $_POST['pwd'];
        $email = $_POST['email'];
        $phoneNumner = $_POST['phone'];
        //tạo kết nối đến data

        $connect = new mysqli("localhost", "root","","sessionone");
        //cho phép gõ tiếng việt
//        mysql::set_charset ($connect,"utf8");
        //kiểm tra kết nối
        if ($connect -> connect_error){
            var_dump ($connect -> connect_error);
            die();
        }
        //thực hiện câu lệnh truy vấn dữ liệu
        $query = "insert into student(fullname, username, password, email, phone)
            values ('".$fullName."', '".$userName."', '".$password."', '".$email."', '".$phoneNumner."')";
        mysqli_query ($connect, $query);

        //đóng kết nối
        $connect -> close();

        header ("Location: login.php");
    }
}
