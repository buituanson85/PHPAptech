<?php
//lấy dữ liệu từ from đăng ký register gửi sang
    $register_username = $register_password = "";
    if (isset($_GET['userName'])){
        $register_username = $_GET['userName'];
    }
    if (isset($_GET['pwd'])){
        $register_password = $_GET['pwd'];
    }
//lấy dữ liệu từ from đăng nhập login gửi sang
    $userName = $password = "";
    if (isset($_POST['userName'])){
        $userName = $_POST['userName'];
        $password = $_POST['pwd'];
    }
    //kiêm tra dữ liệu đăng ký với dữ liệu nhập từ form login có trùng nhau không,
if ($register_username == $userName && $register_password == $password){
    header ('Location: welcome.php');
    die();
}else if ($userName != ""){
    echo '<h1><font color="red">login failde!!!!</font></h1>';
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
                        <label for="userName">Nhập user name:</label>
                        <input type="text" class="form-control" placeholder="Enter userName" id="userName" name="userName">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
