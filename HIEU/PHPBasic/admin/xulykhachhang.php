<?php
include_once '../db/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Khách hàng</title>
</head>

<body>
<div class="col-lg-12" style="padding-top: 30px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmuc.php?quanly=danhmuc">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="xulykhachhang.php">Khách hàng</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row" style="padding-top: 30px">
        <div class="col-md-12">
            <h4>Khách hàng</h4>
            <?php
            $sql_select_khachhang = mysqli_query ($con, "select * from tbl_khachhang, tbl_giaodich where tbl_khachhang.khachhang_id = tbl_giaodich.khachhang_id group by tbl_giaodich.magiaodich order by tbl_khachhang.khachhang_id desc ");
            ?>
            <table class="table table-bordered ">
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Quản lý</th>
                </tr>
                <tbody>
                <?php
                $index = 0;
                if ($sql_select_khachhang){
                    while ($row_khachhang = mysqli_fetch_array ($sql_select_khachhang)){
                        $index++;
                        ?>
                        <tr>
                            <td><?php echo $index?></td>
                            <td><?php echo $row_khachhang['name']?></td>
                            <td><?php echo $row_khachhang['phone']?></td>
                            <td><?php echo $row_khachhang['address']?></td>
                            <td><?php echo $row_khachhang['email']?></td>
                            <th><a href="?quanly=xemgiaodich&magiaodich=<?php echo $row_khachhang['magiaodich']?>">Xem giao dịch</a></th>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h4>Liệt kê đơn hàng</h4>
            <?php
            if (isset($_GET['quanly'])){
                $xemgiaodich = $_GET['quanly'];
            }else{
                $xemgiaodich = '';
            }
            if ($xemgiaodich == 'xemgiaodich'){
                if (isset($_GET['magiaodich'])){
                    $magiaodich = $_GET['magiaodich'];
                }else{
                    $magiaodich = '';
                }
            $sql_select_donhang = mysqli_query ($con, "select * from tbl_giaodich, tbl_khachhang, tbl_sanpham where tbl_giaodich.khachhang_id = tbl_khachhang.khachhang_id and tbl_giaodich.sanpham_id = tbl_sanpham.sanpham_id and tbl_giaodich.magiaodich = '$magiaodich'  order by tbl_giaodich.giaodich_id desc ");
            ?>
            <table class="table table-bordered ">
                <tr>
                    <th>STT</th>
                    <th>Mã giao dịch</th>
                    <th>Tên sản phẩm</th>
                    <th>Ngày đặt</th>
                </tr>
                <tbody>
                <?php
                $index = 0;
                if ($sql_select_donhang){
                    while ($row_donhang = mysqli_fetch_array ($sql_select_donhang)){
                        $index++;
                        ?>
                        <tr>
                            <td><?php echo $index?></td>
                            <td><?php echo $row_donhang['magiaodich']?></td>
                            <td><?php echo $row_donhang['sanpham_name']?></td>
                            <td><?php echo $row_donhang['ngaythang']?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>


