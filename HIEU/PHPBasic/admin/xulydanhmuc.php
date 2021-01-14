<?php
    include_once '../db/connect.php';
?>
<?php
    if (isset($_POST['themdanhmuc'])){
        $tendanhmuc = $_POST['danhmuc'];
        $sql_insert = mysqli_query ($con, "insert into tbl_category( category_name) values ('$tendanhmuc')");
    }elseif (isset($_POST['capnhatdanhmuc'])){
        $id_capnhat_danhmuc = $_POST['danhmuc_id'];
        $tendanhmuc = $_POST['danhmuc'];
        $sql_update = mysqli_query ($con, "update tbl_category set category_name = '$tendanhmuc' where category_id = '$id_capnhat_danhmuc'");
    }
    if (isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query ($con, "delete from tbl_category where category_id = '$id'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <title>Danh mục</title>
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
                    <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
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
                $capnhat = $_GET['quanly'];
            }else{
                $capnhat = '';
            }
            if ($capnhat == 'capnhat'){
                $id_capnhat = $_GET['id'];
                $sql_capnhat = mysqli_query ($con, "select * from tbl_category where category_id = '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array ($sql_capnhat);
        ?>
        <div class="col-md-4">
            <h4>Cập nhật danh mục</h4>
            <label>Tên danh mục: </label>
            <form action="" method="post">
                <input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['category_name']?>">
                <input type="hidden" class="form-control" name="danhmuc_id" value="<?php echo $row_capnhat['category_id']?>">
                </br>
                <input type="submit" name="capnhatdanhmuc" value="cập nhật danh mục" class="btn btn-success" style="padding-top: 10px">
            </form>
        </div>
        <?php
        }else{
        ?>
        <div class="col-md-4">
            <h4>Thêm danh mục</h4>
            <label>Tên danh mục: </label>
            <form action="" method="post">
                <input type="text" class="form-control" name="danhmuc" placeholder="Nhập tên danh mục">
                </br>
                <input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-success" style="padding-top: 10px">
            </form>
        </div>
        <?php
            }
        ?>
        <div class="col-md-8">
            <h4>Liệt kê danh mục</h4>
            <?php
                $sql_select_category = mysqli_query ($con, "select * from tbl_category order by category_id desc ");
            ?>
            <table class="table table-bordered ">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Quản lý</th>
                </tr>
                <tbody>
                <?php
                    $index = 0;
                    if ($sql_select_category){
                        while ($row_select_categor = mysqli_fetch_array ($sql_select_category)){
                            $index++;
                ?>
                <tr>
                    <td><?php echo $index?></td>
                    <td><?php echo $row_select_categor['category_name']?></td>
                    <td><a href="?xoa=<?php echo $row_select_categor['category_id']?>">Xoá</a> || <a href="?quanly=capnhat&id=<?php echo $row_select_categor['category_id']?>">Cập nhật</a></td>
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
