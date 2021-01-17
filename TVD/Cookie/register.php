<?php
function register(){
    if(!empty($_POST)){
        $userName = $_POST['userName'];
        $fullName = $_POST['name'];
        $password = $_POST['pwd'];
        $email = $_POST['email'];
        $phoneNumner = $_POST['phone'];

        setcookie ("name", $fullName, time () + 24*60*60, "/"); //tồn tại cookie trong 24h
        setcookie ("userName", $userName, time () + 24*60*60, "/");
        setcookie ("pwd", $password, time () + 24*60*60, "/");
        setcookie ("email", $email, time () + 24*60*60, "/");
        setcookie ("phone", $phoneNumner, time () + 24*60*60, "/");
        header ("Location: dashboard.php");
    }
}
