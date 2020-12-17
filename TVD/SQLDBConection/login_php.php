<?php
function login(){
    if (!empty($_POST)){
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        //tạo kết nối
        $connect = new mysqli("localhost", "root", "",
            "sessionone");
        if ($connect -> connect_error){
            var_dump ($connect -> connect_error);
            die();
        }
        //cho phép gõ tiếng việt
        mysqli_set_charset ($connect,"utf8");
        //kiểm tra kết nối
        $query = "select * from student
            where email = '".$email."' and password = '".$password."'";
        $result = mysqli_query ($connect, $query);
        $data = array ();
        while ($row = mysqli_fetch_array ($result, 1)){
            $data [] = $row;
        }
        //ddongs kết nối
        $connect -> close();
//        var_dump ($data);
        if ($data != null && count ($data) > 0){
            header ("Location: welcome.php");
        }

//        if ($email == $sessionEMail && $password == $sessionPwd){
//            header ("Location: welcome.php");
//        }
    }
}
