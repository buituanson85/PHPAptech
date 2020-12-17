<?php
function login(){
    if (!empty($_POST)){
        $cookiEmail = $_COOKIE['email'];
        $cookiPwd = $_COOKIE['pwd'];

        $email = $_POST['email'];
        $password = $_POST['pwd'];
        if ($email == $cookiEmail && $password == $cookiPwd){
            header ("Location: welcome.php");
        }
    }

}
