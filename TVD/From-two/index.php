<?php
$userName = $email = $birth = $password = $confirmation_password = $address = '';
$isPwdMappping = true;
//lấy dữ liệu qua phương thức post
    if (!empty($_POST)){
        if (isset($_POST['usr'])){
            $userName = $_POST['usr'];
        }
        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if (isset($_POST['birthday'])){
            $birth = $_POST['birthday'];
        }
        if (isset($_POST['pwd'])){
            $password = $_POST['pwd'];
        }
        if (isset($_POST['confirmation_pwd'])){
            $confirmation_password = $_POST['confirmation_pwd'];
        }
        if (isset($_POST['address'])){
            $address = $_POST['address'];
        }
        //kiểm tra $password với $confirmation_password
        if ($password == $confirmation_password){
            header ('Location: welcome.php?ten='.$userName);
            die();
        }else{
            $isPwdMappping = false;
        }
        //mật khẩu ko trùng
//        echo $userName.'-'.$email.'-'.$birth.'-'.$password.'-'.$confirmation_password.'-'.$address.'<br/>';
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Registation Form * Form Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    Css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--    Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--    Js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--    Popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Registation Form - Input User's Detail Information</h2>
            </div>
            <div class="panel-body">
<!--                method :Get post-->
<!--                method : get -->
<!--                action : gửi đi đâu gừi chỗ nào để rỗng gửi tới chính nó-->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="usr">Nhập user name:</label>
                        <input type="text" class="form-control" placeholder="Enter user name" id="usr" name="usr" required="true" value="<?=$userName?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Nhập Email:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required="true" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Nhập Birthday:</label>
                        <input type="date" class="form-control" placeholder="Enter Birthday" id="birthday" name="birthday" required="true">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password: </label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="pwd" name="pwd" required="true">

                    </div>
                    <div class="form-group">
                        <label for="confirmation_pwd">Confirmation Password:</label>
                        <input type="password" class="form-control" placeholder="Enter Confirmation Password" id="confirmation_pwd" name="confirmation_pwd" required="true">
                        <label><?=$isPwdMappping?'':'<font color=red>Mật khẩu không khớp</font>'?></label>
                    </div>
                    <div class="form-group">
                        <label for="address">Nhập Address:</label>
                        <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" required="true" value="<?=$address?>">
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
