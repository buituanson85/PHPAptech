<?php
    $fullName = $password = $userName = "";
    //kiểm tra xem dữ liệu có được đẩy lên hay không
    if (isset($_POST['name'])){
        $fullName = $_POST['name'];
    }
    if (isset($_POST['userName'])){
        $userName = $_POST['userName'];
    }
    if (isset($_POST['pwd'])){
        $password = $_POST['pwd'];
    }

    if ($password != "" && $userName != ""){
        header ('Location: login.php?userName='.$userName.'&pwd='.$password);
        die();//lấy dữ liệu song dừng luôn ko trả về html
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>PHP Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span>Nhập thông tin đăng ký</span>
            </div>
            <div class="panel-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Nhập full name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="userName">Nhập user name:</label>
                        <input type="text" class="form-control" placeholder="Enter userName" id="userName" name="userName">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
