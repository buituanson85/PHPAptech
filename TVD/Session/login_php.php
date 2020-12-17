<?php
function login(){
    if (!empty($_POST)){
//        $cookiEmail = $_COOKIE['email'];
//        $cookiPwd = $_COOKIE['pwd'];
        if (isset($_SESSION['email'])){
            $sessionEMail = $_SESSION['email'];
        }//kiểm tra
        if (isset($_SESSION['pwd'])){
            $sessionPwd = $_SESSION['pwd'];
        }
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        if ($email == $sessionEMail && $password == $sessionPwd){
            header ("Location: welcome.php");
        }
    }

}
