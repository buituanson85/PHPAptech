<?php
function register(){
    if(!empty($_POST)){
        $userName = $_POST['userName'];
        $fullName = $_POST['name'];
        $password = $_POST['pwd'];
        $email = $_POST['email'];
        $phoneNumner = $_POST['phone'];
        //tạo kết nối đến data

        require_once("DBConnection.php");

        //thực hiện câu lệnh truy vấn dữ liệu
        $query = "insert into student(fullname, username, password, email, phone)
            values ('".$fullName."', '".$userName."', '".$password."', '".$email."', '".$phoneNumner."')";

        mysqli_query ($connect, $query);

        //đóng kết nối
        require_once("DBClose.php");

        header ("Location: dashboard.php");
    }
}
