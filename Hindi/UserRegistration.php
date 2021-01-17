<?php
    include ('dbConnection/dbConnection.php');
    global $conn;
    if(isset($_REQUEST['rSignup'])){
        // Checking for Empty Fields
        if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
            $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Vui lòng nhập dữ liễu </div>';
        } else {
            $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID đã tồn tại </div>';
            } else {
                // Assigning User Values to Variable
                $rName = $_REQUEST['rName'];
                $rEmail = $_REQUEST['rEmail'];
                $rPassword = $_REQUEST['rPassword'];
                $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES ('$rName','$rEmail', '$rPassword')";
                if($conn->query($sql) == TRUE){
                    $regmsg = '<div class="alert alert-success mt-2" role="alert"> Tài khoản được tạo thành công </div>';
                } else {
                    $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Không thể tạo tài khoản </div>';
                }
            }
        }
    }
?>

<!-- start registration from container -->
<div class="container pt-5">
    <h2 class="text-center"> Tạo tài khoản </h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post" class="shadow-lg p-4">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="name" class="font-weight-bold pl-2">Họ và tên</label>
                    <input type="text" class="form-control" placeholder="Nhập họ và tên" name="rName">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="email" class="pl-2 font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Nhập email" name="rEmail">
                    <!--Add text-white below if want text color white-->
                    <small class="form-text">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ ai khác.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="pass" class="pl-2 font-weight-bold">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="rPassword">
                </div>
                <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Đăng ký</button>
                <em style="font-size:10px;">Lưu ý - Bằng cách nhấp vào Đăng ký, bạn đồng ý với Điều khoản, Chính sách Dữ liệu và Chính sách quản lý của chúng tôi.</em>
                <?php if(isset($regmsg)) {echo $regmsg; } ?>
            </form>
        </div>
    </div>
</div>
<!-- end registration from container -->
