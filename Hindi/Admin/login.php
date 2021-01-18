<?php
    global $conn;
    include('../dbConnection/dbConnection.php');
    session_start();
    if(!isset($_SESSION['is_adminlogin'])){
        if(isset($_REQUEST['aEmail'])){
            $aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
            $aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
            $sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email='".$aEmail."' AND a_password='".$aPassword."' limit 1";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $_SESSION['is_adminlogin'] = true;
                $_SESSION['aEmail'] = $aEmail;
                // Redirecting to RequesterProfile page on Correct Email and Pass
                echo "<script> location.href='dashboard.php'; </script>";
                exit;
            } else {
                $msg = '<div class="alert alert-warning mt-2" role="alert"> Nhập sai email hoặc mật khẩu</div>';
            }
        }
    } else {
        echo "<script> location.href='dashboard.php'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <style>
        .custom-margin {
            margin-top: 8vh;
        }
    </style>
    <title>Login</title>
</head>

<body>
<div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Hệ thống quản lý bảo trì trực tuyến</span>
</div>
<p class="text-center" style="font-size: 20px;">
    <i class="fas fa-user-secret text-danger"></i>
    <span>Quản trị viên Khu vực (Demo)</span>
</p>
<div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
        <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="email" class="pl-2 font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="aEmail">
                    <!--Add text-white below if want text color white-->
                    <small class="form-text">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ ai khác.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Mật khẩu</label><input type="password"
                                                                                                                     class="form-control" placeholder="Mật khẩu" name="aPassword">
                </div>
                <button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Đăng nhập</button>
                <?php if(isset($msg)) {echo $msg; } ?>
            </form>
            <div class="text-center">
                <a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>

<!-- Boostrap JavaScript -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>

</html>