<?php
session_start ();
include_once '../db/connect.php';
?>
<?php
//  session_destroy (); huỷ toàn bộ session
///  session_unset ('dangnhap'); huỷ 1 session
    if (isset($_POST['dangnhap'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        if ($taikhoan == '' || $matkhau == ''){
            echo "<span style='color: red'>xin nhập đủ</span>";
        }else{
            $sql_select_admin = mysqli_query ($con, "select * from tbl_admin where email = '$taikhoan' and password = '$matkhau' LIMIT 1");
            $count = mysqli_num_rows ($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array ($sql_select_admin);
            if ($count > 0){
                //khai báo session để dữ phiên làm việc
                $_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
                $_SESSION['admin_id'] = $row_dangnhap['admin_id'];
                header ('Location: dashboard.php');
            }else{
                echo "<span style='color: red'>tk or mk sai</span>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Đăng nhập Admin</title>
</head>

<body>
<div class="container">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <h2>Đăng nhập</h2>
        </br>
        <div class="col-md-6">
            <input type="email" name="taikhoan" id="taikhoan" placeholder="Điền email..." class="form-control" />
            </br>
            <input type="password" name="matkhau" id="matkhau" placeholder="Nhập mật khẩu..." class="form-control"/>
            </br>
            <input type="submit" name="dangnhap" id="button" value="Đăng nhập Admin" class="btn btn-success"/>
        </div>
    </form>

</div>
</body>
</html>