<?php
include_once '../db/connect.php';
?>
<?php
    if (isset($_POST['capnhatdonhang'])){
        $xulydonhang = $_POST['xulydonhang'];
        $mahang_xuly = $_POST['mahangxuly'];
        $sql_update_tinhtrang = mysqli_query ($con, "update tbl_donhang set tinhtrang = '$xulydonhang' where mahang = '$mahang_xuly'");
    }
?>
<?php
    if (isset($_GET['xoadonhang'])){
        $mahang_xoa = $_GET['xoadonhang'];
        $sql_xoa_mahang = mysqli_query ($con, "delete from tbl_donhang where mahang = '$mahang_xoa'");
        header ('Location: xulydonhang.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Đơn hàng</title>
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
        <?php
        if (isset($_GET['quanly'])){
            $xemdonhang = $_GET['quanly'];
        }else{
            $xemdonhang = '';
        }
        if ($xemdonhang == 'xemdonhang'){
            $mahang = $_GET['mahang'];
            $sql_chitiet = mysqli_query ($con, "select * from tbl_donhang, tbl_sanpham where tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id and tbl_donhang.mahang = '$mahang'");
            $row_chitiet = mysqli_fetch_array ($sql_chitiet);
            ?>
            <div class="col-md-7">
                <p>Xem chi tiết đơn hàng</p>
                <form action="" method="post">
                <table class="table table-bordered ">
                    <tr>
                        <th>STT</th>
                        <th>Mã hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>

                        <th>Quản lý</th>
                    </tr>
                    <tbody>
                    <?php
                    $index = 0;
                    if ($sql_chitiet){
                        while ($row_chitiet = mysqli_fetch_array ($sql_chitiet)){
                            $index++;
                            ?>
                            <tr>
                                <td><?php echo $index?></td>
                                <td><?php echo $row_chitiet['mahang']?></td>
                                <td><?php echo $row_chitiet['sanpham_name']?></td>
                                <td><?php echo $row_chitiet['soluong']?></td>
                                <td><?php echo number_format ($row_chitiet['soluong'] * $row_chitiet['sanpham_giakhuyenmai']).' '.'vnđ'?></td>
                                <td><?php echo $row_chitiet['ngaythanh']?></td>
                                <input type="hidden" name="mahangxuly" value="<?php echo $row_chitiet['mahang']?>">
                                <td><a href="?xoa=<?php echo $row_chitiet['donhang_id']?>">Xoá</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_chitiet['mahang']?>">Xem đơn hàng</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <select class="form-control" name="xulydonhang">
                    <option value="1">Đã xử lý</option>
                    <option value="0">Chưa xử lý</option>
                </select>
                <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
                </form>
            </div>

            <?php
        }
        else{
           ?>

            <div class="col-md-7">
                <p>Đơn hàng</p>
            </div>
            <?php
        }
        ?>
        <div class="col-md-5">
            <h4>Liệt kê đơn hàng</h4>
            <?php
            $sql_select_donhang = mysqli_query ($con, "select * from tbl_sanpham,tbl_khachhang,tbl_donhang where tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id and tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id  order by tbl_donhang.donhang_id desc ");
            ?>
            <table class="table table-bordered ">
                <tr>
                    <th>STT</th>
                    <th>Mã hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Ghi chú</th>
                    <th>Quản lý</th>
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
                                <td><?php echo $row_donhang['mahang']?></td>
                                <td>
                                    <?php
                                        if ($row_donhang['tinhtrang'] == 0){
                                            echo 'chưa xử lý';
                                        }else{
                                            echo 'đã xử lý';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row_donhang['name']?></td>
                                <td><?php echo $row_donhang['ngaythanh']?></td>
                                <td><?php echo $row_donhang['note']?></td>
                                <td><a href="?xoadonhang=<?php echo $row_donhang['mahang']?>">Xoá</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang']?>">Xem đơn hàng</a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

