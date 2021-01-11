
<?php
    session_start ();
    if (!isset($_SESSION['dangnhap'])){
        header ('Location: index.php');
    }
    if (isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    }else{
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat'){
        session_destroy ();
        header ('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Welcom Admin</title>
</head>

<body>
<div class="container">
    <div class="row" style="padding-top: 30px" >
        <div class="col-lg-12" >
            <div class="row">
                <div class="col-lg-10">
                    <span style="float: right">Xin chào: <?php echo $_SESSION['dangnhap'].'  |'?></span>

                </div>
                <div class="col-lg-2">
                    <span style="float: left"><a href="?login=dangxuat">Đăng xuất</a></span>
                </div>
            </div>
        </div>
        <div class="col-lg-12" style="padding-top: 30px">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="xulydanhmuc.php?quanly=danhmuc">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Khách hàng</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
</body>
</html>