<?php
function login(){
    if (!empty($_POST)){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        echo $email."-".$pwd;
        if ($email == 'sonbtth2002012@fpt.edu.vn' && $pwd == "123"){
            header ("Location: welcome.php");
        }

    }
}
